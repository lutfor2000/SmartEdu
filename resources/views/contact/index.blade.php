@extends('layouts.backend')
@section('title')
  Contact
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success">
             Contact
            </div>
            @if (Session::has('testimonial_status'))
                  <div class="alert alert-success"><p>{{Session::get('testimonial_status')}}</p></div>
              @endif
            <div class="card-body">
                 <div id="table-data" class="text-center" style="overflow-x:auto;">
                     <table class = "table table-bordered text-center mb-4 ">
                         <thead>
                             <tr>
                                 <th>Serial No</th>
                                 <th>First Name</th>
                                 <th>Last Name</th>
                                 <th>Email</th>
                                 <th>Phone Number</th>
                                 <th>Comment</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($contacts as $contact)
                             <tr>
                                 <td>{{$loop->index+1}}</td>
                                 <td>{{ucwords(strtolower($contact->contact_first_name))}}</td>
                                 <td>{{ucwords(strtolower($contact->contact_last_name))}}</td>
                                 <td>{{$contact->contact_email}}</td>
                                 <td>{{$contact->contact_phone}}</td>
                                 <td>{{$contact->contact_comments}}</td>
                                 <td>
                                 <div class="btn-group text-center ">
                                     <a type="submit" class="btn btn-sm btn-outline-warning contact_delete_btn"
                                     data-id="{{$contact->id}}"
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
                     {{$contacts->links('pagination::bootstrap-5')}}
                </div>
            </div>
           
       </div>
    </div>
</div>  
@endsection
{{-- @section('footer_js')
    @include('ajax/testimonialajax')
@endsection --}}
@section('footer_js')
    @include('ajax/contactajax')
@endsection