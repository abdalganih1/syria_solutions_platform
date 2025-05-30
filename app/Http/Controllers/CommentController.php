<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Problem; // قد نحتاج للتحقق من وجود المشكلة
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // قد نحتاجه لتحديث total_votes

class CommentController extends Controller
{
    /**
     * Store a newly created comment or reply in storage.
     */
    public function store(Request $request)
    {
        // يجب أن يكون المستخدم مسجل دخول
        $request->validate([
            'content' => 'required|string',
            'problem_id' => 'required|exists:problems,id', // التحقق من وجود المشكلة
            'parent_comment_id' => 'nullable|exists:comments,id', // التحقق من وجود التعليق الأم إذا كان رداً
        ]);

        // التأكد من أن التعليق الأم (إن وجد) ينتمي لنفس المشكلة (للحفاظ على التسلسل)
        if ($request->filled('parent_comment_id')) {
            $parentComment = Comment::findOrFail($request->parent_comment_id);
            if ($parentComment->problem_id !== $request->problem_id) {
                 return back()->withErrors(['parent_comment_id' => 'Parent comment does not belong to this problem.'])->withInput();
            }
        }


        // إنشاء التعليق
        $comment = Comment::create([
            'content' => $request->content,
            'author_account_id' => Auth::id(), // ربط التعليق بالمستخدم الحالي
            'problem_id' => $request->problem_id,
            'parent_comment_id' => $request->parent_comment_id,
             'total_votes' => 0, // القيمة الأولية للتصويتات
        ]);

        // إعادة التوجيه غالباً إلى صفحة المشكلة مع التعليق الجديد
        return redirect()->route('problems.show', $request->problem_id)
                         ->with('success', 'Comment added successfully!')
                         ->withFragment('comment-' . $comment->id); // يمكن التوجيه إلى التعليق الجديد

    }

    /**
     * Show the form for editing the specified comment.
     * (May be handled via AJAX or modal in the view)
     */
    public function edit(Comment $comment)
    {
         // التحقق من أن المستخدم هو صاحب التعليق أو مسؤول
        if ($comment->author_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        // إرجاع الواجهة أو بيانات التعليق للتعديل
        // ستنشئ الواجهة لاحقاً: resources/views/comments/edit.blade.php (أو استخدمها لـ AJAX)
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified comment in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        // التحقق من أن المستخدم هو صاحب التعليق أو مسؤول
         if ($comment->author_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'content' => 'required|string',
        ]);

        // تحديث محتوى التعليق
        $comment->update($request->only(['content']));

        // إعادة التوجيه إلى صفحة المشكلة أو مكان التعليق
        return redirect()->route('problems.show', $comment->problem_id)
                         ->with('success', 'Comment updated successfully!')
                         ->withFragment('comment-' . $comment->id);

    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Comment $comment)
    {
        // التحقق من أن المستخدم هو صاحب التعليق أو مسؤول
         if ($comment->author_account_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $problemId = $comment->problem_id; // حفظ معرّف المشكلة قبل الحذف

        // ملاحظة: حذف تعليق أم سيحذف التعليقات الأبناء أيضاً إذا كان onDelete('cascade')
        // الحلول المعتمدة المرتبطة بهذا التعليق ستُحذف أيضاً
        $comment->delete();


        return redirect()->route('problems.show', $problemId)->with('success', 'Comment deleted successfully!');
    }
}