<div id="testimonials" class="parallax section db parallax-off" style="background-image:url('{{asset('smartedu')}}/images/parallax_04.jpg');">
    <div class="container">
        <div class="section-title text-center">
            <h3>Testimonials</h3>
            <p>{{App\Models\Setting::all()->where('setting_name','testimonial')->first()->setting_value}} </p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="testi-carousel owl-carousel owl-theme">
                    @foreach (App\Models\Testimonial::latest()->get() as $testimonial_data)
                        
                    <div class="testimonial clearfix">
                        <div class="testi-meta">
                            <img src="{{asset('uplods/testimonial_photo/'.$testimonial_data->testimonial_photo)}}" alt="Not Image" class="img-fluid" style="border-radius:50% ">
                            <h4>{{ucwords(strtolower($testimonial_data->testimonial_name))}}  </h4>
                        </div>
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i> {{ucwords(strtolower($testimonial_data->testimonial_title))}}</h3>
                            <p class="lead"> {{$testimonial_data->testimonial_desc}} </p>
                        </div>
                        <!-- end testi-meta -->
                    </div>
                    @endforeach
                    <!-- end testimonial -->

                </div><!-- end carousel -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->