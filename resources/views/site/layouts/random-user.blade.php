@foreach ($users as $user)
    
    <div class="random-user">
        <div class="random-user-info">
            <img src="{{ $user->acsr_check_profile }}" alt="">
            <span>
                {{ $user->name }}
                <span class="reach">Followed By Jason</span>
            </span>
        </div>
        <a href="#" data-url="{{ route('site.friend.add', $user->id) }}" class="random-user-follow-btn follow-btn">
            <i class="fa-solid fa-user-plus"></i>
        </a>
    </div>

@endforeach