@extends('layouts.app')

@section('title', 'Problems')

@section('content')
    <h1>Problems</h1>

    @auth {{-- Only show create button if authenticated --}}
        <p><a href="{{ route('problems.create') }}" class="btn btn-primary">Post a New Problem</a></p>
    @endauth

    @if ($problems->isEmpty())
        <p>No problems found.</p>
    @else
        <div class="list-group">
            @foreach ($problems as $problem)
                <div class="list-group-item"> {{-- Use div instead of a if you add internal links --}}
                    <a href="{{ route('problems.show', $problem) }}" class="text-decoration-none text-dark">
                        <h5 class="mb-1">{{ $problem->title }}</h5>
                    </a>
                    <p class="mb-1">{{ \Illuminate\Support\Str::limit($problem->description, 200) }}</p>
                    <small>
                        Category: {{ $problem->category->name ?? 'N/A' }} |
                        Submitted by:
                        @if ($problem->submittedBy->isIndividual() && $problem->submittedBy->userProfile)
                            {{ $problem->submittedBy->userProfile->first_name ?? $problem->submittedBy->username }}
                        @elseif ($problem->submittedBy->isOrganization() && $problem->submittedBy->organizationProfile)
                             {{ $problem->submittedBy->organizationProfile->name ?? $problem->submittedBy->username }}
                        @else
                            {{ $problem->submittedBy->username ?? 'N/A' }}
                        @endif
                        | Urgency: {{ $problem->urgency }} | Status: {{ $problem->status }}
                        | Posted: {{ $problem->created_at->diffForHumans() }} {{-- مثال لعرض الوقت بشكل ودي --}}
                    </small>

                    {{-- Edit/Delete buttons for the owner or admin --}}
                    @auth
                        @if (Auth::user()->id === $problem->submitted_by_account_id || Auth::user()->isAdmin())
                            <div class="mt-2">
                                <a href="{{ route('problems.edit', $problem) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('problems.destroy', $problem) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this problem?');">Delete</button>
                                </form>
                            </div>
                        @endif
                    @endauth

                </div>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $problems->links() }} {{-- لعرض روابط ترقيم الصفحات --}}
        </div>

    @endif

@endsection