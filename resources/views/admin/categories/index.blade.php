@extends('layouts.app')

@section('title', 'Manage Categories')

@section('content')
     <h1>Manage Problem Categories</h1>

     <p><a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a></p>

     @if ($categories->isEmpty())
         <p>No categories found.</p>
     @else
          <table class="table table-bordered">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Parent</th>
                     <th>Description</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($categories as $category)
                     <tr>
                         <td>{{ $category->id }}</td>
                         <td>{{ $category->name }}</td>
                         <td>{{ $category->parent->name ?? '-' }}</td>
                         <td>{{ \Illuminate\Support\Str::limit($category->description, 100) }}</td>
                         <td>
                              <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-secondary">Edit</a>
                             <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category? (Problems in this category may be affected)');">Delete</button>
                             </form>
                         </td>
                     </tr>
                 @endforeach
             </tbody>
         </table>
         {{-- No pagination added in controller, but can be added --}}
     @endif
@endsection