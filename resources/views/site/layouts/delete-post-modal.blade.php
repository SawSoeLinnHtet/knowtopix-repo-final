<div 
    class="profile-upload-modal-wrap" 
    x-cloak x-show="openDeleteModal"
     x-init="$watch('openDeleteModal', toggleOverflow)"
    @keyup.escape.window="openDeleteModal = false"
>
    <div 
        class="profile-upload-modal modal-form-wrap" 
        x-show="openDeleteModal"
        @click.away="openDeleteModal = false"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms
    >
        <div class="title-wrap">
            <h4>
                Delete Confirmation
            </h4>
        </div>
        <p class="text-center py-3 mb-0 text-danger">Are you sure you want to delete this record?</p>
        <div class="d-flex justify-content-between gap-2 py-2">
            <button class="btn btn-sm btn-secondary w-50 shadow-none" @click="openDeleteModal = false">CANCEL</button>
            <a class="btn btn-sm btn-danger w-50" @click="deleteRecord">DELETE</a>
        </div>
    </div>
</div>

@push('script')
    <script>
        function deleteRecord() {
            const postId = this.postId;

            console.log(postId)

            fetch(`/posts/${postId}`, {
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