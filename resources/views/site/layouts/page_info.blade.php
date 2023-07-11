@if(count($errors) > 0)
    {{-- <div class="alert alert-danger alert-block tw-p-5" id="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h6>မဖြစ်မနေထည့်သွင်းရမည့် အချက်အလက်များအား မှန်ကန်စွာဖြည့်ပါ။</h6>
        <ul class="tw-m-0 tw-p-0 tw-pl-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}
@endif

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