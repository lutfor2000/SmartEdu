@extends('layouts.smartedu')	
@section('font_title')
    Pricing Page
@endsection
@section('pricing')
    active
@endsection
@section('body')
<div id="plan" class="section lb">
    <div class="container">
        <hr class="invis">

        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="tab-pane active fade show" id="tab1">
                        <div class="row text-center">

                        @foreach ($packages as $package)
                              
                             <div class="col-md-4 mb-4">
                                <div class="pricing-table pricing-table-highlighted">
                                    <div class="pricing-table-header grd1">
                                        <h2>${{$package->package_price}}</h2>
                                        <h3>{{$package->package_date}}</h3>
                                    </div>
                                    <div class="pricing-table-space"></div>
                                    <div class="pricing-table-features">
                                        <p><i class="fa fa-envelope-o"></i> <strong>{{$package->package_email}}</strong> Email Addresses</p>
                                        <p><i class="fa fa-rocket"></i> <strong>{{$package->package_storage}}</strong> of Storage</p>
                                        <p><i class="fa fa-database"></i> <strong>{{$package->package_database}}</strong> Databases</p>
                                        <p><i class="fa fa-link"></i> <strong>{{$package->package_domain}}</strong> Domains</p>
                                        <p><i class="fa fa-life-ring"></i> <strong>{{$package->package_support}}</strong> Support</p>
                                    </div>
                                    <div class="pricing-table-sign-up">
                                        @auth
                                        <a href="{{route('checkout',$package_id = Crypt::encrypt($package->id))}}" class="hover-btn-new orange"><span>Order Now</span></a>
                                        @else   
                                        <a href="{{route('customerlogin')}}" class="hover-btn-new orange"><span>SING Now</span></a>
                                        @endauth
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        
                        </div><!-- end row -->
                    </div><!-- end pane -->
                </div><!-- end content -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
@endsection