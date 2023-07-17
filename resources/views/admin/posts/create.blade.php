@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<div class="card">
    <div class="card-header">
        Creat a new post
    </div>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <form action="{{  route('post.store'  )  }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="featured">Featured image</label>
                <input type="file" name="featured" class="form-control">
            </div>

            <div class="form-group">
                <label for="category">select a category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="select">Select Tag</label>
                @foreach ($tags as $tag)
                <div class="checkbox">
                    <label> <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->tag}}</label>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        store post
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
  <script>
        // $('#content').summernote();

  </script>
@endsection