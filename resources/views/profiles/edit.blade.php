@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-3">
        @include('sidebar-links')
    </div>
    <div class="col-sm-8">
        <form action="/profiles/{{$user->username}}/update" method="POST"  enctype="multipart/form-data">
             @csrf
             @method('PATCH')
        <div class="form-group">
             <label for="usr">name</label>
             @error('name')
               {{$message}}
             @enderror
             <input type="text" class="form-control" id="usr" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
             <label for="usr">username</label>
             @error('username')
               {{$message}}
             @enderror
             <input type="text" class="form-control" id="usr" name="username" value="{{$user->username}}">
        </div>
        <div class="form-group">
             <label for="usr">email</label>
             @error('email')
               {{$message}}
             @enderror
             <input type="email" class="form-control" id="usr" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
             <label for="usr">Upload your avatar</label>
             @error('avatar')
               {{$message}}
             @enderror
             <input type="file" class="form-control" id="usr" name="avatar">
        </div>
        <div class="form-group">
        @error('password')
               {{$message}}
             @enderror
             <label for="usr">password</label>
             <input type="password" class="form-control" id="usr" name="password">
        </div>
        <div class="form-group">
             <label for="usr">password</label>
             @error('password_confirmation')
               {{$message}}
             @enderror
             <input type="password" class="form-control" id="usr" name="password_confirmation">
        </div>
        <button class="btn btn-primary" type="submit">Edit Profile</button>

        </form>
    </div>
</div>
@endsection
