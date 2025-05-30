@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome to the Syria Reconstruction Platform</h1>
    <p>Share ideas and find solutions for post-liberation challenges.</p>

    <h2>Recent Problems</h2>

    @if ($recentProblems->isEmpty())
        <p>No problems have been published yet.</p>
    @else
        <div class="list-group">
            @foreach ($recentProblems as $problem)
                <a href="{{ route('problems.show', $problem) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $problem->title }}</h5>
                    <p class="mb-1">{{ \Illuminate\Support\Str::limit($problem->description, 150) }}</p> {{-- مثال لاستخدام Str::limit --}}
                    <small>Category: {{ $problem->category->name ?? 'N/A' }} | Submitted by: {{ $problem->submittedBy->username ?? 'N/A' }} | Urgency: {{ $problem->urgency }}</small>
                </a>
            @endforeach
        </div>
    @endif

    {{-- يمكنك إضافة المزيد من الأقسام هنا (إحصائيات، آخر الحلول المعتمدة، إلخ) --}}

@endsection