@extends('layouts.app')

@section('content')
    <form method="post" action="/posts" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text"
             class="form-control" 
             name="title" 
             id="title"
             value="{{old('title')}}">
        </div>
        <div class="form-group">
            <label for="subtitle">Subtitle:</label>
            <input type="text"
             class="form-control"
             name="subtitle" 
             id="subtitle"
        value="{{old('subtitle')}}">
        </div>
        <div class="form-group">
            <label for="body">Content:</label>
            <textarea class="ckeditor form-control" rows="5" name="body" id="body">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
    </form>
@endsection