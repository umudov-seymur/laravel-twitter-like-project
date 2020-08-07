@extends('layouts.app')

@section('content')
    @include('_publish_tweet_panel')
    <x-timeline :tweets="$tweets"></x-timeline>
@endsection
