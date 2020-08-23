<div class="flex p-4 {{ !$loop->last ? 'border-b border-gray-400' : null }}">
    <div class="mr-4 flex-shrink-1">
        <a href="{{ route('profile',$tweet->user->username) }}">
            <img src="{{ $tweet->user->avatar_path }}" class="rounded-full mr-2 w-16" alt="">
        </a>
    </div>
    <div class="w-full">
        <div class="flex items-center mb-4">
            <h5 class="font-bold">
                <a href="{{ route('profile',$tweet->user->username) }}">
                    {{ $tweet->user->name }}
                </a>
            </h5>
            <span class="mx-2">&middot;</span>
            <span class="text-sm text-gray-600"> {{ $tweet->created_at->diffForHumans() }}</span>
        </div>
        <p class="text-sm mb-2">{{ $tweet->body }}</p>
        <div class="flex justify-between items-center">
            <x-like-buttons :tweet="$tweet" />
            @can('delete', $tweet)
                <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-gray-600 text-xs hover:text-red-600 transition duration-100">
                        <i class="fas fa-trash-alt"></i> Remove Tweet
                    </button>
                </form>
            @endcan
        </div>
    </div>
</div>
