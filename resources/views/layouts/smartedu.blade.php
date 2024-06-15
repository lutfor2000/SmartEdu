
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
 
     <!-- Site Metas -->
    <title>@yield('font_title')</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{asset('smartedu')}}/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('smartedu')}}/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('smartedu')}}/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('smartedu')}}/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{asset('smartedu')}}/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('smartedu')}}/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('smartedu')}}/css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="{{asset('smartedu')}}/js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="host_version"> 

	<!-- Modal -->
	
    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	
	
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">
					<img src="{{asset('smartedu')}}/images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item   @yield('smartedu')""><a class="nav-link" href="{{route('smartedu')}}">Home</a></li>
						<li class="nav-item  @yield('smartabout')"><a class="nav-link" href="{{route('smartabout')}}">About Us</a></li>
						<li class="nav-item  @yield('coursepage')"><a class="nav-link" href="{{route('coursepage')}}">Course</a></li>
					
						<li class="nav-item  @yield('fonteacher')"><a class="nav-link" href="{{route('fonteacher')}}">Teachers</a></li>
						<li class="nav-item @yield('pricing')"><a class="nav-link" href="{{route('pricing')}}">Pricing</a></li>
						<li class="nav-item @yield('contacs')"><a class="nav-link" href="{{route('contacs')}}">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@auth
                        <li><a class="hover-btn-new log orange" href="{{route('home')}}"><span>Dashboard</span></a></li>
						@else
                        <li><a class="hover-btn-new log orange" href="{{route('customerlogin')}}"><span>Login Now</span></a></li>
						@endauth
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

@yield('body')

    <div class="parallax section dbcolor">
        <div class="container">
            <div class="row logos">
                @php
                    $responsers = App\Models\Responser::latest()->limit(6)->get();
                @endphp
                @foreach ($responsers as $responser)
                    
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{asset('uplods/response_photo/'.$responser->responser_photo)}}" alt="image Not Support" class="img-repsonsive"></a>
                </div>
                @endforeach

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About US</h3>
                        </div>
                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>   
						<div class="footer-right">
							<ul class="footer-links-soi">
								<li><a href="http://google.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul><!-- end links -->
						</div>						
                    </div><!-- end clearfix -->
                </div><!-- end col -->

				<div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="{{route('smartedu')}}"  target="_blank">Home</a></li>
                            <li><a href="{{route('coursepage')}}">Course</a></li>
                            <li><a href="{{route('pricing')}}">Pricing</a></li>
							<li><a href="{{route('smartabout')}}">About</a></li>
							<li><a href="{{route('contacs')}}">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">info@yoursite.com</a></li>
                            <li><a href="#">www.yoursite.com</a></li>
                            <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                            <li>+61 3 8376 6284</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
				
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SmartEDU</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{asset('smartedu')}}/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('smartedu')}}/js/custom.js"></script>
	<script src="{{asset('smartedu')}}/js/timeline.min.js"></script>
	
	<script>
		$.ajaxSetup({
		 headers: {
		   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	 });
	 </script>
	@include('ajax/customerajax')
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
    @yield('fontent_js')

	
</body>
</html>    