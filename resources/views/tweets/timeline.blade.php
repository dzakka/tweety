<div class="container">

    @foreach($tweets as $tweet)
    <div class="d-inline-flex pt-3 pb-3 border border-gray" style="width:100%;">
        <div>
        <a href="/profiles/{{$tweet->user->username}}/"><img class="rounded-circle mr-3 ml-3" src="{{ asset($tweet->user->picture) }}"></a>
        </div>
        <div class="">
        <h5>{{$tweet->user->name}}</h5>
        <p>{{$tweet->tweet}}</p>
        @can('delete', $tweet)
        <div style="float:right;">
          <form action="/tweet/{{$tweet->id}}/delete" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary"><i class="fa fa-trash-alt"></i> </button>
          </form>
        </div>
        @endcan
       <div class="d-flex">
         <div>
            <form action="/tweet/{{$tweet->id}}/like" method="POST">
                @csrf
                 <button type="submit" class="mr-3"> <i class="fa fa-thumbs-up">{{$tweet->alllikes()}}</i></button>
            </form>
          </div>
          <div>
          <form action="/tweet/{{$tweet->id}}/dislike" method="post">
          @csrf
          @method('DELETE')
             <button type="submit" class="hidden"> <i class="fa fa-thumbs-down">{{$tweet->dislikes()}}</i></button>
          </form>
          </div>
        </div>
        </div>
    </div>
    @endforeach

</div>
