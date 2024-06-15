@extends('layouts.backend')
@section('title')
  Testimonial
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success">
             Testimonial
            </div>
            @if (Session::has('testimonial_status'))
                  <div class="alert alert-success"><p>{{Session::get('testimonial_status')}}</p></div>
              @endif
            <div class="card-body">
                <div class="tabe_heat d-flex">
                     <div class="tabale_left w-50">
                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addtestimonialModal">
                            Add Item
                        </button>
                    </div>
 
                </div>
             
                 <div id="table-data" class="text-center" style="overflow-x:auto;">
                     <table class = "table table-bordered text-center mb-4 ">
                         <thead>
                             <tr>
                                 <th>Serial No</th>
                                 <th>Name</th>
                                 <th>Title</th>
                                 <th>Description</th>
                                 <th>Photo</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($testimonials as $testimonial)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$testimonial->testimonial_name}}</td>
                                 <td>{{$testimonial->testimonial_title}}</td>
                                 <td>{{$testimonial->testimonial_desc}}</td>
                                 <td>
                                    <img src="{{asset("uplods/testimonial_photo/".$testimonial->testimonial_photo)}}" class="w-20 h-20"  alt="not found">
                                 </td>
                                 <td>
                                 <div class="btn-group text-center ">
                                     <a type="submit" class="btn btn-sm btn-outline-success testimonial_edit_btn"
                                     data-bs-toggle="modal" data-bs-target="#updatetestimonialModal"
                                     data-id="{{$testimonial->id}}" 
                                     data-testimonial_name="{{$testimonial->testimonial_name}}" 
                                     data-testimonial_title="{{$testimonial->testimonial_title}}"  
                                     data-testimonial_desc="{{$testimonial->testimonial_desc}}"  
                                     data-testimonial_photo="{{$testimonial->testimonial_photo}}"  
                                     ><i class="fa-regular fa-pen-to-square"></i></a>
                                     
                                     <a type="submit" class="btn btn-sm btn-outline-warning testimonial_delete_btn"
                                     data-id="{{$testimonial->id}}"
                                     href = ""><i class="fa-regular fa-trash-can"></i></a>
                                 </div>
                                 </td>
                             </tr> 
                             @empty
                             <tr class="text-center">
                                 <td colspan="20" class="text-danger"> <small>No Data To Show</small></td>
                             </tr>
                             @endforelse
                         </tbody>
                     </table>
                     {{-- {{$banners->links('pagination::bootstrap-5')}} --}}
                </div>
            </div>
            @include('testimonial/addmodal')
            @include('testimonial/updatemodal')
           
           
       </div>
    </div>
</div>  
@endsection
@section('footer_js')
    @include('ajax/testimonialajax')
@endsection