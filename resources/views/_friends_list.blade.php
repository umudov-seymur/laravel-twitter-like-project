
<div class="bg-blue-100 border border-gray-300 rounded-lg p-6">
    <h3 class="font-bold mb-4 text-xl">Following</h3>
    <ul>
        @forelse (auth()->user()->follows as $user)
            <li class="mb-4">
                <a class="flex items-center" href="{{ route('profile',[$user->id,Str::slug($user->name)]) }}">
                    <img src="{{ $user->avatar }}" class="rounded-full mr-2 w-12" alt=""> {{ $user->name }}
                </a>
            </li>
        @empty
            <li>No friends yet!</li>
        @endforelse
    </ul>
</div>
