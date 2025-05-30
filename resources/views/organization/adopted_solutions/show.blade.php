@extends('layouts.app')

@section('title', 'Adopted Solution Details - ' . ($solution->adoptingOrganization->name ?? ''))

@section('content')
    <h1>Adopted Solution Details</h1>

    <div class="card mb-3">
        <div class="card-header">Original Comment & Problem</div>
        <div class="card-body">
            @if ($solution->adoptedComment && $solution->adoptedComment->problem)
                 <p><strong>Problem:</strong> <a href="{{ route('problems.show', $solution->adoptedComment->problem) }}">{{ $solution->adoptedComment->problem->title }}</a></p>
                 <p><strong>Category:</strong> {{ $solution->adoptedComment->problem->category->name ?? 'N/A' }}</p>
                 <p><strong>Problem Status:</strong> {{ $solution->adoptedComment->problem->status ?? 'N/A' }}</p>
            @else
                <p class="text-muted">Problem or original comment not found.</p>
            @endif

            @if ($solution->adoptedComment && $solution->adoptedComment->author)
                 <p><strong>Original Comment Author:</strong>
                     @if ($solution->adoptedComment->author->isIndividual() && $solution->adoptedComment->author->userProfile)
                         {{ $solution->adoptedComment->author->userProfile->first_name ?? $solution->adoptedComment->author->username }} (Individual)
                     @elseif ($solution->adoptedComment->author->isOrganization() && $solution->adoptedComment->author->organizationProfile)
                          {{ $solution->adoptedComment->author->organizationProfile->name ?? $solution->adoptedComment->author->username }} (Organization)
                     @else
                         {{ $solution->adoptedComment->author->username ?? 'N/A' }}
                     @endif
                 </p>
                 <p><strong>Comment Content:</strong></p>
                 <div class="border p-3 mb-3">{{ $solution->adoptedComment->content }}</div>
                  <p><a href="{{ route('problems.show', $solution->adoptedComment->problem) }}#comment-{{ $solution->comment_id }}" class="btn btn-sm btn-outline-secondary">View original comment in problem</a></p>
            @else
                <p class="text-muted">Original comment or author not found.</p>
            @endif

        </div>
    </div>

     <div class="card mb-3">
         <div class="card-header">Adoption Details by {{ $solution->adoptingOrganization->name ?? 'Your Organization' }}</div>
         <div class="card-body">
             <p><strong>Adopting Organization:</strong> {{ $solution->adoptingOrganization->name ?? 'N/A' }}</p>
             <p><strong>Adoption Status:</strong> <strong>{{ $solution->status }}</strong></p>
             <p><strong>Adopted On:</strong> {{ $solution->created_at->format('Y-m-d H:i') }}</p>
             <p><strong>Last Updated:</strong> {{ $solution->updated_at->format('Y-m-d H:i') }}</p>

             <p><strong>Organization Notes:</strong></p>
             <div class="border p-3">{{ $solution->organization_notes ?? 'No notes added yet.' }}</div>

             {{-- Form to update status and notes --}}
            <h6 class="mt-4">Update Status and Notes</h6>
            <form action="{{ route('organization.updateAdoptedSolutionStatus', $solution) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        {{-- استخدم toSelectArray() لجلب القيم المناسبة للقائمة المنسدلة --}}
                        @foreach (\App\Enums\AdoptedSolutionStatusEnum::toSelectArray() as $value => $description)
                            <option value="{{ $value }}" {{ old('status', $solution->status->value ?? $solution->status) === $value ? 'selected' : '' }}>
                                {{ $description }}
                            </option>
                        @endforeach
                        {{-- (ملاحظة: $solution->status هو الآن كائن Enum، للوصول إلى القيمة استخدم $solution->status->value) --}}
                         {{-- تأكد من التعامل مع الحالة التي قد يكون فيها $solution->status لا يزال سلسلة نصية إذا لم يعمل الكاست بشكل كامل --}}

                         {{-- الكود السابق الذي كان يسبب المشكلة:
                         @foreach (\App\Enums\AdoptedSolutionStatusEnum::cases() as $case)
                            <option value="{{ $case->value }}" {{ old('status', $solution->status) === $case->value ? 'selected' : '' }}>
                                {{ $case->name }}
                            </option>
                         @endforeach
                         --}}

                    </select>
                     @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                 <div class="form-group">
                    <label for="organization_notes">Notes</label>
                    <textarea class="form-control @error('organization_notes') is-invalid @enderror" id="organization_notes" name="organization_notes" rows="3">{{ old('organization_notes', $solution->organization_notes) }}</textarea>
                     @error('organization_notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                 <button type="submit" class="btn btn-primary">Update Solution Details</button>
                  <a href="{{ route('organization.listAdoptedSolutions') }}" class="btn btn-secondary">Back to List</a>
            </form>

        </div>
    </div>

    {{-- يمكنك إضافة قسم لعرض المرفقات المرتبطة بالحل (إذا أعدت إضافتها للمشروع) --}}

@endsection