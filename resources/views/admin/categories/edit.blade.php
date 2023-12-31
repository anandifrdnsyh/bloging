@extends('layouts.app')

@section('content')

        @include('admin.includes.errors')

    <div class="card">
  <div class="card-header">
              update Category: {{ $category->name  }}
  </div>
  <div class="card-body">
     <form action="{{  route('category.update', ['id' =>$category ->id ]  )  }}" method="post" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div class="form-group">
                        <button class="btn btn-success" type="submit"  >
                            Store Category
                        </button>
                </div>
            </form>
  </div>
</div>

@endsection