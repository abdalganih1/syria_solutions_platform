@extends('layouts.app')

@section('title', ($organizationProfile->name ?? 'Your Organization') . ' - Manage Interests')

@section('content')
     <h1>Manage Category Interests for {{ $organizationProfile->name ?? 'Your Organization' }}</h1>

     <p>Select the problem categories your organization is interested in. This might help us show you relevant problems and comments.</p>

     <form action="{{ route('organization.updateCategoryInterests') }}" method="POST">
         @csrf

         <div class="form-group">
             <label>Problem Categories:</label>
             @error('categories') <div class="text-danger">Please select valid categories.</div> @enderror

             @foreach ($allCategories as $category)
                 <div class="form-check">
                     <input class="form-check-input @error('categories') is-invalid @enderror" type="checkbox" name="categories[]" value="{{ $category->id }}" id="category_{{ $category->id }}" {{ in_array($category->id, old('categories', $organizationInterests)) ? 'checked' : '' }}>
                     <label class="form-check-label" for="category_{{ $category->id }}">
                         <strong>{{ $category->name }}</strong>
                         @if ($category->description)
                              <small class="text-muted">({{ \Illuminate\Support\Str::limit($category->description, 50) }})</small>
                         @endif
                     </label>
                 </div>
                 @if ($category->children->isNotEmpty())
                     <div class="ml-4"> {{-- Indent subcategories --}}
                         @foreach ($category->children as $childCategory)
                             <div class="form-check">
                                  <input class="form-check-input @error('categories') is-invalid @enderror" type="checkbox" name="categories[]" value="{{ $childCategory->id }}" id="category_{{ $childCategory->id }}" {{ in_array($childCategory->id, old('categories', $organizationInterests)) ? 'checked' : '' }}>
                                  <label class="form-check-label" for="category_{{ $childCategory->id }}">
                                     {{ $childCategory->name }}
                                      @if ($childCategory->description)
                                        <small class="text-muted">({{ \Illuminate\Support\Str::limit($childCategory->description, 50) }})</small>
                                     @endif
                                 </label>
                             </div>
                         @endforeach
                     </div>
                 @endif
             @endforeach
             {{-- @error('categories.*') <span class="text-danger">{{ $message }}</span> @enderror --}} {{-- إذا أردت عرض خطأ لكل عنصر في المصفوفة --}}
         </div>


         <button type="submit" class="btn btn-primary">Update Interests</button>
         {{-- Redirect to a relevant page after updating, e.g., list of adopted solutions --}}
         <a href="{{ route('organization.listAdoptedSolutions') }}" class="btn btn-secondary">Cancel</a>

     </form>
@endsection