@extends('layouts.app')

@section('title', 'Edit My Profile')

@section('content')
    <h1>Edit My Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf {{-- CSRF Token --}}
        @method('PUT') {{-- Method spoofing for PUT request --}}

        <div class="card mb-3">
            <div class="card-header">Account Settings (Limited)</div> {{-- Keep sensitive account fields minimal here --}}
            <div class="card-body">
                 <div class="form-group">
                    <label for="username">Username</label>
                    {{-- Username/Email/Password changes might be in a separate page --}}
                     <input type="text" class="form-control" id="username" value="{{ $account->username }}" disabled>
                 </div>
            </div>
        </div>


         <div class="card mb-3">
            <div class="card-header">{{ $account->isIndividual() ? 'Edit Personal' : 'Edit Organization' }} Details</div>
            <div class="card-body">
                @if ($account->isIndividual())
                     {{-- Edit User Profile Fields --}}
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $profile->first_name) }}">
                         {{-- @error('first_name') <span class="invalid-feedback">{{ $message }}</span> @enderror --}}
                    </div>
                     <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $profile->last_name) }}">
                         {{-- @error('last_name') <span class="invalid-feedback">{{ $message }}</span> @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}">
                         {{-- @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror --}}
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3">{{ old('bio', $profile->bio) }}</textarea>
                         {{-- @error('bio') <span class="invalid-feedback">{{ $message }}</span> @enderror --}}
                    </div>
                @elseif ($account->isOrganization())
                    {{-- Edit Organization Profile Fields --}}
                   <div class="form-group">
                       <label for="name">Organization Name</label>
                       <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $profile->name) }}" required>
                       {{-- @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror --}}
                   </div>
                    <div class="form-group">
                       <label for="website_url">Website URL</label>
                       <input type="url" class="form-control @error('website_url') is-invalid @enderror" id="website_url" name="website_url" value="{{ old('website_url', $profile->website_url) }}">
                        {{-- @error('website_url') <span class="invalid-feedback">{{ $message }}</span> @enderror --}}
                   </div>
                    <div class="form-group">
                       <label for="contact_email">Contact Email</label>
                       <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" value="{{ old('contact_email', $profile->contact_email) }}">
                        {{-- @error('contact_email') <span class="invalid-feedback">{{ $message }}</span> @enderror --}}
                   </div>
                   <div class="form-group">
                       <label for="info">Info</label>
                       <textarea class="form-control @error('info') is-invalid @enderror" id="info" name="info" rows="3">{{ old('info', $profile->info) }}</textarea>
                        {{-- @error('info') <span class="invalid-feedback">{{ $message }}</span> @enderror --}}
                   </div>
                @endif

                 {{-- Address Fields --}}
                 <div class="card mt-4">
                     <div class="card-header">Address Information</div>
                     <div class="card-body">
                         <div class="form-group">
                             <label for="city_id">City</label>
                              <select class="form-control @error('city_id') is-invalid @enderror" id="city_id" name="city_id">
                                 <option value="">Select City</option>
                                  @foreach ($cities as $city)
                                     <option value="{{ $city->id }}" {{ old('city_id', $profile->address->city_id ?? null) == $city->id ? 'selected' : '' }}>
                                         {{ $city->name }} ({{ $city->country->name ?? 'N/A' }})
                                     </option>
                                 @endforeach
                             </select>
                              @error('city_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                         </div>
                          <div class="form-group">
                             <label for="street_address">Street Address</label>
                             <input type="text" class="form-control @error('street_address') is-invalid @enderror" id="street_address" name="street_address" value="{{ old('street_address', $profile->address->street_address ?? null) }}">
                              @error('street_address') <span class="invalid-feedback">{{ $message }}</span> @enderror
                         </div>
                         <div class="form-group">
                             <label for="postal_code">Postal Code</label>
                             <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" value="{{ old('postal_code', $profile->address->postal_code ?? null) }}">
                              @error('postal_code') <span class="invalid-feedback">{{ $message }}</span> @enderror
                         </div>
                     </div>
                 </div>


             </div>
        </div>


        <button type="submit" class="btn btn-primary">Update Profile</button>
         <a href="{{ route('profiles.show', Auth::user()) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection