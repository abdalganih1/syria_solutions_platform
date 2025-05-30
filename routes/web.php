<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentVoteController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SolutionController as PublicSolutionController; // إعادة تسمية لتجنب التضارب
use App\Http\Controllers\AdminController; // المتحكم العام للمسؤول
// استيراد المتحكمات الجديدة في مجلد Admin
use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\ProblemController as AdminProblemController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\BadgeController as AdminBadgeController;
use App\Http\Controllers\Admin\SolutionController as AdminSolutionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// --- Public Routes ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/problems', [ProblemController::class, 'index'])->name('problems.index');
Route::get('/problems/{problem}', [ProblemController::class, 'show'])->name('problems.show');
Route::get('/badges', [BadgeController::class, 'index'])->name('badges.index');
Route::get('/profiles/{account}', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('/solutions', [PublicSolutionController::class, 'index'])->name('solutions.index'); // استخدام المتحكم العام للحلول للعرض العام
Route::get('/solutions/{solution}', [PublicSolutionController::class, 'show'])->name('solutions.show'); // عرض تفاصيل حل عام


// --- Authentication Routes ---
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// --- Authenticated User/Organization Routes ---
Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/badges', [ProfileController::class, 'showMyBadges'])->name('profile.badges');

    Route::get('/problems/create', [ProblemController::class, 'create'])->name('problems.create');
    Route::post('/problems', [ProblemController::class, 'store'])->name('problems.store');

    Route::get('/problems/{problem}/edit', [ProblemController::class, 'edit'])->name('problems.edit');
    Route::put('/problems/{problem}', [ProblemController::class, 'update'])->name('problems.update');
    Route::delete('/problems/{problem}', [ProblemController::class, 'destroy'])->name('problems.destroy');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/comments/{comment}/vote', [CommentVoteController::class, 'vote'])->name('comments.vote');
});


// --- Organization Specific Routes ---
Route::middleware(['auth', 'isOrganization'])->prefix('organization')->name('organization.')->group(function () {
    // Route::get('/dashboard', [OrganizationController::class, 'dashboard'])->name('dashboard'); // يمكن إضافة لوحة تحكم للمنظمة هنا

    Route::post('/adopt-comment/{comment}', [OrganizationController::class, 'adoptComment'])->name('adoptComment');

    Route::get('/solutions', [OrganizationController::class, 'listAdoptedSolutions'])->name('listAdoptedSolutions');
    Route::get('/solutions/{solution}', [OrganizationController::class, 'showAdoptedSolution'])->name('showAdoptedSolution');
    Route::put('/solutions/{solution}/status', [OrganizationController::class, 'updateAdoptedSolutionStatus'])->name('updateAdoptedSolutionStatus');

    Route::get('/categories/interests', [OrganizationController::class, 'editCategoryInterests'])->name('editCategoryInterests');
    Route::post('/categories/interests', [OrganizationController::class, 'updateCategoryInterests'])->name('updateCategoryInterests');

});

// --- Admin Routes ---
// استخدم المتحكمات المخصصة لكل مورد في منطقة المسؤول
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // إدارة الحسابات باستخدام Admin\AccountController
    Route::resource('accounts', AdminAccountController::class)->except(['show']);

    // إدارة المشاكل باستخدام Admin\ProblemController
    Route::resource('problems', AdminProblemController::class)->except(['create', 'store', 'show']);

    // إدارة الفئات باستخدام Admin\CategoryController
    Route::resource('categories', AdminCategoryController::class)->except(['show']);

    // إدارة الألقاب باستخدام Admin\BadgeController
    Route::resource('badges', AdminBadgeController::class)->except(['show']);

     // إدارة الحلول المعتمدة باستخدام Admin\SolutionController
    Route::resource('solutions', AdminSolutionController::class)->except(['create', 'store', 'edit']);

    // يمكن إضافة مسارات إضافية هنا لميزات المسؤول الأخرى (مثل إدارة التعليقات يدوياً، الإبلاغات)

});