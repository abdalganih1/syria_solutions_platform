 @extends('layouts.app')

@section('title', 'Admin Create Badge')

@section('content')
     <h1>Admin Create Badge</h1>

     <form action="{{ route('admin.badges.store') }}" method="POST">
         @csrf

         <div class="form-group">
             <label for="name">Badge Name</label>
             <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
              @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

          <div class="form-group">
             <label for="description">Description</label>
             <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
              @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

          <div class="form-group">
             <label for="image_url">Image URL</label>
             <input type="text" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url') }}">
              @error('image_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

          <div class="form-group">
             <label for="required_points">Required Points</label>
             <input type="number" class="form-control @error('required_points') is-invalid @enderror" id="required_points" name="required_points" value="{{ old('required_points', 0) }}" required min="0">
              @error('required_points') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

          <div class="form-group">
             <label for="required_adopted_comments_count">Required Adopted Comments Count</label>
             <input type="number" class="form-control @error('required_adopted_comments_count') is-invalid @enderror" id="required_adopted_comments_count" name="required_adopted_comments_count" value="{{ old('required_adopted_comments_count', 0) }}" required min="0">
              @error('required_adopted_comments_count') <span class="invalid-feedback">{{ $message }}</span> @enderror
         </div>

         <button type="submit" class="btn btn-primary">Create Badge</button>
          <a href="{{ route('admin.badges.index') }}" class="btn btn-secondary">Cancel</a>
     </form>
@endsection