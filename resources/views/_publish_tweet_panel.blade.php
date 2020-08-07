<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="{{ route('tweets.store') }}" method="post">
        @csrf
        <textarea class="w-full outline-none appearance-none" name="body"
            placeholder="What's up doc?">{{ old('body') }}</textarea>
        <hr class="my-4">
        <div class="flex justify-between">
            <img src="{{ Auth::user()->avatar }}" class="rounded-full w-10" alt="">
            <button type="submit"
                class="bg-blue-500 rounded-full shadow py-2 px-4 text-white focus:outline-none hover:bg-blue-700">Tweet-a-roo!</button>
        </div>
    </form>
    @error('body')
        <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
    @enderror
</div>
