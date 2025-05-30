@extends('layouts.app')

@section('title', 'Available Badges')

@section('content')
    <h1>Available Badges</h1>

    @if ($badges->isEmpty())
        <p>No badges defined yet.</p>
    @else
        <div class="row">
            @foreach ($badges as $badge)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($badge->image_url)
                            <img src="{{ asset($badge->image_url) }}" class="card-img-top" alt="{{ $badge->name }}" style="max-height: 150px; object-fit: contain;"> {{-- يمكنك تعديل الحجم والتنسيق --}}
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $badge->name }}</h5>
                            <p class="card-text">{{ $badge->description }}</p>
                            <p class="card-text"><small class="text-muted">Criteria:</small></p>
                            <ul class="card-text">
                                @if ($badge->required_points > 0)
                                    <li>Earn {{ $badge->required_points }} points.</li>
                                @endif
                                @if ($badge->required_adopted_comments_count > 0)
                                    <li>Have {{ $badge->required_adopted_comments_count }} comment(s) adopted as solutions.</li>
                                @endif
                                 @if ($badge->required_points == 0 && $badge->required_adopted_comments_count == 0 && $badge->criteria_description)
                                     <li>{{ $badge->criteria_description }}</li> {{-- إذا كان هناك وصف يدوي --}}
                                 @elseif ($badge->required_points == 0 && $badge->required_adopted_comments_count == 0)
                                      <li>Criteria not specified.</li> {{-- لعدم وجود معيار محدد --}}
                                 @endif

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection