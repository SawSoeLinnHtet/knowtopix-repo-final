@foreach ($users as $key => $user)
    <div class="col-12 col-sm-6 col-lg-3 col-xl-3 col-xxl-2 request-card">
        <a href="">
            <img src="{{ asset('site/img/user.jpeg') }}" alt="">
        </a>
        <div class="info-wrap">
            <a href="" class="user-name">
                <p class="text-white">
                    {{ $user->name }}
                </p>
            </a>
            <span class="friend-count">
                11 Friends
            </span>
            <div class="button-wrap">
                <a  href="#"  data-url="{{ route('site.friend.add', $user->id) }}" class="button add-friend-btn">
                    Add Friend
                </a>
                <a class="button reject-btn btn btn-danger">
                    Remove
                </a>
            </div>
        </div>
    </div>
@endforeach

@push('script')
    
    <script>
        $(document).ready(function () {
            $(document).on('click', '.add-friend-btn', function (e) {
                e.preventDefault();
                add_url = $(this).data('url')
                $(this).css('color', 'LimeGreen')
                $(this).prop('disabled', true)
                $(this).css('background-color', 'rgba(11, 107, 218, .7)')
                $(this).html('<i class="fa-solid fa-check me-2"></i>Requested');

                $.ajax({
                    url: add_url,
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    type: 'POST',
                    success: function (res) {
                        console.log(res)
                    }
                })
            })
        })
    </script>

@endpush