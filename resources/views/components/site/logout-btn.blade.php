<form action="{{ route('site.logout') }}" method="POST"> 
    @csrf
    <button class="btn btn-link text-decoration-none text-white shadow-none" style="padding-left: 0 !important; outline: none">
        <i class="fa-solid fa-right-from-bracket me-3"></i><span>Logout</span>
    </button>
</form>