<div 
    class="comment-delete-modal-wrap"
    x-cloak x-show="openCommentDeleteModal"
    x-init="$watch('openCommentDeleteModal', toggleOverflow)"
    @keyup.escape.window="openCommentDeleteModal = false" 
>
    <div 
        class="wrapper"
        x-show="openCommentDeleteModal"
        @click.away="openCommentDeleteModal = false"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms
    >
        <div class="comment-delete-modal">
            <div class="title-wrap">
                <h4 class="border-bottom pt-3 px-3 text-white border-white pb-3">
                    Delete Confirmation
                </h4>
            </div>
            <p class="text-left py-3 px-3 mb-0 text-danger">Are you sure you want to delete this comment?</p>
            <div class="d-flex justify-content-end gap-2 px-3 py-2">
                <button class="btn btn-sm btn-secondary shadow-none" @click="openCommentDeleteModal = false">
                    <i class="fa-solid fa-arrow-left me-1"></i>Cancel
                </button>
                <a class="btn btn-sm btn-danger" @click="deleteComment">
                    <i class="fa-solid fa-trash me-1"></i>Delete
                </a>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        function deleteComment(e) {
            e.preventDefault();
            
            const postId = this.postId
            const commentId = this.commentId    

            fetch(`/posts/${postId}/comment/${commentId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Record deleted successfully!");
                    window.location.reload();
                } else {
                    console.error("Error deleting record:", data.message);
                }
            })
            .catch(error => {
                console.error("Error deleting record:", error);
            });
        }
    </script>
@endpush