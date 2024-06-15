@extends('layouts.smartedu')	
@section('font_title')
    About
@endsection
@section('smartabout')
    active
@endsection
@section('body')

<div class="all-title-box">
    <div class="container text-center">
        <h1>About Us<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
    </div>
</div>
 @foreach ($abouts as $about)
 <div id="overviews" class="section lb">
     <div class="container">
         <div class="section-title row text-center">
             <div class="col-md-8 offset-md-2">
                 <h3>About</h3>
                 <p class="lead">{{$setting->where('setting_name','about_title')->first()->setting_value}}</p>
             </div>
         </div><!-- end title -->
     
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
                     <img src="{{asset('uplods/about_photo/'.$about->about_photo_two)}}" alt="Not Image" class="img-fluid img-rounded">
                 </div><!-- end media -->
             </div><!-- end col -->
             
             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                 <div class="message-box">
                    <h2>{{$about->about_title_two}}</h2>
                    <p>{{$about->about_description_two}}</p>
 
                     <a href="#" class="hover-btn-new orange"><span>Learn More</span></a>
                 </div><!-- end messagebox -->
             </div><!-- end col -->
             
         </div><!-- end row -->
     </div><!-- end container -->
 </div><!-- end section -->
 @endforeach

<div class="hmv-box">
    <div class="container">
        <div class="row">
            @foreach ($summares as $summary)  
            <div class="col-lg-4 col-md-6 col-12">
                <div class="inner-hmv">
                    <div class="icon-box-hmv"><i class="{{$summary->summary_icon}}"></i></div>
                    <h3>{{$summary->summary_title}}</h3>
                    <div class="tr-pa">M</div>
                    <p>{{$summary->summary_description}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!---Testimonial Start   ---->
@include('testimonial/testimonial')
<!---Testimonial End   ---->


@endsection