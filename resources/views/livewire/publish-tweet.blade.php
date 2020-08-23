<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form wire:submit.prevent="storeTweet" method="post">
        @csrf
        <textarea class="w-full outline-none appearance-none" wire:keydown.enter="storeTweet" name="body" wire:model.lazy="body" required placeholder="What's up doc?">{{ old('body') }}</textarea>
        <hr class="my-4">
        {{-- <file-upload></file-upload> --}}
        <div class="flex justify-between items-center">
            <img src="{{ Auth::user()->avatar_path }}" class="rounded-full w-10" alt="">
            <button type="submit"
                class="bg-blue-500 rounded-full shadow py-2 px-4 text-white focus:outline-none hover:bg-blue-700">Tweet-a-roo!</button>
        </div>
    </form>
    @error('body')
        <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
    @enderror
</div>
