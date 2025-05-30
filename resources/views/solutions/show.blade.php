@extends('layouts.app')

@section('title', 'Solution for: ' . ($solution->adoptedComment->problem->title ?? ''))

@section('content')
     <h1>Solution Details</h1>

     <div class="card mb-3">
         <div class="card-header">Problem & Original Comment</div>
         <div class="card-body">
             <p><strong>Problem:</strong> <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ $solution->adoptedComment->problem->title ?? 'N/A' }}</a></p>
             <p><strong>Original Comment Author:</strong> {{ $solution->adoptedComment->author->username ?? 'N/A' }}</p>
             <p><strong>Comment Content:</strong></p>
             <div class="border p-3 mb-3">{{ $solution->adoptedComment->content ?? 'N/A' }}</div>
              <p><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}#comment-{{ $solution->comment_id }}">View original comment in problem</a></p>
         </div>
     </div>

      <div class="card mb-3">
          <div class="card-header">Adoption Details</div>
          <div class="card-body">
              <p><strong>Adopting Organization:</strong> {{ $solution->adoptingOrganization->name ?? 'N/A' }}</p>
              <p><strong>Adoption Status:</strong> {{ $solution->status }}</p>
              <p><strong>Adopted On:</strong> {{ $solution->created_at->format('Y-m-d H:i') }}</p>
              <p><strong>Last Updated:</strong> {{ $solution->updated_at->format('Y-m-d H:i') }}</p>

              {{-- Organization notes are internal, usually not shown in public view --}}
               {{-- <p><strong>Organization Notes:</strong> {{ $solution->organization_notes ?? 'N/A' }}</p> --}}

          </div>
      </div>

       {{-- Link back to problem or list of solutions --}}
       <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}" class="btn btn-secondary">Back to Problem</a>
        <a href="{{ route('solutions.index') }}" class="btn btn-secondary">Back to Solutions List</a>


@endsection