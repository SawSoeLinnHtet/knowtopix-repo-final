{{-- <a href="#" class="btn btn-icon btn-danger delete-btn" data-url="{{ $url }}"><i class="fas fa-trash"></i></a> --}}
<form action="{{ $action }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
</form>