{{-- resources/views/partials/comments.blade.php --}}

@foreach ($comments as $comment)
    <div class="media mb-4 border p-3" id="comment-{{ $comment->id }}" style="margin-left: {{ ($comment->parent_comment_id !== null) ? '40px' : '0' }};">
        @if ($comment->author->isIndividual() && $comment->author->userProfile)
             {{-- يمكنك هنا إضافة صورة المستخدم/المنظمة إذا كانت متوفرة --}}
             <img src="https://via.placeholder.com/50?text={{ substr($comment->author->userProfile->first_name ?? $comment->author->username, 0, 1) }}" class="mr-3 rounded-circle" alt="User Avatar"> {{-- صورة وهمية --}}
        @elseif ($comment->author->isOrganization() && $comment->author->organizationProfile)
             <img src="https://via.placeholder.com/50?text={{ substr($comment->author->organizationProfile->name ?? $comment->author->username, 0, 1) }}" class="mr-3 rounded-circle" alt="Organization Logo"> {{-- صورة وهمية --}}
        @else
             <img src="https://via.placeholder.com/50?text=?" class="mr-3 rounded-circle" alt="Avatar"> {{-- صورة وهمية --}}
        @endif

        <div class="media-body">
            <h5 class="mt-0">
                {{-- إضافة الرابط حول اسم المستخدم --}}
                <a href="{{ route('profiles.show', $comment->author) }}" class="text-dark">{{ $comment->author->username ?? 'N/A' }}</a>
                <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small>
            </h5>

            <p>{{ $comment->content }}</p>

            {{-- Comment Votes (Stack Overflow style) --}}
            <div class="d-flex align-items-center">
                @auth
                     {{-- Upvote Button --}}
                    <form action="{{ route('comments.vote', $comment) }}" method="POST" class="d-inline vote-form">
                        @csrf
                        <input type="hidden" name="vote_value" value="1">
                        <button type="submit" class="btn btn-sm btn-outline-success @if(Auth::user()->commentVotes()->where('comment_id', $comment->id)->where('vote_value', 1)->exists()) active @endif">
                            <i class="fas fa-arrow-up"></i>
                        </button>
                    </form>

                     {{-- Vote Count (will update via JS eventually) --}}
                    <span class="mx-2 font-weight-bold comment-vote-count">{{ $comment->total_votes }}</span>

                     {{-- Downvote Button --}}
                    <form action="{{ route('comments.vote', $comment) }}" method="POST" class="d-inline vote-form">
                        @csrf
                        <input type="hidden" name="vote_value" value="-1">
                        <button type="submit" class="btn btn-sm btn-outline-danger @if(Auth::user()->commentVotes()->where('comment_id', $comment->id)->where('vote_value', -1)->exists()) active @endif">
                            <i class="fas fa-arrow-down"></i>
                        </button>
                    </form>

                    {{-- Reply Button --}}
                    <button class="btn btn-sm btn-link ml-2 reply-button" data-comment-id="{{ $comment->id }}">Reply</button>

                    {{-- Edit/Delete buttons for owner or admin --}}
                     @if (Auth::user()->id === $comment->author_account_id || Auth::user()->isAdmin())
                         <a href="{{ route('comments.edit', $comment) }}" class="btn btn-sm btn-link ml-2">Edit</a>
                         <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-sm btn-link text-danger" onclick="return confirm('Are you sure you want to delete this comment?');">Delete</button>
                         </form>
                     @endif

                     {{-- Adopt as Solution Button (for Organizations only) --}}
                     @if (Auth::user()->isOrganization())
                         @if (!$comment->adoptedSolution) {{-- Show only if not already adopted --}}
                              <form action="{{ route('organization.adoptComment', $comment) }}" method="POST" class="d-inline ml-2">
                                 @csrf
                                 <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure your organization wants to adopt this comment as a solution?');">Adopt as Solution</button>
                             </form>
                         @else {{-- Indicate if already adopted and by whom --}}
                            <span class="badge badge-info ml-2">Adopted by {{ $comment->adoptedSolution->adoptingOrganization->name ?? 'Organization' }}</span>
                         @endif
                     @endif

                @endauth
                 @guest {{-- Display votes even for guests --}}
                     <span class="ml-2 font-weight-bold">{{ $comment->total_votes }} votes</span>
                @endguest

            </div>

            {{-- Reply Form (initially hidden) --}}
             @auth
                <div class="reply-form mt-3" id="reply-form-{{ $comment->id }}" style="display: none;">
                    <h6>Reply to {{ $comment->author->username }}</h6>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="problem_id" value="{{ $comment->problem_id }}">
                        <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="2" required>{{ old('content') }}</textarea>
                            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Submit Reply</button>
                    </form>
                </div>
            @endauth


            {{-- Display replies recursively --}}
            @if ($comment->replies->isNotEmpty())
                <div class="mt-4">
                    @include('partials.comments', ['comments' => $comment->replies])
                </div>
            @endif

        </div>
    </div>
@endforeach

{{-- Simple JavaScript to toggle reply forms --}}
{{-- Add this script once in your main layout or a dedicated script file loaded on the page --}}
{{-- <script>
     document.addEventListener('DOMContentLoaded', function () {
         document.querySelectorAll('.reply-button').forEach(button => {
             button.addEventListener('click', function () {
                 const commentId = this.dataset.commentId;
                 const replyForm = document.getElementById('reply-form-' + commentId);
                 if (replyForm.style.display === 'none') {
                     replyForm.style.display = 'block';
                 } else {
                     replyForm.style.display = 'none';
                 }
             });
         });
         // Optional: Simple AJAX for votes
     });
</script> --}}