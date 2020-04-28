<div>

    @foreach($tweets as $tweet)
    <div class="d-inline-flex pt-3 pb-3 border border-gray" style="width:100%;">
        <div>
        <a href="/profiles/{{$tweet->user->username}}/"><img class="rounded-circle mr-3 ml-3" src="{{ asset($tweet->user->picture) }}"></a>
        </div>
        <div class="">
        <h5>{{$tweet->user->name}}</h5>
        <p>{{$tweet->tweet}}</p>
       <div class="d-flex">
         <div>
            <form action="/tweet/{{$tweet->id}}/like" method="POST">
                @csrf
                <button class="btn btn-success" type="submit">Like {{$tweet->alllikes()}}</button>
            </form>
          </div>
          <div>
          <form action="/tweet/{{$tweet->id}}/dislike" method="post">
          @csrf
          @method('DELETE')
            <button class="btn btn-danger ml-4" type="submit">DisLike {{$tweet->dislikes()}}</button>
          </form>
          </div>
        </div>
        </div>
    </div>
    @endforeach


</div>
