@extends('layouts.app')

@section('title', $problem->title)

@section('content')
    <h1>{{ $problem->title }}</h1>

    <p>Category: {{ $problem->category->name ?? 'N/A' }} | Urgency: {{ $problem->urgency }} | Status: {{ $problem->status }}</p>
    <p>Submitted by:
        @if ($problem->submittedBy->isIndividual() && $problem->submittedBy->userProfile)
            {{ $problem->submittedBy->userProfile->first_name ?? $problem->submittedBy->username }}
        @elseif ($problem->submittedBy->isOrganization() && $problem->submittedBy->organizationProfile)
             {{ $problem->submittedBy->organizationProfile->name ?? $problem->submittedBy->username }}
        @else
            {{ $problem->submittedBy->username ?? 'N/A' }}
        @endif
         on {{ $problem->created_at->format('Y-m-d') }}
     </p>
     @if ($problem->tags)
         <p>Tags: {{ $problem->tags }}</p> {{-- يمكنك تحويلها لروابط tags لاحقاً --}}
     @endif

    <hr>

    <p>{{ $problem->description }}</p>

     {{-- Edit/Delete buttons for the owner or admin --}}
    @auth
        @if (Auth::user()->id === $problem->submitted_by_account_id || Auth::user()->isAdmin())
            <div class="mt-2">
                <a href="{{ route('problems.edit', $problem) }}" class="btn btn-sm btn-secondary">Edit Problem</a>
                <form action="{{ route('problems.destroy', $problem) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this problem?');">Delete Problem</button>
                </form>
            </div>
        @endif
    @endauth


    <hr>

    <h2>Comments ({{ $problem->comments->count() }})</h2>

    {{-- Form to add a new root comment --}}
    @auth
        <div class="card mb-3">
            <div class="card-header">Add a Comment</div>
            <div class="card-body">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="problem_id" value="{{ $problem->id }}">
                    <div class="form-group">
                        <textarea name="content" class="form-control" rows="3" required>{{ old('content') }}</textarea>
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    @else
         <p>Please <a href="{{ route('login') }}">login</a> to post a comment.</p>
    @endauth


    {{-- Display comments (recursive for replies could be complex, a simple flat list or limited nesting is easier initially) --}}
    @if ($problem->comments->isEmpty())
        <p>No comments yet. Be the first to comment!</p>
    @else
        <div id="comments-section"> {{-- Anchor for navigating to comments --}}
            @include('partials.comments', ['comments' => $problem->comments]) {{-- استخدام جزء منفصل لعرض التعليقات والردود --}}
        </div>
    @endif

@endsection

{{-- تحتاج لإنشاء جزء (Partial) لعارض التعليقات والردود: resources/views/partials/comments.blade.php --}}
{{-- هذا الجزء سيتم استدعاؤه بشكل متكرر لعرض الردود --}}
