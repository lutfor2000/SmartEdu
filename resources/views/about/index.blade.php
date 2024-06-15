@extends('layouts.backend')
@section('title')
   About
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-success">
             About
            </div>
            @if (session('banner_success_mess'))
                
            <div class="alert alert-success">{{session('banner_success_mess')}}</div>
            @endif
            <div class="card-body">
                <div class="tabe_heat d-flex">
                     <div class="tabale_left w-50">
                        @if ($abouts->count() == 0)
                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addModal">
                            Add Item
                        </button>
                        @endif
                    </div>
                </div>
             
                 <div id="table-data" class="text-center" style="overflow-x:auto;">
                     <table class = "table table-bordered text-center mb-4 ">
                         <thead>
                             <tr>
                                 <th>Serial No</th>
                                 <th>About Title</th>
                                 <th>Description</th>
                                 <th>Photo</th>
                                 <th>About Title Two</th>
                                 <th>Description Two</th>
                                 <th>Photo Two</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($abouts as $about)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$about->about_title}}</td>
                                 <td>{{$about->about_description}}</td>
                                 <td>
                                    <img src="{{asset("uplods/about_photo/".$about->about_photo)}}" class="w-20 h-20"  alt="not found">
                                 </td>
                                 <td>{{$about->about_title_two}}</td>
                                 <td>{{$about->about_description_two}}</td>
                                 <td>
                                    <img src="{{asset("uplods/about_photo/".$about->about_photo_two)}}" class="w-20 h-20"  alt="not found">
                                 </td>
                                 <td>
                                 <div class="btn-group text-center ">
                                     <a type="submit" class="btn btn-sm btn-outline-success about_edit_btn"
                                     data-bs-toggle="modal" data-bs-target="#aboutediteModal"
                                     data-id="{{$about->id}}" 
                                     data-about_title="{{$about->about_title}}" 
                                     data-about_description="{{$about->about_description}}" 
                                     data-about_photo="{{$about->about_photo}}" 
                                     data-about_title_two="{{$about->about_title_two}}" 
                                     data-about_description_two="{{$about->about_description_two}}" 
                                     data-about_photo_two="{{$about->about_photo_two}}" 
                                     href = ""><i class="fa-regular fa-pen-to-square"></i></a>
                                     
                                     <a type="submit" class="btn btn-sm btn-outline-warning about_delete_btn"
                                     data-id="{{$about->id}}"
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
                </div>
            </div>
            @include('about/addmodal')
            @include('about/editemodal')
           
           
       </div>
    </div>
</div>  
@endsection
@section('footer_js')
    @include('ajax/aboutajax')
@endsection