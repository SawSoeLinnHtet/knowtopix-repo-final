@extends('site.layouts.app')

@section('content')

    <div class="container px-0 px-lg-5 px-xl-5 py-3">
        <div class="row">
            <div class="col-12 col-lg-10 col-xl-10 align-self-center offset-md-0 offset-lg-1 offset-xl-1">
                <div class="search-main-wrap">
                    <div class="search-tool-wrap">
                        <form action="{{ route('site.search.index') }}" method="GET">
                            <input type="text" placeholder="Type what you search" name="search" value="{{ request('search') }}">
                            <button>
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    @if(!isset($recent_users))
                        @if(isset($users) && $users->count() > 0 || isset($posts) && $posts->count() > 0)
                            @if(isset($users) && $users->count() > 0)
                                <div class="search-items-wrap">
                                    <h3 class="title">People</h3>
                                    <div class="search-item-list-wrap">
                                        @foreach ($users as $user)
                                            <div class="user-card mb-2">
                                                <img src="{{ $user->acsr_check_profile }}" alt="">
                                                <div class="info">
                                                    <div class="info-text">
                                                        <a href="{{ $user->acsr_check_user_link }}" class="text-decoration-none text-white"><h5 class="mt-3">{{ $user->name }}</h5></a>
                                                        <p><span>@ {{ $user->username }}</span></p>
                                                    </div>
                                                    @if($user->id !== auth()->user()->id)
                                                        @if($user->friend_status == 'pending')
                                                            <button class="add-btn d-flex align-items-center gap-1">
                                                                <i class="fa-regular fa-clock me-1"></i> Pending
                                                            </button>
                                                        @elseif($user->friend_status == 'accept')
                                                            <button class="add-btn d-flex align-items-center gap-1">
                                                                <i class="fa-solid fa-user-xmark me-1"></i>Unfriend
                                                            </button>
                                                        @else
                                                            <button data-url="{{ route('site.friend.add', $user->id) }}" class="add-btn add-friend-btn d-flex align-items-center gap-1">
                                                                <i class="fa-solid fa-user-plus me-1"></i>Add Friend
                                                            </button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if(isset($posts) && $posts->count() > 0)
                                <div class="search-items-wrap">
                                    <h3 class="title">Posts</h3>
                                    <div class="public-posts-wrap py-2" id="public-posts-wrap">
                                        @include('site.layouts.public-post-card', $posts)
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="noting-alert">
                                <img src="{{ asset('site/img/nothing_found.png') }}" alt="">
                                <h4>
                                    No Results Found!
                                </h4>
                                <p>
                                    Your Search Returned no results. Try shortening or rephrasing your search.
                                </p>
                            </div>
                        @endif
                    @endif
                    @if(isset($recent_users))
                        <div class="search-items-wrap">
                            <h3 class="title">Recents</h3>
                            <div class="search-item-list-wrap">
                                @foreach ($recent_users as $key => $user)
                                    <div class="user-card mb-2">
                                        <img src="{{ $user->acsr_check_profile }}" alt="">
                                        <div class="info">
                                            <div class="info-text">
                                                <a href="{{ route('site.friend.details', $user->id) }}" class="text-decoration-none text-white">
                                                    <h5 class="mt-3">
                                                        {{ $user->name }}
                                                    </h5>
                                                </a>
                                                <p><span>@ {{ $user->username }}</span></p>
                                            </div>
                                            @if($user->friend_status == 'pending')
                                                <button class="add-btn d-flex align-items-center gap-1">
                                                   <i class="fa-regular fa-clock me-1"></i> Pending
                                                </button>
                                            @elseif($user->friend_status == 'accept')
                                                <button class="add-btn d-flex align-items-center gap-1">
                                                    <i class="fa-solid fa-user-check me-1"></i> Friend
                                                </button>
                                            @else
                                                <button data-url="{{ route('site.friend.add', $user->id) }}" class="add-btn add-friend-btn d-flex align-items-center gap-1d-flex align-items-center gap-1">
                                                    <i class="fa-solid fa-user-plus "></i> Add Friend
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