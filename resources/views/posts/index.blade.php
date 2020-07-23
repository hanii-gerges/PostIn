@extends("layouts.app")

@section("content")
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="post-preview">
            <a href="/posts/{{$post->id}}">
                <h2 class="post-title">
                    {{$post['title']}}
                </h2>
                <h3 class="post-subtitle">
                    {{$post['subtitle']}}
                </h3>
                </a>
                <p class="post-meta">
                    Posted by {{$post->user->name}}<br>
                on {{$post['created_at']}} </p>
            </div> 
            <hr>
        @endforeach
    @endif
@endsection
@section('pager')
    <!-- Pager -->
    <div class="clearfix float-right">
        {{$posts->links()}}
    </div>
@endsection