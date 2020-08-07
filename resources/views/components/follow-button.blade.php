@unless (Auth::user()->is($user))
    <form action="{{ route('follow', $user->id) }}" method="post">
        @csrf
        <button type="submit" class="bg-blue-400 rounded-full shadow-md py-2 px-4 text-white text-xs">
            @if (Auth::user()->following($user))
                Unfollow
            @else
                Folow
            @endif
        </button>
    </form>
@endunless
