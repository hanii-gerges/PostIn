@extends("layouts.app")

@section('title')
    <h1>{{$post->title}}</h1>
@endsection
@section('subtitle')
    {{-- should be $post->subtitle --}}
    <span class="subheading">{{$post->subtitle}}</span>
@endsection
@section('content')
<article>
  <div class="container">
    {!!$post->body!!}
    <p class="post-meta">
      Posted by {{$post->user->name}}<br>
      on {{$post['created_at']}} </p>
      @auth
        @if(Auth::id()==$post->user->id)
        <div class="row">
          <div class="col-sm-8">
            <a href="/posts/{{$post->id}}/edit">
              <input type="button" class="btn btn-warning" value="Edit">
            </a>
          </div>
          <div class="col-sm-2">
            <form method="post" action="/posts/{{$post->id}}">
              @csrf
              @method('delete')
              <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Delete">
              </div>
            </form>
          </div>
        </div>
        @endif
      @endauth
  </div>
</article>
            
@endsection
