<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // قد نحتاجه للتحديثات المجمعة أو المشغلات
use Illuminate\Validation\Rule;
class CommentVoteController extends Controller
{
    /**
     * Handle a vote on a comment.
     * Expects comment_id and vote_type (+1 or -1).
     */
    public function vote(Request $request, Comment $comment)
    {
        // يجب أن يكون المستخدم مسجل دخول
        // هذا مضمون بواسطة middleware 'auth' على المسار

        $request->validate([
            'vote_value' => ['required', 'integer', Rule::in([-1, 1])], // التحقق من أن القيمة هي +1 أو -1
        ]);

        $userAccount = Auth::user();

        // لا يمكن للمستخدم التصويت على تعليقاته الخاصة
        if ($comment->author_account_id === $userAccount->id) {
            // يمكنك إرجاع رسالة خطأ أو تجاهل التصويت
             return back()->with('error', 'You cannot vote on your own comment.');
             // أو في حالة AJAX/API: return response()->json(['message' => 'Cannot vote on own comment'], 403);
        }

        // البحث عن التصويت الحالي لهذا المستخدم على هذا التعليق
        $existingVote = CommentVote::where('comment_id', $comment->id)
                                   ->where('voter_account_id', $userAccount->id)
                                   ->first();

        $newVoteValue = $request->vote_value;
        $voteChange = 0; // التغيير الذي سيطرأ على total_votes

        if ($existingVote) {
            // إذا كان التصويت الحالي هو نفس التصويت الجديد، فهذا يعني سحب التصويت
            if ($existingVote->vote_value === $newVoteValue) {
                $existingVote->delete();
                $voteChange = -$newVoteValue; // عكس قيمة التصويت المسحوب (إذا كان +1 يصبح -1، وإذا كان -1 يصبح +1)
                $message = 'Vote removed.';
            } else { // إذا كان التصويت الحالي مختلفاً عن التصويت الجديد، فهذا يعني تغيير التصويت
                $existingVote->vote_value = $newVoteValue;
                $existingVote->save();
                $voteChange = $newVoteValue * 2; // مثال: من -1 إلى +1 يعني +2، من +1 إلى -1 يعني -2
                $message = 'Vote changed successfully.';
            }
        } else {
            // إذا لم يكن هناك تصويت سابق، قم بإنشاء تصويت جديد
            CommentVote::create([
                'comment_id' => $comment->id,
                'voter_account_id' => $userAccount->id,
                'vote_value' => $newVoteValue,
            ]);
            $voteChange = $newVoteValue; // إضافة قيمة التصويت الجديدة
            $message = 'Vote recorded successfully.';
        }

        // تحديث إجمالي التصويتات في جدول Comments
        // هذه طريقة بسيطة، يفضل استخدام مشغل (Trigger) في قاعدة البيانات
        // أو نظام رسائل (Queues) لضمان مزامنة دقيقة وغير مانعة للطلب
        $comment->total_votes += $voteChange;
        $comment->save();

        // يمكن هنا إضافة منطق لمنح نقاط للمستخدم الذي يتلقى upvotes لتعليقاته

        // إعادة التوجيه أو إرجاع استجابة JSON إذا كانت العملية عبر AJAX
        if ($request->expectsJson()) {
             return response()->json(['message' => $message, 'new_total_votes' => $comment->total_votes]);
        }

        return back()->with('success', $message)->withFragment('comment-' . $comment->id); // التوجيه إلى التعليق

    }
}