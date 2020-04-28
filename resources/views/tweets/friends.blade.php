<div>
<h4 class="mb-3">Following</h4> 
  @foreach($friends as $friend)
  <a href="/profiles/{{$friend->username}}"><div  class="d-flex mb-2">
  <img class="rounded-circle mr-3 ml-3" src="{{ asset($friend->picture) }}">
  <p>{{$friend->name}}</p>
  </div></a>
  @endforeach
</div>