<div>

    @foreach($tweets as $tweet)
    <div class="d-inline-flex pt-3 pb-3 border border-gray" style="width:100%;">
        <div>
        <a href="/profiles/{{$tweet->user->username}}/"><img class="rounded-circle mr-3 ml-3" src="{{ asset($tweet->user->picture) }}"></a>
        </div>
        <div class="">
        <h5>{{$tweet->user->name}}</h5>
        <p>{{$tweet->tweet}}</p>
        </div>
    </div>
    @endforeach


</div>
