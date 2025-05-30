@extends('layouts.app')

@section('title', 'Manage Accounts')

@section('content')
    <h1>Manage Accounts</h1>

     {{-- Link to create new account manually by admin if needed --}}
     {{-- <p><a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">Add New Account</a></p> --}}

    @if ($accounts->isEmpty())
        <p>No accounts found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Points</th>
                    <th>Active</th>
                    <th>Registered At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->username }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ ucfirst($account->account_type) }}</td>
                        <td>{{ $account->points }}</td>
                        <td>{{ $account->is_active ? 'Yes' : 'No' }}</td>
                        <td>{{ $account->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.accounts.edit', $account) }}" class="btn btn-sm btn-secondary">Edit</a>
                            @if (Auth::id() !== $account->id) {{-- لا تسمح للمسؤول بحذف حسابه من هنا --}}
                                <form action="{{ route('admin.accounts.destroy', $account) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this account and all its data?');">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $accounts->links() }}
        </div>
    @endif
@endsection