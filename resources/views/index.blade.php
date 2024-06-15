@extends('layouts.smartedu')
@section('font_title')
    Home
@endsection
@section('smartedu')
    active
@endsection	
@section('body')
	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleControls" data-slide-to="1"></li>
			<li data-target="#carouselExampleControls" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">

				<div id="home" class="first-section" style="background-image:url({{asset('smartedu/images/slider-01.jpg')}});">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-right">
									<div class="big-tagline">
										<h2><strong>SmartEDU </strong> education College</h2>
										<p class="lead">With Landigoo responsive landing page template, you can promote your all hosting, domain and email services. </p>
											<a href="#" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
            @foreach ($banners as $banner)  
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url({{asset('uplods/banner_photo/'.$banner->banner_photo)}});">
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-center">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight"><strong>{{$banner->title_one}}</strong> {{$banner->title_two}}</h2>
										<p class="lead" data-animation="animated fadeInLeft">
                                            {{$banner->sub_title}}
										</p>
											<a href="#" class="hover-btn-new"><span>Contact Us</span></a>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<a href="#" class="hover-btn-new"><span>Read More</span></a>
									</div>
								</div>
							</div><!-- end row -->            
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
            @endforeach
            
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>About</h3>
                    <p class="lead">{{$setting->where('setting_name','about_title')->first()->setting_value}}</p>
                </div>
            </div><!-- end title -->
        @foreach ($abouts as $about)
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>{{$about->about_title}}</h2>
                        <p>{{$about->about_description}}</p>

                        <a href="#" class="hover-btn-new orange"><span>Learn More</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="{{asset('uplods/about_photo/'.$about->about_photo)}}" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>

			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="{{asset('uplods/about_photo/'.$about->about_photo_two)}}" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h2>{{$about->about_title_two}}</h2>
                        <p>{{$about->about_description_two}} </p>

                        <a href="#" class="hover-btn-new orange"><span>Learn More</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
            </div><!-- end row -->
            @endforeach

        </div><!-- end container -->
    </div><!-- end section -->

    <section class="section lb page-section">
		<div class="container">
			 <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Our history</h3>
                    <p class="lead">{{$setting->where('setting_name','history')->first()->setting_value}}</p>
                </div>
            </div><!-- end title -->
			<div class="timeline">
				<div class="timeline__wrap">
					<div class="timeline__items">
						
						@foreach ($histories as $history)
                            
						<div class="timeline__item">
							<div class="timeline__content" style="background-image:url({{asset('uplods/history_photo/'.$history->history_photo)}});"  >
								<h2>{{$history->history_year}}</h2>
								<p>{{$history->history_description}}</p>
							</div>
						</div>
                        @endforeach

                        
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="section cl">
		<div class="container">
			<div class="row text-left stat-wrap">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-study"></i></span>
					<p class="stat_count">12000</p>
					<h3>Students</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
					<p class="stat_count">240</p>
					<h3>Courses</h3>
				</div><!-- end col -->

				<div class="col-md-4 col-sm-4 col-xs-12">
					<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
					<p class="stat_count">55</p>
					<h3>Years Completed</h3>
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->

    <div id="plan" class="section lb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Choose Your Plan</h3>
                <p> {{$setting->where('setting_name','choose')->first()->setting_value}} </p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="message-box">
                        <ul class="nav nav-pills nav-stacked" id="myTabs">
                            <li><a class="active" href="#tab1" data-toggle="pill">Monthly Subscription</a></li>
                            <li><a href="#tab2" data-toggle="pill">Yearly Subscription</a></li>
                        </ul>
                    </div>
                </div><!-- end col -->
            </div>

            <hr class="invis">

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content">
                        <div class="tab-pane active fade show" id="tab1">
                            <div class="row text-center">

                            @foreach ($packages as $package)

                                @if (strtolower($package->package_date) == 'month' || strtolower($package->package_date) == 'monthly' )   
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
                                @endif

                            @endforeach
                            
                            </div><!-- end row -->
                        </div><!-- end pane -->

                        <div class="tab-pane fade" id="tab2">
                            <div class="row text-center">
                                @if ($packages->isNotEmpty())
                                    
                                    @foreach ($packages as $package_item)
                                    @if (strtolower($package_item->package_date) == 'year' || strtolower($package_item->package_date) == 'yearly') 
                                    <div class="col-md-4 mb-4">
                                        <div class="pricing-table pricing-table-highlighted">
                                            <div class="pricing-table-header grd1">
                                                <h2>${{$package_item->package_price}}</h2>
                                                <h3>{{$package_item->package_date}}</h3>
                                            </div>
                                            <div class="pricing-table-space"></div>
                                            <div class="pricing-table-features">
                                                <p><i class="fa fa-envelope-o"></i> <strong>{{$package_item->package_email}}</strong> Email Addresses</p>
                                                <p><i class="fa fa-rocket"></i> <strong>{{$package_item->package_storage}}</strong> of Storage</p>
                                                <p><i class="fa fa-database"></i> <strong>{{$package_item->package_database}}</strong> Databases</p>
                                                <p><i class="fa fa-link"></i> <strong>{{$package_item->package_domain}}</strong> Domains</p>
                                                <p><i class="fa fa-life-ring"></i> <strong>{{$package_item->package_support}}</strong> Support</p>
                                            </div>
                                            <div class="pricing-table-sign-up">
                                                @auth  
                                                <a href="{{route('checkout',$package_id = Crypt::encrypt($package_item->id))}}" class="hover-btn-new orange"><span>Order Now</span></a> 
                                                @else
                                                <a href="{{route('customerlogin')}}" class="hover-btn-new orange"><span>SING NOW</span></a> 
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                    @endif 
                                    @endforeach

                                @endif
                            </div><!-- end row -->
                        </div><!-- end pane -->
                    </div><!-- end content -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

<!---Testimonial Start   ---->
@include('testimonial/testimonial')
<!---Testimonial End   ---->
   
@endsection
    