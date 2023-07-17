@extends('layouts.app')

@section('content')

<table class=" table table-hover">
    <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Premission</th>
        <th> delete</th>
    </thead>
    <tbody>
        @if ($users->count() > 0 )
        @foreach ($users as $user)
        <tr>
                <td>
                     <img src="{{ asset ($user->profile->avatar )}}" alt="" width="60px" height="60px" style="border-radius: 50">
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    @if ($user->admin )
                            <a href="{{route('user.not.admin',['id' => $user->id])}}" class="btn btn-xs btn-info">Remove admin</a>
                    @else
                             <a href="{{route('user.admin',['id' => $user->id])}}" class="btn btn-xs btn-success">make admin</a>
                    @endif
                </td>
                <td>
                    delete
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