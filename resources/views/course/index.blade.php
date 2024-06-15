@extends('layouts.backend')
@section('title')
 Course
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success">
             Course
            </div>
            @if (Session::has('course_status'))
                  <div class="alert alert-success"><p>{{Session::get('course_status')}}</p></div>
              @endif
            <div class="card-body">
                <div class="tabe_heat d-flex">
                     <div class="tabale_left w-50">
                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addcourseModal">
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
                                 <th>Short Description</th>
                                 <th>Photo</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($courses as $course)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$course->course_name}}</td>
                                 <td>{{$course->course_short_desc}}</td>
                                 <td>
                                    <img src="{{asset("uplods/course_photo/".$course->course_photo)}}" style ='width:120px; height:100px; border-radius:0';   alt="not found">
                                 </td>
                                 <td>
                                 <div class="btn-group text-center ">
                                     <a type="submit" class="btn btn-sm btn-outline-success course_edit_btn"
                                     data-bs-toggle="modal" data-bs-target="#updateCourselModal"
                                     data-id="{{$course->id}}" 
                                     data-course_name="{{$course->course_name}}"   
                                     data-course_short_desc="{{$course->course_short_desc}}"   
                                     data-course_long_desc="{{$course->course_long_desc}}"   
                                     data-course_photo="{{$course->course_photo}}"   
                                     ><i class="fa-regular fa-pen-to-square"></i></a>
                                     
                                     <a type="submit" class="btn btn-sm btn-outline-warning course_delete_btn"
                                     data-id="{{$course->id}}"
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
                     {{$courses->links('pagination::bootstrap-5')}}
                </div>
            </div>
            @include('course/addcourse')
            @include('course/updatecourse')
       </div>
    </div>
</div>  
    
@endsection
@section('footer_js')
    @include('ajax/courseajax')
@endsection