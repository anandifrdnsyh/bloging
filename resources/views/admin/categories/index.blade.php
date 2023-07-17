@extends('layouts.app')

@section('content')

<table class=" table table-hover">
    <thead>
        <th>id</th>
        <th>Category Name</th>
        <th>Editing</th>
        <th>Deleting </th>
    </thead>
    <tbody>
        @if ($categories->count() > 0 )
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td><a href="{{route('category.edit', ['id'=>$category->id]) }}" class="btn btn-xs btn-info">Edit </a></td>
            <td><a href="{{route('category.delete', ['id'=>$category->id]) }}" class="btn btn-xs btn-danger">Delete </a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <th colspan="5" class="text-center">tidak ada data </th>
        </tr>
        @endif
    </tbody>
</table>

@endsection