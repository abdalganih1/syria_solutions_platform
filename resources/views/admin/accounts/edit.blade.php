 @extends('layouts.app')

@section('title', 'Edit Account: ' . $account->username)

@section('content')
     <h1>Edit Account</h1>

     <form action="{{ route('admin.accounts.update', $account) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $account->username) }}" required>
             @error('username') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $account->email) }}" required>
             @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

         {{-- Password change should be a separate form/feature for security --}}
         {{-- <div class="form-group">
            <label for="password">New Password (leave blank to keep current)</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
             @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div> --}}

         <div class="form-group">
            <label for="account_type">Account Type</label>
             <select class="form-control @error('account_type') is-invalid @enderror" id="account_type" name="account_type" required>
                 <option value="individual" {{ old('account_type', $account->account_type) === 'individual' ? 'selected' : '' }}>Individual</option>
                 <option value="organization" {{ old('account_type', $account->account_type) === 'organization' ? 'selected' : '' }}>Organization</option>
                 <option value="admin" {{ old('account_type', $account->account_type) === 'admin' ? 'selected' : '' }}>Admin</option>
             </select>
              @error('account_type') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="points">Points</label>
            <input type="number" class="form-control @error('points') is-invalid @enderror" id="points" name="points" value="{{ old('points', $account->points) }}" required min="0">
             @error('points') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

         <div class="form-group form-check">
            <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" value="1" {{ old('is_active', $account->is_active) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Is Active</label>
             @error('is_active') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        {{-- Note: Editing user/org profile details (name, phone, bio, address) would require
             fetching/saving the associated profile model based on account_type.
             For simplicity here, we only include Account table fields.
        --}}


        <button type="submit" class="btn btn-primary">Update Account</button>
         <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary">Cancel</a>
     </form>
@endsection