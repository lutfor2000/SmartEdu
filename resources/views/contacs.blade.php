@extends('layouts.smartedu')	
@section('font_title')
    Contact Page
@endsection
@section('contacs')
    active
@endsection
@section('body')

<div class="all-title-box">
    <div class="container text-center">
        <h1>Contact<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
    </div>
</div>

<div id="contact" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>{{$settings->where('setting_name','contact_title')->first()->setting_value}}</h3>
            <p class="lead">{{$settings->where('setting_name','contact_des')->first()->setting_value}}</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-xl-6 col-md-12 col-sm-12 m-auto">
                <div class="contact_form">
                    @if (session('contact_status'))
                        <div class="alert alert-success">{{session('contact_status')}}</div>
                    @endif
                    <form id="contactform" method="post">
                        <div class="row row-fluid">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="contact_first_name" id="contact_first_name" class="form-control" placeholder="First Name">
                                <p></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="contact_last_name" id="contact_last_name" class="form-control" placeholder="Last Name">
                                <p></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="email" name="contact_email" id="contact_email" class="form-control" placeholder="Your Email">
                                <p></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="contact_phone" id="contact_phone" class="form-control" placeholder="Your Phone">
                                <p></p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="form-control" name="contact_comments" id="contact_comments" rows="6" placeholder="Give us more details.."></textarea>
                                <p></p>
                            </div>
                            <div class="text-center pd">
                                <button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end col -->
            {{-- <div class="col-xl-6 col-md-12 col-sm-12">
                <div class="map-box">
                    <div id="custom-places" class="small-map"></div>
                </div>
            </div> --}}
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
@endsection
@section('fontent_js')
    @include('ajax/contactajax')
@endsection