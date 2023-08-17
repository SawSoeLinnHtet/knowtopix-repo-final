<form action="{{ $action }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
</form>