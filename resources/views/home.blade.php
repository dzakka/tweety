@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('sidebar-links',[
        'friends'=>$friends
        ])
    </div>
    <div class="col-sm-6">
    @include('tweets.index',[
    'tweets'=>$tweets,
    ])
    </div>
    <div class="col-sm-3">
        @include('tweets.friends')
    </div>
</div>
@endsection
