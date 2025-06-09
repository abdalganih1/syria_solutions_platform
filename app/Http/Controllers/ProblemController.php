<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\ProblemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Access\AuthorizationException; // استورد هذا لاستخدامه في catch إذا لزم الأمر

class ProblemController extends Controller
{
     // يمكن هنا تعريف middleware auth في الدالة الإنشائية للتأكد أن المستخدم مسجل دخول لجميع الدوال باستثناء index و show
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
       // Middleware الصلاحيات الدقيقة (can) يمكن تطبيقه هنا أيضاً أو تركه في الدالة نفسها
       // $this->middleware('can:create,App\Models\Problem')->only(['create', 'store']);
       // $this->middleware('can:update,problem')->only(['edit', 'update']);
       // $this->middleware('can:delete,problem')->only(['destroy']);
    }

    /**
     * Show the form for creating a new problem.
     */
    public function create()
    {
        // التحقق من صلاحية إنشاء مشكلة باستخدام Policy
        $this->authorize('create', Problem::class); // يمرر اسم النموذج للفحص في Policy

        $categories = ProblemCategory::all();
        return view('problems.create', compact('categories'));
    }

    /**
     * Store a newly created problem in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صلاحية إنشاء مشكلة باستخدام Policy
        $this->authorize('create', Problem::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:problem_categories,id',
            'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'tags' => 'nullable|string',
        ]);

        $problem = Problem::create([
            'title' => $request->title,
            'description' => $request->description,
            'submitted_by_account_id' => Auth::id(),
            'category_id' => $request->category_id,
            'urgency' => $request->urgency,
            'status' => 'Published',
            'tags' => $request->tags,
        ]);

        return redirect()->route('problems.show', $problem)->with('success', 'Problem created successfully!');
    }

    /**
     * Show the form for editing the specified problem.
     */
    public function edit(Problem $problem)
    {
        // التحقق من صلاحية تحديث هذه المشكلة بالذات باستخدام Policy
        $this->authorize('update', $problem); // يمرر كائن النموذج للفحص في Policy

        $categories = ProblemCategory::all();
        return view('problems.edit', compact('problem', 'categories'));
    }

    /**
     * Update the specified problem in storage.
     */
    public function update(Request $request, Problem $problem)
    {
         // التحقق من صلاحية تحديث هذه المشكلة بالذات باستخدام Policy
        $this->authorize('update', $problem);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:problem_categories,id',
            'urgency' => ['required', Rule::in(['Low', 'Medium', 'High'])],
            'tags' => 'nullable|string',
        ]);

        $problem->update($request->only(['title', 'description', 'category_id', 'urgency', 'tags']));

        return redirect()->route('problems.show', $problem)->with('success', 'Problem updated successfully!');
    }

    /**
     * Remove the specified problem from storage.
     */
    public function destroy(Problem $problem)
    {
        // التحقق من صلاحية حذف هذه المشكلة بالذات باستخدام Policy
        $this->authorize('delete', $problem);

        $problem->delete();

        return redirect()->route('problems.index')->with('success', 'Problem deleted successfully!');
    }

     /**
     * Display a listing of the problems.
     * (هذه الدالة لا تتطلب تسجيل دخول، لكن منطق فلترة المشاكل يتم داخل الدالة نفسها)
     */
    public function index()
    {
        // لا نستخدم authorize هنا لأن عرض القائمة عام، ولكن يمكن إضافة policy viewAny إذا أردنا قيوداً على من يمكنه رؤية القائمة بالكامل.
         // $this->authorize('viewAny', Problem::class);

        $problems = Problem::where('status', 'Published')
                           ->with('submittedBy.userProfile', 'submittedBy.organizationProfile', 'category')
                           ->latest()
                           ->paginate(15);

        return view('problems.index', compact('problems'));
    }

    /**
     * Display the specified problem.
     * (هذه الدالة أيضاً يمكن أن تكون عامة، ولكن policy view يمكن أن تفرض قيوداً على عرض المشاكل غير المنشورة)
     */
    public function show(Problem $problem)
    {
        // هنا يمكن استخدام policy للتأكد من أن المستخدم يمكنه رؤية هذه المشكلة بالذات
        // مثلاً، مشكلة حالة 'Draft' لا يمكن رؤيتها إلا من قبل صاحبها أو المسؤول
         try {
            $this->authorize('view', $problem);
         } catch (AuthorizationException $e) {
             abort(403); // أو 403 حسب الرغبة، 404 يخفي وجودها تماماً
         }


        $problem->load([
            'submittedBy.userProfile',
            'submittedBy.organizationProfile',
            'category',
            'comments' => function ($query) {
                $query->whereNull('parent_comment_id')
                      ->with('author.userProfile', 'author.organizationProfile', 'replies.author.userProfile', 'replies.author.organizationProfile', 'adoptedSolution');
            }
        ]);

        return view('problems.show', compact('problem'));
    }

}