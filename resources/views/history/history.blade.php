@extends('layouts.backend')
@section('title')
  History
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-success">
             History
            </div>
            @if (Session::has('history_status'))
                  <div class="alert alert-success"><p>{{Session::get('history_status')}}</p></div>
              @endif
            <div class="card-body">
                <div class="tabe_heat d-flex">
                     <div class="tabale_left w-50">
                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addhistoryModal">
                            Add Item
                        </button>
                    </div>
 
                </div>
             
                 <div id="table-data" class="text-center" style="overflow-x:auto;">
                     <table class = "table table-bordered text-center mb-4 ">
                         <thead>
                             <tr>
                                 <th>Serial No</th>
                                 <th>History Year</th>
                                 <th>Description</th>
                                 <th>Photo</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($histories as $history)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$history->history_year}}</td>
                                 <td>{{$history->history_description}}</td>
                                 <td>
                                    <img src="{{asset("uplods/history_photo/".$history->history_photo)}}" class="w-20 h-20"  alt="not found">
                                 </td>
                                 <td>
                                 <div class="btn-group text-center ">
                                     <a type="submit" class="btn btn-sm btn-outline-success history_edit_btn"
                                     data-bs-toggle="modal" data-bs-target="#updatehistoryModal"
                                     data-id="{{$history->id}}" 
                                     data-history_year="{{$history->history_year}}" 
                                     data-history_description="{{$history->history_description}}"  
                                     data-history_photo="{{$history->history_photo}}"  
                                     href = ""><i class="fa-regular fa-pen-to-square"></i></a>
                                     
                                     <a type="submit" class="btn btn-sm btn-outline-warning history_delete_btn"
                                     data-id="{{$history->id}}"
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
            @include('history/addhistory')
            @include('history/updatehistory')
           
       </div>
    </div>
</div>  
@endsection
@section('footer_js')
    @include('ajax/historyajax')
@endsection