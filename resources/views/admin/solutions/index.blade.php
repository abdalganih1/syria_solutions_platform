@extends('layouts.app')

@section('title', 'Admin Manage Adopted Solutions')

@section('content')
     <h1>Admin Manage Adopted Solutions</h1>

     @if ($adoptedSolutions->isEmpty())
         <p>No adopted solutions found.</p>
     @else
          <table class="table table-bordered">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Comment ID</th>
                     <th>Problem Title</th>
                     <th>Original Author</th>
                     <th>Adopting Org</th>
                     <th>Status</th>
                     <th>Adopted At</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($adoptedSolutions as $solution)
                     <tr>
                         <td>{{ $solution->id }}</td>
                         <td>{{ $solution->comment_id }}</td>
                         <td><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ \Illuminate\Support\Str::limit($solution->adoptedComment->problem->title ?? 'N/A', 50) }}</a></td>
                         <td>{{ $solution->adoptedComment->author->username ?? 'N/A' }}</td>
                         <td>{{ $solution->adoptingOrganization->name ?? 'N/A' }}</td>
                         <td>{{ $solution->status }}</td>
                         <td>{{ $solution->created_at->format('Y-m-d') }}</td>
                         <td>
                             {{-- Link to admin show page --}}
                              <a href="{{ route('admin.solutions.show', $solution) }}" class="btn btn-sm btn-info">View</a>
                              {{-- No edit link based on routes, status is updated via show page form --}}
                             <form action="{{ route('admin.solutions.destroy', $solution) }}" method="POST" class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this adopted solution?');">Delete</button>
                             </form>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>

         <div class="mt-3">
             {{ $adoptedSolutions->links() }}
         </div>
     @endif
@endsection