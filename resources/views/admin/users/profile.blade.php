@extends('layouts.app')

@section('content')

     @include('admin.includes.errors')

    <div class="card">
  <div class="card-header">
                Edit Your Profile
  </div>
  <div class="card-body">
     <form action="{{  route('user.profile.update'  )  }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="name">Email </label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}">
                </div>
                 <div class="form-group">
                     <label for="name">New Password </label>
                     <input type="password" name="password" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Upload New Avatar </label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                <div class="form-group">
                        <button class="btn btn-success" type="submit"  >
                                 Update Profile
                        </button>
                </div>
            </form>
  </div>
</div>

@endsection