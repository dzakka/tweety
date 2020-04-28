@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('sidebar-links')
    </div>
    <div class="col-sm-8">
    @foreach($users as $user)
    <div class="d-flex mb-3">
    <div>
    <a href="/profiles/{{$user->username}}"><img class="rounded-circle mr-3 ml-3" src="{{asset($user->picture)}}"></a>
    </div>
    <div>
    <h4>{{$user->name}}</h4>
    <p>Joined {{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</p>
    </div>
    </div>
    @endforeach
    </div>
</div>



@endsection
