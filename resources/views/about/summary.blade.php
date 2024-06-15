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
              @if (Session::has('summery_status'))
                  <div class="alert alert-success"><p>{{Session::get('summery_status')}}</p></div>
              @endif
            <div class="card-body">
                <div class="tabe_heat d-flex">
                     <div class="tabale_left w-50">
                        <button type="button" class="btn btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#addsummaryModal">
                            Add Item
                        </button>
                    </div>
                </div>
             
                 <div id="table-data" class="text-center" style="overflow-x:auto;">
                     <table class = "table table-bordered text-center mb-4 ">
                         <thead>
                             <tr>
                                 <th>Serial No</th>
                                 <th>Summery Title</th>
                                 <th>Description</th>
                                 <th>Icon</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($summarys as $summary)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{$summary->summary_title}}</td>
                                 <td>{{$summary->summary_description}}</td>
                                 <td>{{$summary->summary_icon}}</td>
                            
                                 <td>
                                 <div class="btn-group text-center ">
                                     <a type="submit" class="btn btn-sm btn-outline-success summery_edit_btn"
                                     data-bs-toggle="modal" data-bs-target="#summerediteModal"
                                     data-id="{{$summary->id}}" 
                                     data-summary_title="{{$summary->summary_title}}" 
                                     data-summary_description="{{$summary->summary_description}}" 
                                     data-summary_icon="{{$summary->summary_icon}}"  
                                     ><i class="fa-regular fa-pen-to-square"></i></a>
                                     
                                     <a type="submit" class="btn btn-sm btn-outline-warning summery_delete_btn"
                                     data-id="{{$summary->id}}"
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
            @include('about/summaryadd')
            @include('about/summeredit')
           
           
       </div>
    </div>
</div>  
@endsection
@section('footer_js')
    @include('ajax/summaryajax')
@endsection