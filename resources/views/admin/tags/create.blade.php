@extends('layouts.app')

@section('content')

     @include('admin.includes.errors')

    <div class="card">
  <div class="card-header">
                Creat a new Tags
  </div>
  <div class="card-body">
     <form action="{{  route('tag.store'  )  }}" method="post" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Tag</label>
                    <input type="text" name="tag" class="form-control">
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