@extends('layouts.backend')
@section('title')
   Dashboard
@endsection

@section('content')
   @if (Auth::user()->role == 1)
   <div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-success">Dashboard</div>
           
            <div class="card-body">
                <div class="card-body">
                    <div class="form-group mt-3 text-center">
                        <img src="{{asset('uplods/user_photo/'.Auth::user()->user_photo)}}" class="rounded-circle"  width="100" alt="Not found" >
                       
                     </div>

                     <div class="form-group text-center">
                        <label >User : {{ucwords(strtolower(Auth::user()->name))}}</label><br>
                        <label >Email : {{ucwords(strtolower(Auth::user()->email))}}</label>
                     </div>
            </div>
        </div>
    </div>
  </div>
 </div> 
   @else
      @include('customer_dashboard/customer') 
   @endif
   
@endsection
{{-- @section('footer_js')
    @include('ajax/user')
@endsection --}}
