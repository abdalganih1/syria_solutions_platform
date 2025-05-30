@extends('layouts.app')

@section('title', 'Admin Create Category')

@section('content')
     <h1>Admin Create Problem Category</h1>

     <form action="{{ route('admin.categories.store') }}" method="POST">
         @csrf

         <div class="form-group">
             <label for="name">Category Name</label>
             <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
              @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <div class="form-group">
             <label for="description">Description</label>
             <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
              @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <div class="form-group">
             <label for="parent_category_id">Parent Category (Optional)</label>
             <select class="form-control @error('parent_category_id') is-invalid @enderror" id="parent_category_id" name="parent_category_id">
                 <option value="">-- No Parent --</option>
                 @foreach ($categories as $category) {{-- $categories يجب أن تأتي من المتحكم --}}
                      <option value="{{ $category->id }}" {{ old('parent_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                 @endforeach
             </select>
              @error('parent_category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>


         <button type="submit" class="btn btn-primary">Create Category</button>
          <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
     </form>
@endsection