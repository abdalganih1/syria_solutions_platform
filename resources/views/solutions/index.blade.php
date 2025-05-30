@extends('layouts.app')

@section('title', 'Approved Solutions')

@section('content')
     <h1>Approved Solutions</h1>

     <p>Browse comments that organizations have adopted and are working on.</p>

     @if ($adoptedSolutions->isEmpty())
         <p>No adopted solutions found yet.</p>
     @else
          <div class="list-group">
             @foreach ($adoptedSolutions as $solution)
                  {{-- Link to the general solution show page --}}
                  <a href="{{ route('solutions.show', $solution) }}" class="list-group-item list-group-item-action">
                      <h5 class="mb-1">Solution for: {{ $solution->adoptedComment->problem->title ?? 'N/A Problem' }}</h5>
                      <p class="mb-1">{{ \Illuminate\Support\Str::limit($solution->adoptedComment->content, 150) }}</p>
                      <small>
                          Adopted by: {{ $solution->adoptingOrganization->name ?? 'N/A Organization' }} |
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