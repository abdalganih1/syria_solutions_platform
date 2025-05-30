 @extends('layouts.app')

@section('title', 'Manage Problems')

@section('content')
     <h1>Manage Problems</h1>

     {{-- Admin might create problems from here too --}}
     {{-- <p><a href="{{ route('admin.problems.create') }}" class="btn btn-primary">Create New Problem</a></p> --}}

    @if ($problems->isEmpty())
        <p>No problems found.</p>
    @else
         <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Submitter</th>
                    <th>Category</th>
                    <th>Urgency</th>
                    <th>Status</th>
                    <th>Posted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($problems as $problem)
                    <tr>
                        <td>{{ $problem->id }}</td>
                        <td><a href="{{ route('problems.show', $problem) }}">{{ \Illuminate\Support\Str::limit($problem->title, 50) }}</a></td> {{-- رابط لصفحة عرض المشكلة العامة --}}
                        <td>{{ $problem->submittedBy->username ?? 'N/A' }}</td>
                        <td>{{ $problem->category->name ?? 'N/A' }}</td>
                        <td>{{ $problem->urgency }}</td>
                        <td>{{ $problem->status }}</td>
                        <td>{{ $problem->created_at->format('Y-m-d') }}</td>
                        <td>
                             {{-- Link to admin edit page --}}
                            <a href="{{ route('admin.problems.edit', $problem) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('admin.problems.destroy', $problem) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this problem and all associated data (comments, solutions)?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

         <div class="mt-3">
             {{ $problems->links() }}
         </div>
    @endif
@endsection