@extends('layouts.smartedu')	
@section('font_title')
    Course Page
@endsection
@section('coursepage')
    active
@endsection
@section('body')
<div class="all-title-box">
    <div class="container text-center">
        <h1>Course All</h1>
    </div>
</div>

<div id="overviews" class="section wb">
    <div class="container">
        <div class="section-title row text-center">
            <div class="col-md-8 offset-md-2">
                <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
            </div>
        </div><!-- end title -->

        <hr class="invis"> 

        <div class="row"> 

            @foreach ($courses as $course)
                <div class="col-lg-6 col-md-6 col-12 mb-4">
                    <div class="course-item">
                        <div class="image-blog">
                            <img src="{{asset('uplods/course_photo/'.$course->course_photo)}}" alt="Image Not Support" class="img-fluid">
                        </div>
                        <div class="course-br">
                            <div class="course-title">
                                <h2><a href="#" title="">{{$course->course_name}}</a></h2>
                            </div>
                            <div class="course-desc">
                                <p>{{$course->course_short_desc}}</p>
                            </div>
                            <div class="course-rating">
                                4.5
                                <i class="fa fa-star"></i>	
                                <i class="fa fa-star"></i>	
                                <i class="fa fa-star"></i>	
                                <i class="fa fa-star"></i>	
                                <i class="fa fa-star-half"></i>								
                            </div>
                        </div>
                        <div class="course-meta-bot">
                            <ul>
                                <li><i class="fa fa-calendar" aria-hidden="true"></i> 6 Month</li>
                                <li><i class="fa fa-users" aria-hidden="true"></i> 56 Student</li>
                                <li><i class="fa fa-book" aria-hidden="true"></i> 7 Books</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- end col -->
            @endforeach

        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->
    
@endsection