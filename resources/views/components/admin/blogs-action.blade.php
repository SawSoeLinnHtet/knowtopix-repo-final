@props(['action', 'status'])

<form action="{{ $action }}" class="d-inline" method="POST">
    @csrf
    @method('PUT')
    <button class="{{ $status == 'accept' ? 'btn btn-primary btn-sm' : 'btn btn-danger btn-sm' }}">
        {!! $status == 'accept' ? '<i class="fas fa-check"></i>' : '<i class="fas fa-window-close"></i>' !!}
    </button>
</form>