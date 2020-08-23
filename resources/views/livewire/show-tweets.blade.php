<div class="border border-gray-300 rounded-lg mb-8">
    @forelse($tweets as $tweet)
        @include('_tweet')
    @empty
        <p class="p-5">our not share post!</p>
    @endforelse
</div>
