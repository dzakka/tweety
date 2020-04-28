@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('sidebar-links')
    </div>
    <div class="col-sm-8">

        <div>
            <img class="mb-3" style="width:100%;"src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ7_71MvTYz16j_4verRF-0rfv42cObnlJQrP0GuvO_9Xy9Etp3&usqp=CAU">
        <div>
        <div class="d-flex justify-content-end mb-2">
            @can('follow', $user)
            <div>
            <form action="/profiles/{{$user->username}}/toggle" method="post">
            @csrf
            <button type="submit" class="btn btn-primary mr-3">{{auth()->user()->following($user)? 'unfollow':'follow'}}</button>
            </form>
            </div>
            @endcan
            @can('update', $user)
            <div>
            <a href="/profiles/{{$user->username}}/edit"><button class="btn btn-success">Edit profile</button></a>
            </div>
            @endcan
        </div>
    @foreach($user->tweets as $tweet)
        <div class="d-inline-flex pt-3 pb-3 border border-gray" style="width:100%;">
            <div>
                <img class="rounded-circle mr-3 ml-3" src="{{ asset($tweet->user->picture) }}">
            </div>
            <div class="">
                <h5>{{'@'. $tweet->user->name}}</h5>
                <p>{{$tweet->tweet}}</p>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
