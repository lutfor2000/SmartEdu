@extends('layouts.smartedu')	
@section('font_title')
    Teachers
@endsection
@section('fonteacher')
    active
@endsection
@section('body')
<div class="all-title-box">
    <div class="container text-center">
        <h1>Teachers<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
    </div>
</div>

<div id="teachers" class="section wb">
    <div class="container">
        <div class="row">
            @foreach ($teachers as $teacher)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="our-team">
                        <div class="team-img">
                            <img src="{{asset('uplods/teacher_photo/'.$teacher->teacher_photo)}}">
                            <div class="social">
                                <ul>
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-linkedin"></a></li>
                                    <li><a href="#" class="fa fa-skype"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3 class="title">{{$teacher->teacher_name}}</h3>
                            <span class="post">{{$teacher->teacher_title}}</span>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->	
  
<!---Testimonial Start   ---->
@include('testimonial/testimonial')
<!---Testimonial End   ---->

@endsection