@extends('layouts.app')

@section('content')
    {{-- @include('_publish_tweet_panel') --}}
    <livewire:publish-tweet />
    <livewire:show-tweets />
    {{-- <x-timeline :tweets="$tweets"></x-timeline> --}}
@endsection
