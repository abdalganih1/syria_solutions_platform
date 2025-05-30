@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Accounts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $accountsCount }}</h5>
                    <p class="card-text"><a href="{{ route('admin.accounts.index') }}" class="text-white">Manage Accounts</a></p>
                </div>
            </div>
        </div>
         <div class="col-md-3">
             <div class="card text-white bg-info mb-3">
                <div class="card-header">Total Problems</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $problemsCount }}</h5>
                    <p class="card-text"><a href="{{ route('admin.problems.index') }}" class="text-white">Manage Problems</a></p>
                </div>
            </div>
        </div>
         <div class="col-md-3">
             <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Comments</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $commentsCount }}</h5>
                    {{-- Add link to manage comments if needed --}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
             <div class="card text-white bg-warning mb-3">
                <div class="card-header">Adopted Solutions</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $adoptedSolutionsCount }}</h5>
                    <p class="card-text"><a href="{{ route('admin.solutions.index') }}" class="text-white">Manage Solutions</a></p>
                </div>
            </div>
        </div>
    </div>

     {{-- Links to other admin sections --}}
     <div class="mt-4">
         <h3>Management Sections</h3>
         <ul>
             <li><a href="{{ route('admin.categories.index') }}">Manage Problem Categories</a></li>
             <li><a href="{{ route('admin.badges.index') }}">Manage Badges</a></li>
             {{-- Add more links as needed --}}
         </ul>
     </div>


@endsection