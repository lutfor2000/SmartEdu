@extends('layouts.smartedu')	
@section('font_title')
    Registration Page
@endsection

@section('body')
<div id="overviews" class="section lb">
    <div class="container">
        <div class="section-title row">
            <div class="col-md-8 offset-md-2 ">
               <div class="card">
                <div class="card-header bg-light"><h2 >Customer Register</h2></div>
                <div class="card-body">
                    <form id="customerregisform" method="POST"  class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" name="name" id="cu_name" placeholder="Enter Name" type="text">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" id="cu_email" name="email" placeholder="Enter Email" type="email">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" id="cu_password" name="password" placeholder="Enter Password" type="password">
                                <small></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" type="password">
                                <small></small>
                            </div>
                        </div>
                        <div class="row d-flex">							
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-light btn-radius btn-brd grd1">
                                    Register
                                </button>
                                <span class="text-right ml-4"> You Have a account : <a href="{{route('customerlogin')}}"><strong>Login</strong></a></span>
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
