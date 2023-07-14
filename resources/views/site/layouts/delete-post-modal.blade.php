<div 
    class="profile-upload-model-wrap" 
    x-cloak x-show="openDeleteModal"
    @click="openDeleteModal = !openDeleteModal"
    @keyup.escape.window="openDeleteModal = false"
>
    <div 
        class="profile-upload-modal modal-form-wrap" 
        x-show="openDeleteModal"
        x-transition:enter.duration.500ms
        x-transition:leave.duration.400ms
    >
        <div class="modal-box-contain">
            <div class="modal-form-wrap text-center"> 
                <div>
                    <h2 class="text-white mb-3">Delete Confirmation</h2>
                    <p class="close-btn">
                        <i class="fa-solid fa-xmark"></i>
                    </p>
                </div>
                <p class="text-danger mb-4">Are you sure you want to delete this Post?</p>
                <div class="input-area d-flex gap-2">
                    <button class="btn btn-sm btn-secondary w-100">Cancel</button>
                    <button class="btn btn-sm btn-danger w-100" type="submit">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Site\ProfileUploadRequest', '#upload-form') !!}
    <script>
        function deleteRecord() {
            if (!confirm("Are you sure you want to delete this record?")) {
            return;
            }

            const postId = this.postId;

            fetch(`/posts/${postId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response data
                if (data.success) {
                // Handle successful deletion
                console.log("Record deleted successfully!");
                // Refresh the page or update the UI as needed
                } else {
                // Handle deletion error
                console.error("Error deleting record:", data.message);
                // Display an error message or handle the error in an appropriate way
                }
            })
            .catch(error => {
                // Handle deletion error
                console.error("Error deleting record:", error);
                // Display an error message or handle the error in an appropriate way
            });
        }
        </script>
@endpush