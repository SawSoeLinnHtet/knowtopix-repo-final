<div class="alert-wrap">
@if ($message = session()->get('success'))
    <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>{{ $message }}
    </div>
@endif

@if ($message = session()->get('error'))
    <div class="alert alert-danger">
        <i class="fa-solid fa-circle-exclamation"></i>{{ $message }}
    </div>
@endif
</div>