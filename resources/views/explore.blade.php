@extends('layouts.app')

@section('content')
   @foreach ($users as $user)
        <a href="{{ route('profile',$user->username) }}" class="flex justify-start items-center mb-5">
            <div class="logo">
                <img src="{{ $user->avatar_path }}" class="mr-2 w-12" alt="">
            </div>
            <div class="user-details">
                <h2 class="font-bold">{{ '@'.$user->username }}</h2>
            </div>
        </a>
   @endforeach
   {{ $users->links() }}
@endsection
