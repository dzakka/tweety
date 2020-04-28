<div>
    @include('tweets.post')

    @include('tweets.timeline',[
        'tweets'=>$tweets
    ])

</div>