<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Syria Reconstruction Platform')</title>
    <!-- يمكنك إضافة روابط لملفات CSS هنا -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> {{-- مثال Bootstrap --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> {{-- مثال Font Awesome --}}
    <style>
        .navbar { margin-bottom: 20px; }
        .footer { margin-top: 20px; padding: 20px 0; background-color: #f8f9fa; }
    </style>
</head>
<body>
    <div id="app"> {{-- يمكن استخدام هذا للواجهة الأمامية التي تستخدم Vue/React --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Syria Reconstruction Platform
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('problems.index') }}">Problems</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('badges.index') }}">Badges</a>
                        </li>
                         {{-- Add more navigation links here --}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} {{-- عرض اسم المستخدم المسجل دخوله --}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profiles.show', Auth::user()) }}">My Profile</a>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                                     <a class="dropdown-item" href="{{ route('profile.badges') }}">My Badges</a>

                                    {{-- Add organization specific links if user is an organization --}}
                                     @if (Auth::user()->isOrganization())
                                         <a class="dropdown-item" href="{{ route('organization.listAdoptedSolutions') }}">My Adopted Solutions</a>
                                         <a class="dropdown-item" href="{{ route('organization.editCategoryInterests') }}">My Interests</a>
                                     @endif

                                     {{-- Add admin specific links if user is an admin --}}
                                     @if (Auth::user()->isAdmin())
                                         <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                                     @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                 {{-- Display success or error messages --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                @yield('content') {{-- هذا هو الجزء الذي سيتم ملؤه بمحتوى كل صفحة فردية --}}
            </div>
        </main>

        <footer class="footer">
            <div class="container text-center">
                <p>&copy; {{ date('Y') }} Syria Reconstruction Platform. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- يمكنك إضافة روابط لملفات JavaScript هنا -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>