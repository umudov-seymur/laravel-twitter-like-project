@extends('layouts.app')

@section('content')
    <div class="profile mb-6 relative border-b border-gray-400 pb-3">
        <img src="{{ asset('default-profile-banner.jpg') }}" alt="{{ $user->name }}">
        <div class="profile-avatar absolute -mt-20" style="left:calc(50% - 75px)">
            <img src="{{ $user->avatar_path }}" class="rounded-full w-32 shadow-xl" alt="{{ $user->name }}">
        </div>
        <div class="flex justify-between items-center mt-3 mb-4">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm text-gray-500">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @can('edit',$user)
                    <a href="{{ route('profile.edit', current_user()->username) }}" class="bg-transparent border border-gray-300 rounded-full py-2 px-4 mr-2 text-black text-xs hover:bg-blue-400 hover:text-white">Edit Profile</a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
        <p class="text-sm">
         {{ $user->biography }}
        </p>
    </div>
    <x-timeline :tweets="$tweets"></x-timeline>
    {{ $tweets->links() }}
@endsection
