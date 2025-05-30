 @extends('layouts.app')

@section('title', 'My Badges')

@section('content')
     <h1>My Badges - {{ $account->username }}</h1>

     <p>Total Points: {{ $account->points }}</p>

    @if ($badges->isEmpty())
        <p>You haven't earned any badges yet. Keep contributing!</p>
    @else
        <div class="row">
            @foreach ($badges as $accountBadge)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($accountBadge->badge->image_url)
                            <img src="{{ asset($accountBadge->badge->image_url) }}" class="card-img-top" alt="{{ $accountBadge->badge->name }}" style="max-height: 150px; object-fit: contain;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $accountBadge->badge->name }}</h5>
                            <p class="card-text">{{ $accountBadge->badge->description }}</p>
                            <p class="card-text"><small class="text-muted">Awarded On: {{ $accountBadge->awarded_at->format('Y-m-d H:i') }}</small></p>
                             {{-- Criteria can be shown again if needed --}}
                             <p><a href="{{ route('badges.index') }}">View All Badges</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection