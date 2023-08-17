@foreach ($users as $user)
    
    <div class="random-user">
        <div class="random-user-info">
            <img src="{{ $user->acsr_check_profile }}" alt="">
            <span>
                <a href="{{ route('site.friend.details', $user->id) }}" class="text-decoration-none text-white">
                    {{ $user->name }}
                </a>
                <span class="d-block fw-light" style="font-size: 10px">
                    Friends : {{ $user->acsr_friend_count }}
                </span>
            </span>
        </div>
        <a href="#" data-url="{{ route('site.friend.add', $user->id) }}" class="random-user-follow-btn follow-btn">
            <i class="fa-solid fa-user-plus"></i>
        </a>
    </div>

@endforeach