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

    @if ($message = session()->get('unverified'))
        <div class="alert alert-danger bg-gradient">
            <i class="fa-solid fa-circle-exclamation"></i>{{ $message }} <a href="{{ route('verification.resend') }}" class="text-decoration-none text-info">Resend</a>
        </div>
    @endif
</div>