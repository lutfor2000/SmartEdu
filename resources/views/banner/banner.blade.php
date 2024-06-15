@extends('layouts.backend')
@section('title')
   Banner
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-success">
             Banner
            </div>
            @if (session('banner_success_mess'))
                
            <div class="alert alert-success">{{session('banner_success_mess')}}</div>
            @endif
            <div class="card-body">
                <div class="tabe_heat d-flex">
                     <div class="tabale_left w-50">
                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addModal">
                            Add Item
                        </button>
                    </div>
    
                    <div class="input-group input-group-sm w-50 mb-3">
                        <span class="input-group-text bg-warning" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="search" class="form-control" id="all_search" placeholder="Srarch Here"  aria-describedby="basic-addon1">
                    </div>  
                </div>
             
                 <div id="table-data" class="text-center" style="overflow-x:auto;">
                     <table class = "table table-bordered text-center mb-4 ">
                         <thead>
                             <tr>
                                 <th>Serial No</th>
                                 <th>Title One</th>
                                 <th>Title Two</th>
                                 <th>Description</th>
                                 <th>Photo</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($banners as $banner)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$banner->title_one}}</td>
                                 <td>{{$banner->title_two}}</td>
                                 <td>{{$banner->sub_title}}</td>
                                 <td>
                                    <img src="{{asset("uplods/banner_photo/".$banner->banner_photo)}}" class="w-20 h-20"  alt="not found">
                                 </td>
                                 <td>
                                 <div class="btn-group text-center ">
                                     <a type="submit" class="btn btn-sm btn-outline-success banner_edit_btn"
                                     data-bs-toggle="modal" data-bs-target="#bannerUpdateModal"
                                     data-id="{{$banner->id}}" 
                                     data-title_one="{{$banner->title_one}}" 
                                     data-title_two="{{$banner->title_two}}" 
                                     data-sub_title="{{$banner->sub_title}}" 
                                     data-banner_photo="{{$banner->banner_photo}}" 
                                     href = ""><i class="fa-regular fa-pen-to-square"></i></a>
                                     
                                     <a type="submit" class="btn btn-sm btn-outline-warning banner_delete_btn"
                                     data-id="{{$banner->id}}"
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
                     {{$banners->links('pagination::bootstrap-5')}}
                </div>
            </div>
            @include('banner/addmodal')
            @include('banner/bannerupdate')
           
       </div>
    </div>
</div>  
@endsection
@section('footer_js')
    @include('ajax/bannerajax')
@endsection