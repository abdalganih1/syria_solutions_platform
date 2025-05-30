@extends('layouts.app')

@section('title', 'Admin Edit Category: ' . $category->name)

@section('content')
     <h1>Admin Edit Problem Category</h1>

     <form action="{{ route('admin.categories.update', $category) }}" method="POST">
         @csrf
         @method('PUT')

         <div class="form-group">
             <label for="name">Category Name</label>
             <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
              @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <div class="form-group">
             <label for="description">Description</label>
             <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
              @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <div class="form-group">
             <label for="parent_category_id">Parent Category (Optional)</label>
             <select class="form-control @error('parent_category_id') is-invalid @enderror" id="parent_category_id" name="parent_category_id">
                 <option value="">-- No Parent --</option>
                 @foreach ($categories as $parentCategory) {{-- $categories يجب أن تأتي من المتحكم --}}
                      {{-- لا تسمح للفئة بأن تكون ابناً لنفسها أو لأبنائها --}}
                      @if ($parentCategory->id !== $category->id && ! $category->children->contains('id', $parentCategory->id) ) {{-- Child check might be complex --}}
                         <option value="{{ $parentCategory->id }}" {{ old('parent_category_id', $category->parent_category_id) == $parentCategory->id ? 'selected' : '' }}>{{ $parentCategory->name }}</option>
                      @endif
                 @endforeach
             </select>
              @error('parent_category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>


         <button type="submit" class="btn btn-primary">Update Category</button>
          <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
     </form>
@endsection