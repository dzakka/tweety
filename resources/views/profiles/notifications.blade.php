@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('sidebar-links')
    </div>
    <div class="col-sm-8">
        @forelse($notifications as $notification)
                <p>Hello {{$notification->data['follower']}} is now following you</p>
                @empty
                <p>You dont have any unread notifications for now</p>
        @endforelse
    </div>
</div>
@endsection
