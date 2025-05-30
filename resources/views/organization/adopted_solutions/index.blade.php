@extends('layouts.app')

@section('title', ($organizationProfile->name ?? 'Your Organization') . ' - Adopted Solutions')

@section('content')
    <h1>Adopted Solutions by {{ $organizationProfile->name ?? 'Your Organization' }}</h1>

    <p>Here are the comments that your organization has officially adopted as potential solutions.</p>

    @if ($adoptedSolutions->isEmpty())
        <div class="alert alert-info">
            Your organization has not adopted any comments as solutions yet. Explore the <a href="{{ route('problems.index') }}">problems</a> and find comments that align with your mission!
        </div>
    @else
         <div class="list-group">
            @foreach ($adoptedSolutions as $solution)
                 <a href="{{ route('organization.showAdoptedSolution', $solution) }}" class="list-group-item list-group-item-action">
                     <h5 class="mb-1">Solution for: {{ $solution->adoptedComment->problem->title ?? 'N/A Problem' }}</h5>
                     <p class="mb-1">{{ \Illuminate\Support\Str::limit($solution->adoptedComment->content, 150) }}</p>
                     <small>
                         Original Comment by: {{ $solution->adoptedComment->author->username ?? 'N/A' }} |
                         Current Status: <strong>{{ $solution->status }}</strong> |
                         Adopted On: {{ $solution->created_at->format('Y-m-d') }}
                     </small>
                 </a>
            @endforeach
         </div>

         <div class="mt-3">
             {{ $adoptedSolutions->links() }} {{-- لعرض روابط ترقيم الصفحات --}}
         </div>
    @endif

@endsection