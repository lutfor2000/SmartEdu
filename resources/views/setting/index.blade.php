@extends('layouts.backend')
@section('title')
  Settings
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-9">
            <div class="card">
                <div class="card-header bg-success">Profile Edit</div>
                <div class="card-body">
                    @if (session('setting_message'))  
                    <div class="alert alert-success">{{session('setting_message')}}</div>
                    @endif
                    <form action="{{route('setting.update')}}" method="POST">
                        @csrf
                       
                         <div class="form-group mt-3">
                            <label >About</label>
                            <textarea name="about_title" class="form-control p-2 @error('about_title') is-invalid @enderror"  cols="4" rows="4">{{$settings->where('setting_name','about_title')->first()->setting_value}}</textarea>
                            @error('about_title')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                         </div>

                         <div class="form-group mt-3">
                            <label >History</label>
                            <textarea name="history" class="form-control p-2 @error('history') is-invalid @enderror"  cols="4" rows="4">{{$settings->where('setting_name','history')->first()->setting_value}}</textarea>
                            @error('history')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                         </div>

                         <div class="form-group mt-3">
                            <label >Choose</label>
                            <textarea name="choose" class="form-control p-2 @error('choose') is-invalid @enderror"  cols="4" rows="4">{{$settings->where('setting_name','choose')->first()->setting_value}}</textarea>
                            @error('choose')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                         </div>

                         <div class="form-group mt-3">
                            <label >Testimonial</label>
                            <textarea name="testimonial" class="form-control p-2 @error('testimonial') is-invalid @enderror"  cols="4" rows="4">{{$settings->where('setting_name','testimonial')->first()->setting_value}}</textarea>
                            @error('testimonial')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                         </div>

                         <div class="form-group mt-3">
                            <label >Contact Title</label>
                            <textarea name="contact_title" class="form-control p-2 @error('contact_title') is-invalid @enderror"  cols="4" rows="4">{{$settings->where('setting_name','contact_title')->first()->setting_value}}</textarea>
                            @error('contact_title')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                         </div>

                         <div class="form-group mt-3">
                            <label >Contact Description</label>
                            <textarea name="contact_des" class="form-control p-2 @error('contact_des') is-invalid @enderror"  cols="4" rows="4">{{$settings->where('setting_name','contact_des')->first()->setting_value}}</textarea>
                            @error('contact_des')
                            <small class="invalid-feedback">{{$message}}</small>
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