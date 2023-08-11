<button type="button" class="btn btn-info mb-3 ml-auto" data-toggle="modal" data-target="#exampleModal">
    Convert
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="docx-form"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="" class="mb-2 d-block text-info">Upload your .docx file</label>
                    <input type="file" name="docx" accept=".docx">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="paste-button" class="btn btn-primary">Convert</button>
            </div>
        </div>
    </div>
</div>
