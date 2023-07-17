@extends('layouts.app')

@section('content')

<table class=" table table-hover">
    <thead>

        <th>image</th>
        <th>Title</th>
        <th> Edit</th>
        <th> Trash</th>
    </thead>
    <tbody>
        @if ($posts->count() > 0 )
        @foreach ($posts as $post)
        <tr>
            <td> <img src="{{$post->featured}}" alt="{{$post->title}}" width="50px" height="50px"></td>
            <td>
                {{$post->title}}
            </td>
            <td>
                <a href="{{route('post.edit',['id' => $post->id])}}" class="btn btn-xs btn-info">edit</a>
            </td>
            <td>
                <a href="{{route('post.delete',['id' => $post->id])}}" class="btn btn-xs btn-danger">Trash</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <th colspan="5" class="text-center"> Tidak ada data</th>
        </tr>
        @endif
    </tbody>
</table>

@endsection