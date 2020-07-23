@extends('layouts.app')

@section('content')
<form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text"
             class="form-control" 
             name="title" 
             id="title"
             value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="subtitle">Subtitle:</label>
            <input type="text"
             class="form-control"
             name="subtitle" 
             id="subtitle"
        value="{{$post->subtitle}}">
        </div>
        <div class="form-group">
            <label for="body">Content:</label>
            <textarea class="ckeditor form-control" rows="5" name="body" id="body">{{$post->body}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection