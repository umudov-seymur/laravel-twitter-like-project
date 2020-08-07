<div class="flex p-4 {{ !$loop->last ? 'border-b border-gray-400' : null }}">
    <div class="mr-4 flex-shrink-0">
        <a href="{{ route('profile',[$tweet->user->id,Str::slug($tweet->user->name)]) }}">
            <img src="{{ $tweet->user->avatar }}" class="rounded-full mr-2 w-16" alt="">
        </a>
    </div>
    <div>
        <div class="flex items-center mb-4">
            <h5 class="font-bold">
                <a href="{{ route('profile',[$tweet->user->id,Str::slug($tweet->user->name)]) }}">
                    {{ $tweet->user->name }}
                </a>
            </h5>
            <span class="mx-2">&middot;</span>
            <span class="text-sm text-gray-600"> {{ $tweet->created_at->diffForHumans() }}</span>
        </div>
        <p class="text-sm mb-2">{{ $tweet->body }}</p>
    </div>
</div>
