@if ($message = session()->get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong class="me-2"><i class="fa-solid fa-circle-check"></i></strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = session()->get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong class="me-2"><i class="fa-solid fa-bomb"></i></strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif