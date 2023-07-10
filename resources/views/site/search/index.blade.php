@extends('site.layouts.app')

@section('content')

    <div class="container px-0 px-lg-5 px-xl-5 py-3">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-8 align-self-center offset-0 offset-md-0 offset-lg-1 offset-xl-2">
                <div class="search-main-wrap">
                    <div class="search-tool-wrap">
                        <form action="{{ route('site.search.index') }}" method="GET">
                            <input type="text" placeholder="Type what you search" name="search" value="{{ request('search') }}">
                            <button>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    @if(isset($users))
                        <div class="search-items-wrap">
                            <h3 class="title">People</h3>
                            <div class="search-item-list-wrap">
                                @foreach ($users as $user)
                                    <div class="user-card mb-2">
                                        <img src="{{ asset('site/img/user.jpeg') }}" alt="">
                                        <div class="info">
                                            <div class="info-text">
                                                <h5 class="mt-3">{{ $user->name }}</h5>
                                                <p><span>@ {{ $user->username }}</span></p>
                                            </div>
                                            @if(!$user->is_friend)
                                                <button data-url="{{ route('site.friend.add', $user->id) }}" class="add-friend-btn">
                                                    Add Friend
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(isset($posts))
                        <div class="search-items-wrap">
                            <h3 class="title">Posts</h3>
                            <div class="public-posts-wrap py-2" id="public-posts-wrap">
                                @include('site.layouts.public-post-card', $posts)
                            </div>
                        </div>
                    @endif
                    @if(isset($recent_users))
                        <div class="search-items-wrap">
                            <h3 class="title">Recents</h3>
                            <div class="search-item-list-wrap">
                                @foreach ($recent_users as $user)
                                    <div class="user-card mb-2">
                                        <img src="{{ asset('site/img/user.jpeg') }}" alt="">
                                        <div class="info">
                                            <div class="info-text">
                                                <h5 class="mt-3">{{ $user->name }}{{ $user->id }}</h5>
                                                <p><span>@ {{ $user->username }}</span></p>
                                            </div>
                                            @if(!$user->is_friend)
                                                <button class="add-btn">
                                                    Add Friend
                                                </button>
                                            @else
                                                <button class="add-btn">
                                                    Unfollow
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <div class="public-posts-wrap" id="public-posts-wrap">
                                    @include('site.layouts.public-post-card', ['posts' => $recent_posts])
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @include('site.layouts.responsive-menu')
        </div>
    </div>

@endsection

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