@extends('layouts.backend')
@section('content')
<div class="row justify-content-center">
    <div class="col-9">
            <div class="card">
                <div class="card-header bg-success">Profile Edit</div>
                <div class="card-body">
                    <form action="{{route('user_post',$user_id =Crypt::encrypt($user->id))}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3 text-center">
                            <img src="{{asset('uplods/user_photo/'.$user->user_photo)}}"  width="100" alt="Not found" >
                         </div>

                         <div class="form-group mt-3">
                            <label >Profile Name</label>
                            <input type="text" class="form-control p-2" name="name" value="{{$user->name}}">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                         </div>

                         <div class="form-group mt-3">
                            <label >Email</label>
                            <input type="text" class="form-control p-2" name="email" value="{{$user->email}}">
                            @error('email')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                         </div>

                         <div class="form-group mt-3">
                            <label >Profile Photo</label>
                            <input type="file" class="form-control p-2" name="user_photo">
                            @error('user_photo')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                         </div>
                         <div class="btn-group  mt-3">
                         <button type="submit" class="btn btn-success">Add Now</button>
                         </div>
                    </form>
                </div>
            </div>
    </div>
</div>
    
@endsection