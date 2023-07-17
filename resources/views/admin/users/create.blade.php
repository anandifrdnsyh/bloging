@extends('layouts.app')

@section('content')

     @include('admin.includes.errors')

    <div class="card">
  <div class="card-header">
                Creat a new User
  </div>
  <div class="card-body">
     <form action="{{  route('user.store'  )  }}" method="post" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">User</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email </label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                        <button class="btn btn-success" type="submit"  >
                                 Add User
                        </button>
                </div>
            </form>
  </div>
</div>

@endsection