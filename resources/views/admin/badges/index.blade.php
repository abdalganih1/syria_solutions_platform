@extends('layouts.app')

@section('title', 'Admin Manage Badges')

@section('content')
     <h1>Admin Manage Badges</h1>

     <p><a href="{{ route('admin.badges.create') }}" class="btn btn-primary">Create New Badge</a></p>

     @if ($badges->isEmpty())
         <p>No badges found.</p>
     @else
          <table class="table table-bordered">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Image</th>
                     <th>Req. Points</th>
                     <th>Req. Adopted Comments</th>
                     <th>Description</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($badges as $badge)
                     <tr>
                         <td>{{ $badge->id }}</td>
                         <td>{{ $badge->name }}</td>
                         <td>
                             @if ($badge->image_url)
                                 <img src="{{ asset($badge->image_url) }}" alt="{{ $badge->name }}" style="width: 30px; height: 30px;">
                             @else
                                 No Image
                             @endif
                         </td>
                         <td>{{ $badge->required_points }}</td>
                         <td>{{ $badge->required_adopted_comments_count }}</td>
                         <td>{{ \Illuminate\Support\Str::limit($badge->description, 100) }}</td>
                         <td>
                              <a href="{{ route('admin.badges.edit', $badge) }}" class="btn btn-sm btn-secondary">Edit</a>
                             <form action="{{ route('admin.badges.destroy', $badge) }}" method="POST" class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this badge?');">Delete</button>
                             </form>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
         {{-- No pagination added in controller --}}
     @endif
@endsection