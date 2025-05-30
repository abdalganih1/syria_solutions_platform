@extends('layouts.app')

@section('title', ($account->isIndividual() ? 'User Profile' : 'Organization Profile') . ': ' . ($profile->name ?? $profile->first_name ?? $account->username))

@section('content')
    {{-- تحديد ما إذا كان المستخدم الحالي هو صاحب الملف --}}
    @php
        $isOwner = Auth::check() && (Auth::id() === $account->id);
    @endphp

    <h1>Profile: {{ $profile->name ?? $profile->first_name ?? $account->username }}</h1>

     {{-- زر تعديل الملف الشخصي يظهر فقط إذا كان المستخدم هو صاحب الملف --}}
     @auth
          @if ($isOwner)
              <p><a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit My Profile</a></p>
          @endif
     @endauth


    <div class="card mb-3">
        <div class="card-header">Account Information</div>
        <div class="card-body">
            <p><strong>Username:</strong> {{ $account->username }}</p>
            <p><strong>Account Type:</strong> {{ ucfirst($account->account_type->value ?? $account->account_type) }}</p> {{-- استخدام value للـ Enum --}}
            <p><strong>Points:</strong> {{ $account->points }}</p>
             <p><strong>Joined:</strong> {{ $account->created_at->format('Y-m-d') }}</p>

            {{-- إظهار البريد الإلكتروني فقط للمالك أو المسؤول --}}
             @if ($isOwner || (Auth::check() && Auth::user()->isAdmin()))
                <p><strong>Email:</strong> {{ $account->email }}</p>
             @endif


        </div>
    </div>

    <div class="card mb-3">
         <div class="card-header">{{ $account->isIndividual() ? 'Personal' : 'Organization' }} Details</div>
         <div class="card-body">
             @if ($account->isIndividual())
                  {{-- Display User Profile Fields --}}
                 <p><strong>Full Name:</strong> {{ $profile->first_name ?? 'N/A' }} {{ $profile->last_name ?? 'N/A' }}</p>

                 {{-- إظهار رقم الهاتف فقط للمالك أو المسؤول --}}
                 @if ($isOwner || (Auth::check() && Auth::user()->isAdmin()))
                     <p><strong>Phone:</strong> {{ $profile->phone ?? 'N/A' }}</p>
                 @endif

                 <p><strong>Bio:</strong> {{ $profile->bio ?? 'N/A' }}</p>
             @elseif ($account->isOrganization())
                 {{-- Display Organization Profile Fields --}}
                <p><strong>Organization Name:</strong> {{ $profile->name ?? 'N/A' }}</p>
                 <p><strong>Website:</strong> <a href="{{ $profile->website_url ?? '#' }}">{{ $profile->website_url ?? 'N/A' }}</a></p>

                 {{-- إظهار البريد الإلكتروني للاتصال بالمنظمة (هذا قد يكون عاماً أو خاصاً حسب الحاجة) --}}
                 {{-- لنفترض أنه عام مبدئياً --}}
                 <p><strong>Contact Email:</strong> {{ $profile->contact_email ?? 'N/A' }}</p>

                <p><strong>Info:</strong> {{ $profile->info ?? 'N/A' }}</p>
             @endif

             {{-- Display Address if available (يمكن إظهاره بشكل عام أو جعله خاصاً) --}}
              @if ($profile->address)
                 <p><strong>Address:</strong>
                     {{ $profile->address->street_address ?? '' }}@if($profile->address->street_address), @endif
                     {{ $profile->address->city->name ?? '' }}@if($profile->address->city->name), @endif
                     {{ $profile->address->city->country->name ?? '' }}
                     {{-- إظهار الرمز البريدي فقط للمالك أو المسؤول --}}
                     @if ($isOwner || (Auth::check() && Auth::user()->isAdmin()))
                         - {{ $profile->address->postal_code ?? '' }}
                     @endif
                 </p>
             @endif
         </div>
    </div>

     {{-- Display Badges for the ACCOUNT BEING VIEWED --}}
     @if ($account->accountBadges->isNotEmpty())
          <div class="card mb-3">
             <div class="card-header">Earned Badges</div>
             <div class="card-body">
                 <div class="row">
                     @foreach ($account->accountBadges as $accountBadge)
                         <div class="col-auto mb-3">
                             <div class="text-center">
                                 @if ($accountBadge->badge->image_url)
                                     <img src="{{ asset($accountBadge->badge->image_url) }}" alt="{{ $accountBadge->badge->name }}" style="width: 50px; height: 50px;">
                                 @else
                                      <div style="width: 50px; height: 50px; background-color: #ccc; display: inline-block;"></div> {{-- Placeholder if no image --}}
                                 @endif
                                 <p class="mt-1 mb-0"><small>{{ $accountBadge->badge->name }}</small></p>
                                  <p><small class="text-muted">Awarded: {{ $accountBadge->awarded_at->format('Y-m-d') }}</small></p>
                             </div>
                         </div>
                     @endforeach
                 </div>
                 {{-- رابط "View All My Badges" يجب أن يظهر فقط إذا كان المستخدم هو صاحب الملف --}}
                  @if ($isOwner)
                    <p><a href="{{ route('profile.badges') }}" class="btn btn-sm btn-info">View All My Badges</a></p>
                 @else
                     <p><a href="{{ route('badges.index') }}">View All Available Badges</a></p> {{-- رابط عام لقائمة الألقاب --}}
                 @endif
             </div>
         </div>
     @else
          <div class="card mb-3">
             <div class="card-header">Earned Badges</div>
             <div class="card-body">
                <p>{{ $account->username }} hasn't earned any badges yet.</p>
                <p><a href="{{ route('badges.index') }}">View All Available Badges</a></p>
             </div>
         </div>
     @endif


     {{-- يمكنك إضافة قسم لعرض المشاكل التي نشرها هذا الحساب (إذا كانت عامة) --}}
     {{-- أو التعليقات التي كتبها (إذا كانت عامة) --}}

@endsection