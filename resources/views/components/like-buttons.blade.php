<div class="like-buttons flex">
    @php
        $class = 'text-gray-600 text-sm appearance-none focus:outline-none hover:text-blue-500 transition duration-100';
    @endphp

    <form action="{{ route('tweets.like.store', $tweet->id) }}" method="post">
        @csrf
        <button class="{{ $class }} @if($tweet->isLikedOrDislekedBy(current_user())) text-blue-500 @endif">
            <i class="fas fa-thumbs-up"></i>
            <span>{{ $tweet->likes ?? 0 }}</span>
        </button>
    </form>

    <form action="{{ route('tweets.like.destroy', $tweet->id) }}" method="post" class="ml-1">
        @csrf
        @method("DELETE")
        <button class="{{ $class }} @if($tweet->isLikedOrDislekedBy(current_user(),false)) text-blue-500 @endif ml-1">
            <i class="fas fa-thumbs-down"></i>
            <span>{{ $tweet->dislikes ?? 0 }}</span>
        </button>
    </form>
</div>
