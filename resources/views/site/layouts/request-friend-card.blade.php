@foreach ($request_users as $req_user)
    <div class="col-12 col-sm-6 col-lg-3 col-xl-3 col-xxl-2 request-card">
        <a href="">
            <img src="{{ $req_user->acsr_check_profile }}" alt="">
        </a>
        <div class="info-wrap">
            <a href="" class="user-name">
                <p class="text-white">
                    {{ $req_user->name }}{{ $req_user->id }}
                </p>
            </a>
            <span class="friend-count">
                11 Friends
            </span>
            <div class="button-wrap">
                <a href="#" data-url="{{ route('site.friend.confirm', $req_user->id) }}" class="button accept-btn">
                    Confirm
                </a>
                <a href="#" class="button reject-btn">
                    Remove
                </a>
            </div>
        </div>
    </div>
@endforeach

@push('script')
    
    <script>
        $(document).ready(function () {
            $(document).on('click', '.accept-btn', function () {
                let current_btn = $(this)
                confirm_url = $(this).data('url')
                $(this).css('color', 'LimeGreen')
                $(this).prop('disabled', true)
                $(this).css('background-color', 'rgba(11, 107, 218, .4)')
                $(this).html('<i class="fa-solid fa-check me-2"></i>Confirmed');

                $.ajax({
                    url: confirm_url,
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'status': "accept"
                    },
                    type: 'POST',
                }).done(function () {
                    setTimeout(() => {
                        current_btn.closest('.request-card').fadeOut()
                    }, 1000);
                })
            })
        })
    </script>

@endpush