@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
  <div class="card-header">
              update Tag
  </div>
  <div class="card-body">
     <form action="{{  route('tag.update', ['id' =>$tag ->id ]  )  }}" method="post" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
                </div>
                <div class="form-group">
                        <button class="btn btn-success" type="submit"  >
                            Store Tag
                        </button>
                </div>
            </form>
  </div>
</div>

@endsection