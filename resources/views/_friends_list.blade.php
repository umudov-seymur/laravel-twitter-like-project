<div class="bg-blue-100 border border-gray-300 rounded-lg p-6 my-6 lg:my-0">
    <h3 class="font-bold mb-4 text-xl">Following</h3>
    <ul>
        @forelse (auth()->user()->follows as $user)
            <li @unless ($loop->last) class="mb-4" @endunless>
                <a class="flex items-center" href="{{ route('profile',$user->username) }}">
                    <img src="{{ $user->avatar_path }}" class="rounded-full mr-2 w-12" alt=""> {{ $user->name }}
                </a>
            </li>
        @empty
            <li>No friends yet!</li>
        @endforelse
    </ul>
</div>
