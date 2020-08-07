@extends('layouts.app')

@section('content')
    <div class="profile mb-6 relative">
        <img src="{{ asset('default-profile-banner.jpg') }}" alt="{{ $user->name }}">
        <div class="profile-avatar absolute -mt-20" style="left:calc(50% - 75px)">
            <img src="{{ $user->avatar }}" class="rounded-full w-32 shadow-xl" alt="{{ $user->name }}">
        </div>
        <div class="flex justify-between items-center mt-3 mb-4">
            <div>
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm text-gray-500">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                <a href="#" class="bg-transparent border border-gray-300 rounded-full py-2 px-4 mr-2 text-black text-xs hover:bg-blue-400 hover:text-white">Edit Profile</a>
                @if (Auth::user()->id !== $user->id)
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
                @endif
            </div>
        </div>
        <p class="text-sm">
            The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
            and white rabbit or hare who is famous for his flippant, insouciant personality.
            He is also characterized by a Brooklyn accent, his portrayal as a trickster,
            and his catch phrase "Eh...What's up, doc?"
        </p>
    </div>
    <x-timeline :tweets="$user->tweets"></x-timeline>
@endsection
