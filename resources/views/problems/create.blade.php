@extends('layouts.app')

@section('title', 'Post a New Problem')

@section('content')
    <h1>Post a New Problem</h1>

    <form action="{{ route('problems.store') }}" method="POST">
        @csrf {{-- CSRF Token --}}

        <div class="form-group">
            <label for="title">Problem Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description">Detailed Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                <option value="">Select a Category</option>
                @foreach ($categories as $category)
                     {{-- يمكنك تحسين هذا لعرض الفئات المتداخلة بشكل مناسب --}}
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

         <div class="form-group">
            <label for="urgency">Urgency Level</label>
            <select class="form-control @error('urgency') is-invalid @enderror" id="urgency" name="urgency" required>
                <option value="">Select Urgency</option>
                <option value="Low" {{ old('urgency') === 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ old('urgency') === 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ old('urgency') === 'High' ? 'selected' : '' }}>High</option>
            </select>
             @error('urgency') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="tags">Tags (comma-separated)</label>
            <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags') }}">
            @error('tags') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit Problem</button>
         <a href="{{ route('problems.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection