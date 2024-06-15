@extends('layouts.smartedu')	
@section('font_title')
  Login Page
@endsection

@section('body')
<div id="overviews" class="section lb">
    <div class="container">
        <div class="section-title row">
            <div class="col-md-8 offset-md-2 ">
               <div class="card">
                <div class="card-header bg-light"><h2 >Customer Login</h2></div>
                   @if (session('customer_status'))
                       <div class="alert alert-success">{{session('customer_status')}}</div>
                   @endif
                <div class="card-body">
                    <form id="customeloginform" method="POST" class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" id="lo_email" name="email" placeholder="Enter Email" type="email">
                               <small></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" id="lo_password" name="password" placeholder="Enter Password" type="password">
                                <small></small>
                               <p></p>
                            </div>
                        </div>
                        
                        <div class="row d-flex">							
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-light btn-radius btn-brd grd1">
                                    Login
                                </button>
                                <span class="text-right ml-4"> Create Account : <a href="{{route('customerrdistration')}}"><strong>Register</strong></a></span>
                            </div>
                        </div>
                    </form>
                </div>
               </div>
            </div>
        </div><!-- end title -->
    
    </div><!-- end container -->
</div><!-- end section -->
@endsection