<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    /**
     * Display a listing of all available badges.
     */
    public function index()
    {
        $badges = Badge::all(); // جلب جميع الألقاب

        // ستنشئ الواجهة لاحقاً: resources/views/badges/index.blade.php
        return view('badges.index', compact('badges'));
    }

    // لا حاجة لدوال show, create, store, edit, update, destroy هنا
    // إدارة الألقاب ستكون في لوحة تحكم المسؤول
}