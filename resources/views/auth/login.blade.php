@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf {{-- CSRF Token --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                {{-- يمكنك إضافة رابط "Forgot Your Password?" هنا إذا كان لديك هذه الميزة --}}
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>

                    {{-- --- Development Login Buttons (for testing) --- --}}
                    {{-- هذا القسم يظهر فقط لسهولة الاختبار في بيئة التطوير --}}
                    @if (app()->environment('local') || app()->environment('staging')) {{-- يمكنك التحكم في بيئات الظهور --}}
                        <hr class="my-4">
                        <div class="text-center">
                            <h5>Quick Login (Development)</h5>
                            <p class="text-muted">Password for all test accounts: <strong>password</strong></p>

                            {{-- Admin Login Form --}}
                            <form method="POST" action="{{ route('login') }}" class="d-inline-block mr-2">
                                @csrf
                                <input type="hidden" name="email" value="admin@example.com">
                                <input type="hidden" name="password" value="password">
                                <button type="submit" class="btn btn-danger btn-sm">Login as Admin</button>
                            </form>

                             {{-- Individual User Login Form --}}
                            <form method="POST" action="{{ route('login') }}" class="d-inline-block mr-2">
                                @csrf
                                <input type="hidden" name="email" value="user@example.com">
                                <input type="hidden" name="password" value="password">
                                <button type="submit" class="btn btn-secondary btn-sm">Login as Test User</button>
                            </form>

                             {{-- Organization Login Form --}}
                            <form method="POST" action="{{ route('login') }}" class="d-inline-block mr-2">
                                @csrf
                                <input type="hidden" name="email" value="org@example.com">
                                <input type="hidden" name="password" value="password">
                                <button type="submit" class="btn btn-info btn-sm">Login as Test Organization</button>
                            </form>
                        </div>
                     @endif
                    {{-- --- End Development Login Buttons --- --}}

                </div>
            </div>
        </div>
    </div>
@endsection