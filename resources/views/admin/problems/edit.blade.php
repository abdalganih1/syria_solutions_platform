@extends('layouts.app')

@section('title', 'Admin Edit Problem: ' . $problem->title)

@section('content')
     <h1>Admin Edit Problem</h1>

     <form action="{{ route('admin.problems.update', $problem) }}" method="POST">
         @csrf
         @method('PUT')

         <div class="form-group">
             <label for="title">Problem Title</label>
             <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $problem->title) }}" required>
              @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <div class="form-group">
             <label for="description">Detailed Description</label>
             <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description', $problem->description) }}</textarea>
              @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <div class="form-group">
             <label for="category_id">Category</label>
             <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                 <option value="">Select a Category</option>
                 @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ old('category_id', $problem->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                 @endforeach
             </select>
             @error('category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

          <div class="form-group">
             <label for="urgency">Urgency Level</label>
             <select class="form-control @error('urgency') is-invalid @enderror" id="urgency" name="urgency" required>
                 <option value="Low" {{ old('urgency', $problem->urgency) === 'Low' ? 'selected' : '' }}>Low</option>
                 <option value="Medium" {{ old('urgency', $problem->urgency) === 'Medium' ? 'selected' : '' }}>Medium</option>
                 <option value="High" {{ old('urgency', $problem->urgency) === 'High' ? 'selected' : '' }}>High</option>
             </select>
              @error('urgency') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <div class="form-group">
             <label for="status">Status</label>
             <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                 <option value="Draft" {{ old('status', $problem->status) === 'Draft' ? 'selected' : '' }}>Draft</option>
                 <option value="Published" {{ old('status', $problem->status) === 'Published' ? 'selected' : '' }}>Published</option>
                 <option value="UnderReview" {{ old('status', $problem->status) === 'UnderReview' ? 'selected' : '' }}>Under Review</option>
                 <option value="Hidden" {{ old('status', $problem->status) === 'Hidden' ? 'selected' : '' }}>Hidden</option>
                 <option value="Suspended" {{ old('status', $problem->status) === 'Suspended' ? 'selected' : '' }}>Suspended</option>
                 <option value="Resolved" {{ old('status', $problem->status) === 'Resolved' ? 'selected' : '' }}>Resolved</option>
                 <option value="Archived" {{ old('status', $problem->status) === 'Archived' ? 'selected' : '' }}>Archived</option>
             </select>
              @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <div class="form-group">
             <label for="tags">Tags (comma-separated)</label>
             <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags', $problem->tags) }}">
              @error('tags') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <button type="submit" class="btn btn-primary">Update Problem</button>
          <a href="{{ route('admin.problems.index') }}" class="btn btn-secondary">Cancel</a>
     </form>
@endsection