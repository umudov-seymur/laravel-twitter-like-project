@extends('layouts.app')

@section('content')
<form action="{{ route('profile.update',$user->username) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="bg-white shadow-md border border-gray-200 rounded px-8 py-6 mb-4 flex flex-col my-2">
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="fullname">
                    Fullname
                </label>
                {{-- border border-red-500 --}}
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border focus:shadow-outline outline-none border-gray-400 rounded py-3 px-4 mb-3" id="fullname" type="text" name="name" value="{{ old('name',$user->name) }}" placeholder="Jane Doe">
                @error('name')
                    <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="username">
                    Username
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border focus:shadow-outline outline-none border-gray-400 rounded py-3 px-4 mb-3" id="username" type="text" name="username" value="{{ old('username',$user->username) }}" placeholder="@johndoe">
                @error('username')
                    <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                    Email
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border focus:shadow-outline outline-none border-gray-400 rounded py-3 px-4 mb-3" id="email" type="email" name="email" value="{{ old('email',$user->email) }}" placeholder="johndoe@example.com">
                @error('email')
                    <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="biography">
                    Biography
                </label>
                <textarea name="biography" class="w-full outline-none border focus:shadow-outline px-4 py-3 appearance-none" rows="5">{{ old('biography',$user->biography) }}</textarea>
                @error('biography')
                    <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6 items-center">
            <div class="px-3">
                <img class="w-24" src="{{ $user->avatar_path }}" alt="">
            </div>
            <div class="px-3 w-full">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="avatar">
                    Avatar
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border focus:shadow-outline outline-none border-gray-400 rounded py-3 px-4 mb-3" id="avatar" type="file" name="avatar">
                @error('avatar')
                    <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="password">
                Password
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border focus:shadow-outline outline-none border-gray-400 rounded py-3 px-4 mb-3 mb-3" id="password" type="password" name="password" placeholder="******************">
                @error('password')
                    <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="password-confirm">
                Password Confirmation
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border focus:shadow-outline outline-none border-gray-400 rounded py-3 px-4 mb-3 mb-3" id="password-confirm" type="password" name="password_confirmation" placeholder="******************">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-4">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="md:w-1/2 px-0">
            <a href="{{ route('profile',$user->username) }}" class="bg-red-500 inline-block hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                Cancel
            </a>
            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                Submit
            </button>
        </div>
  </div>
</form>
@endsection
