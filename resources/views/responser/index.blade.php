@extends('layouts.backend')
@section('title')
   Responser
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-success">
             Responser
            </div>
            @if (Session::has('responser_status'))
                  <div class="alert alert-success"><p>{{Session::get('responser_status')}}</p></div>
              @endif
            <div class="card-body">
                <div class="tabe_heat d-flex">
                     <div class="tabale_left w-50">
                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addresponserModal">
                            Add Item
                        </button>
                    </div>
 
                </div>
             
                 <div id="table-data" class="text-center" style="overflow-x:auto;">
                     <table class = "table table-bordered text-center mb-4 ">
                         <thead>
                             <tr>
                                 <th>Serial No</th>
                                 <th>Photo</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($responsers as $responser)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>
                                    <img src="{{asset("uplods/response_photo/".$responser->responser_photo)}}" style ='width:180px; height:80px; border-radius:0';   alt="not found">
                                 </td>
                                 <td>
                                 <div class="btn-group text-center ">
                                     <a type="submit" class="btn btn-sm btn-outline-success responser_edit_btn"
                                     data-bs-toggle="modal" data-bs-target="#updateResponserlModal"
                                     data-id="{{$responser->id}}" 
                                     data-responser_photo="{{$responser->responser_photo}}"   
                                     ><i class="fa-regular fa-pen-to-square"></i></a>
                                     
                                     <a type="submit" class="btn btn-sm btn-outline-warning responser_delete_btn"
                                     data-id="{{$responser->id}}"
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
                     {{$responsers->links('pagination::bootstrap-5')}}
                </div>
            </div>
            @include('responser/addrsponser')
            @include('responser/updateresponser')
       </div>
    </div>
</div>  
    
@endsection
@section('footer_js')
    @include('ajax/responserajax')
@endsection