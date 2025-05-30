<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy', // مثال افتراضي
        \App\Models\Problem::class => \App\Policies\ProblemPolicy::class,
         \App\Models\Comment::class => \App\Policies\CommentPolicy::class, // ستنشئها لاحقاً
         \App\Models\Solution::class => \App\Policies\SolutionPolicy::class, // ستنشئها لاحقاً للمسؤولين أو المنظمات
         \App\Models\Account::class => \App\Policies\AccountPolicy::class, // لصلاحيات تعديل الحسابات (للمسؤول أو صاحب الحساب)
         // ... إلخ لباقي النماذج التي تتطلب صلاحيات دقيقة
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
