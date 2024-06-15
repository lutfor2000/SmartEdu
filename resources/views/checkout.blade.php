@extends('layouts.smartedu')	
@section('font_title')
   Login Page
@endsection

@section('body')
@auth
    @if (Auth::user()->role == 2)
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row">
                <div class="col-md-8 offset-md-2 ">
                    <form action="{{route('chackout.post')}}" method="POST">
                        @csrf
                    <div class="card mb-2">
                        <div class="card-header">Package Information</div>
                        <div class="card-body">
                             <li>Package Price : <strong>${{$package_info->package_price}}</strong></li>
                             <li>Package Date : {{$package_info->package_date}}</li>
                             <li>Package Email : {{$package_info->package_email}}</li>
                             <li>Package Storage : {{$package_info->package_storage}}</li>
                             <li>Package Databases : {{$package_info->package_database}}</li>
                             <li>Package Domain : {{$package_info->package_domain}}</li>
                             <li>Package Support : {{$package_info->package_support}}</li>
                        </div>
                        @php
                           session([
                            'Session_package_price' => $package_info->package_price,
                            'Session_package_date' => $package_info->package_date,
                            'Session_package_email' => $package_info->package_email,
                            'Session_package_storage' => $package_info->package_storage,
                            'Session_package_database' => $package_info->package_database,
                            'Session_package_domain' => $package_info->package_domain,
                            'Session_package_support' => $package_info->package_support,
    
                            ]);
                        @endphp
                    </div>
    
                    <div class="card">
                        <div class="card-header">Coustomer Information</div>
                        <div class="card-body">
                                <div class="from-group mb-3">
                                    <label for="name" class="mb-2">Name</label>
                                    <input type="text" value="{{Auth::user()->name}}" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name"  placeholder="Enter Name">
                                    @error('customer_name')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
    
                                <div class="from-group mb-3">
                                    <label for="name" class="mb-2">Email</label>
                                    <input type="email" value="{{Auth::user()->email}}" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email"  placeholder="Enter Email">
                                    @error('customer_email')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
    
                                <div class="from-group mb-3">
                                    <label for="name" class="mb-2">Phone Number</label>
                                    <input type="number" class="form-control @error('customer_note') is-invalid @enderror" name="customer_phone"  placeholder="Enter Phone Number">
                                    @error('customer_address')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
    
                                <div class="from-group mb-3">
                                    <label for="name" class="mb-2">Country</label>
                                    <select  name="country_name" class="form-control">
                                        <option>----Select Country----</option>
                                        <option value="bangladesh">Bangladesh </option>
                                        <option value="nepal"> Nepal </option>
                                        <option value="vuthan"> Vuthan </option>
                                    </select>
                                </div>
    
                                <div class="from-group mb-3">
                                    <label for="name" class="mb-2">Country</label>
                                    <select  name="city_name" class="form-control">
                                        <option>----Select City----</option>
                                        <option value="rangpur">Rangpur </option>
                                        <option value="dhaka"> Dhaka </option>
                                        <option value="khulna"> Khulna </option>
                                        <option value="borisahal"> Borishal </option>
                                        <option value="chottogram"> Chottogram </option>
                                        <option value="sylhet"> Sylhet </option>
                                    </select>
                                </div>
    
                                <div class="from-group mb-3">
                                    <label for="name" class="mb-2">Address</label><br>
                                   <textarea name="customer_address" class="form-control @error('customer_address') is-invalid @enderror" cols="50" rows="3" placeholder="Enter Address..." ></textarea><br>
                                        @error('customer_address')
                                                <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>
    
                                <div class="from-group mb-3">
                                    <label for="name" class="mb-2">Note</label><br>
                                   <textarea name="customer_note"  class="form-control @error('customer_note') is-invalid @enderror" cols="50" rows="3" placeholder="Enter Address..." ></textarea><br>
                                        @error('customer_note')
                                                <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>
    
                                {{-- <ul class="nav text-center"  >                             --}}
                                    <div class="form-control text-center p-5">
                                        <label for="card">Credit Card</label>
                                        <input id="card" type="radio" name="payment_option" value="1" checked>
    
                                        <label for="delivery">Mobile Pyment</label>
                                        <input id="delivery" type="radio" name="payment_option" value="2"><br>
    
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div><br>
                                    
                                {{-- </ul> --}}
    
                                     
                                </div>
    
                                
                        </div>
                  </div>
                </form>
                </div>
            </div><!-- end title -->
        
        </div><!-- end container -->
    </div><!-- end section -->
    @else
    <div id="overviews" class="section lb">
        <div class="container">
            <div class="section-title row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="alert alert-primary">You are a Admin. Back to <a class="btn btn-secondary" href="{{route('home')}}"> Home</a></div>
                </div>
            </div>
        </div>
    </div>                
    @endif 
@endauth
@endsection