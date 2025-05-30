@extends('layouts.app')

@section('title', $organizationProfile->name . ' - Adopted Solutions')

@section('content')
    <h1>Adopted Solutions by {{ $organizationProfile->name }}</h1>

    @if ($adoptedSolutions->isEmpty())
        <p>Your organization has not adopted any comments as solutions yet.</p>
    @else
         <div class="list-group">
            @foreach ($adoptedSolutions as $solution)
                 <a href="{{ route('organization.showAdoptedSolution', $solution) }}" class="list-group-item list-group-item-action">
                     <h5 class="mb-1">Solution for: {{ $solution->adoptedComment->problem->title ?? 'N/A Problem' }}</h5>
                     <p class="mb-1">{{ \Illuminate\Support\Str::limit($solution->adoptedComment->content, 150) }}</p>
                     <small>
                         Author: {{ $solution->adoptedComment->author->username ?? 'N/A' }} |
                         Status: {{ $solution->status }} |
                         Adopted On: {{ $solution->created_at->format('Y-m-d') }}
                     </small>
                 </a>
            @endforeach
         </div>

         <div class="mt-3">
             {{ $adoptedSolutions->links() }}
         </div>
    @endif

@endsection