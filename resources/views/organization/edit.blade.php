 @extends('layouts.app')

@section('title', $organizationProfile->name . ' - Manage Interests')

@section('content')
     <h1>Manage Category Interests for {{ $organizationProfile->name }}</h1>

     <p>Select the problem categories your organization is interested in:</p>

     <form action="{{ route('organization.updateCategoryInterests') }}" method="POST">
         @csrf

         <div class="form-group">
             @error('categories') <span class="text-danger">Please select at least one valid category.</span> @enderror

             @foreach ($allCategories as $category)
                 <div class="form-check">
                     <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category_{{ $category->id }}" {{ in_array($category->id, old('categories', $organizationInterests)) ? 'checked' : '' }}>
                     <label class="form-check-label" for="category_{{ $category->id }}">
                         <strong>{{ $category->name }}</strong>
                     </label>
                 </div>
                 @if ($category->children->isNotEmpty())
                     <div class="ml-4"> {{-- Indent subcategories --}}
                         @foreach ($category->children as $childCategory)
                             <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $childCategory->id }}" id="category_{{ $childCategory->id }}" {{ in_array($childCategory->id, old('categories', $organizationInterests)) ? 'checked' : '' }}>
                                  <label class="form-check-label" for="category_{{ $childCategory->id }}">
                                     {{ $childCategory->name }}
                                 </label>
                             </div>
                         @endforeach
                     </div>
                 @endif
             @endforeach
         </div>


         <button type="submit" class="btn btn-primary">Update Interests</button>
         {{-- Redirect to a relevant page, e.g., list of adopted solutions --}}
         <a href="{{ route('organization.listAdoptedSolutions') }}" class="btn btn-secondary">Cancel</a>

     </form>
@endsection