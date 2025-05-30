@extends('layouts.app')

@section('title', 'Admin Adopted Solution: ' . ($solution->adoptedComment->problem->title ?? ''))

@section('content')
     <h1>Admin View Adopted Solution</h1>

     <div class="card mb-3">
         <div class="card-header">Original Comment & Problem</div>
         <div class="card-body">
             <p><strong>Problem:</strong> <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ $solution->adoptedComment->problem->title ?? 'N/A' }}</a></p>
             <p><strong>Original Comment Author:</strong> {{ $solution->adoptedComment->author->username ?? 'N/A' }}</p>
             <p><strong>Comment Content:</strong></p>
             <div class="border p-3 mb-3">{{ $solution->adoptedComment->content ?? 'N/A' }}</div>
              <p><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}#comment-{{ $solution->comment_id }}">View original comment in problem</a></p>
         </div>
     </div>

      <div class="card mb-3">
          <div class="card-header">Adoption Details by {{ $solution->adoptingOrganization->name ?? 'N/A Organization' }}</div>
          <div class="card-body">
              <p><strong>Adopting Organization:</strong> {{ $solution->adoptingOrganization->name ?? 'N/A' }}</p>
              <p><strong>Adoption Status:</strong> {{ $solution->status }}</p>
              <p><strong>Adopted On:</strong> {{ $solution->created_at->format('Y-m-d H:i') }}</p>
              <p><strong>Last Updated:</strong> {{ $solution->updated_at->format('Y-m-d H:i') }}</p>

               <p><strong>Organization Notes:</strong></p>
              <div class="border p-3">{{ $solution->organization_notes ?? 'No notes added yet.' }}</div>


              {{-- Form to update status and notes (similar to OrganizationController but for Admin) --}}
              <h6 class="mt-4">Update Status and Notes</h6>
              <form action="{{ route('admin.solutions.update', $solution) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label for="status">Status</label>
                      <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                          <option value="UnderConsideration" {{ old('status', $solution->status) === 'UnderConsideration' ? 'selected' : '' }}>Under Consideration</option>
                          <option value="Adopted" {{ old('status', $solution->status) === 'Adopted' ? 'selected' : '' }}>Adopted</option>
                          <option value="ImplementationInProgress" {{ old('status', $solution->status) === 'ImplementationInProgress' ? 'selected' : '' }}>Implementation In Progress</option>
                          <option value="ImplementationCompleted" {{ old('status', $solution->status) === 'ImplementationCompleted' ? 'selected' : '' }}>Implementation Completed</option>
                          <option value="RejectedByOrganization" {{ old('status', $solution->status) === 'RejectedByOrganization' ? 'selected' : '' }}>Rejected by Organization</option>
                      </select>
                       @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
                   <div class="form-group">
                      <label for="organization_notes">Notes</label>
                      <textarea class="form-control @error('organization_notes') is-invalid @enderror" id="organization_notes" name="organization_notes" rows="3">{{ old('organization_notes', $solution->organization_notes) }}</textarea>
                       @error('organization_notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                  </div>
                   <button type="submit" class="btn btn-primary">Update Solution Details</button>
              </form>
          </div>
      </div>

      {{-- Delete button --}}
      <form action="{{ route('admin.solutions.destroy', $solution) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this adopted solution?');">Delete Adopted Solution</button>
      </form>
       <a href="{{ route('admin.solutions.index') }}" class="btn btn-secondary">Back to List</a>


@endsection