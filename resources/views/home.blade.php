@extends('layouts.app')

@section('content')
    <div class="lg:flex lg:justify-between">
        <div class="w-full lg:w-auto mb-4">
            @include('_sidebar_links')
        </div>
        <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
            @include('_publish_tweet_panel')
            <div class="border border-gray-400 rounded-lg mb-8">
                @include('_tweet')
            </div>
        </div>
        <div class="w-full lg:w-1/6 bg-blue-100 rounded-lg p-4">
            @include('_friends_list')
        </div>
    </div>
@endsection
