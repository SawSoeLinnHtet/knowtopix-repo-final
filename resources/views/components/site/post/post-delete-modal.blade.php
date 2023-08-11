<div 
    class="profile-delete-modal-wrapper" 
    x-cloak x-show="openDeleteModal"
     x-init="$watch('openDeleteModal', toggleOverflow)"
    @keyup.escape.window="openDeleteModal = false"
>
    <div 
        class="profile-delete-wrap"
        x-show="openDeleteModal"
        @click="openDeleteModal=false"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms
    >
        <div class="modal-box-contain">
            <div class="title-wrap">
                <h4 class="border-bottom pt-3 px-3 text-white border-white pb-3">
                    Delete Confirmation
                </h4>
            </div>
            <p class="text-left py-3 px-3 mb-0 text-danger">Are you sure you want to delete this post?</p>
            <div class="d-flex justify-content-end gap-2 px-3 py-2">
                <button class="btn btn-sm btn-secondary shadow-none" @click="openDeleteModal = false"><i class="fa-solid fa-arrow-left"></i></button>
                <a class="btn btn-sm btn-danger" @click="deleteRecord"><i class="fa-solid fa-trash"></i></a>
            </div>
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