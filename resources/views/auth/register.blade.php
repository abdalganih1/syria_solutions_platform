@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf {{-- CSRF Token --}}

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="account_type" class="col-md-4 col-form-label text-md-right">Account Type</label>
                            <div class="col-md-6">
                                <select id="account_type" class="form-control @error('account_type') is-invalid @enderror" name="account_type" required>
                                    <option value="">Select Type</option>
                                    <option value="individual" {{ old('account_type') === 'individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="organization" {{ old('account_type') === 'organization' ? 'selected' : '' }}>Organization</option>
                                     {{-- 'admin' type is not for public registration --}}
                                </select>
                                 @error('account_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         {{-- Add conditional fields here based on account_type selection if needed --}}
                         {{-- Example: Organization Name field --}}
                         {{-- <div class="form-group row" id="organization-name-group" style="display: none;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Organization Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        {{-- You'll need JavaScript to show/hide these fields based on account_type select --}}


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Add JavaScript for conditional fields here --}}
     {{-- <script>
         document.getElementById('account_type').addEventListener('change', function () {
             var orgNameGroup = document.getElementById('organization-name-group');
             if (this.value === 'organization') {
                 orgNameGroup.style.display = 'flex'; // or 'block' depending on layout
             } else {
                 orgNameGroup.style.display = 'none';
             }
         });
         // Trigger on page load in case old('account_type') is organization
         document.getElementById('account_type').dispatchEvent(new Event('change'));
     </script> --}}
@endsection