@props(['users'])

<div class="random-user-wrap">
    <div class="random-user-card-header">
        <h6>
            People You Might Know 
        </h6>
        <a class="refresh-btn" data-url="{{ route('site.user.random') }}" style="color: red; cursor: pointer">
            <i class="fa-solid fa-arrows-rotate"></i>
        </a>
    </div>
    <div class="random-user-card-list">
        <div id="random">
            @include('site.layouts.random-user', $users)
        </div>
        <a href="{{ route('site.friend.index') }}" class="seemore-btn">See more</a>
    </div>
</div>

@push('script')
    
    <script>
        $(document).ready(function () {
            $(document).on('click', '.follow-btn', function (e) {
                e.preventDefault();
                
                status = `<i class="fa-solid fa-xmark me-2 text-danger h4"></i>`
                $(this).prop('disabled', true)
                $(this).html(status)

                add_url = $(this).data('url')
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

            $(document).on('click', '.refresh-btn', function (e) {
                e.preventDefault();
                
                url = $(this).data('url')

                $.ajax({
                    url: url,
                    data: {
                        '_token': '{{ csrf_token() }}',
                    },
                    type: 'POST',
                    success: function (res) {
                        $('#random').html(res.html)
                    }
                })
            })
        })
    </script>

@endpush