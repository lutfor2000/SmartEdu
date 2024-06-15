@extends('layouts.backend')
@section('title')
   User List
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-success">Dashboard</div>
               
                <div class="card-body">
                    <div class="card-body">
                        <div id="table-data">
                            @if (session('profile_message'))   
                            <div class="alert alert-success">{{session('profile_message')}}</div>  
                            @endif
                            <table class = "table table-bordered text-center table-responsive mb-4">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Admin/Coustomer</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{ucwords(strtolower($user->name))}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if ($user->role == 1)
                                                Admin
                                            @else
                                                Coustomer
                                            @endif
                                        </td>
                                        <td>
                                        <img src="{{asset('uplods/user_photo/'.$user->user_photo)}}" class="w-50 h-50"  alt="not found">
                                        </td>
                                        <td>
                                        <div class="btn-group text-center ">
                                            {{-- @php
                                            $user_id =Crypt::encrypt($user->id);
                                           @endphp --}}
                                            <a type="submit" class="btn btn-sm btn-outline-success " 
                                            href = "{{route('user_edit',$user_id = Crypt::encrypt($user->id))}}"><i class="fa-regular fa-pen-to-square"></i></a>
                                            
                                            <a type="submit" class="btn btn-sm btn-outline-danger user_delete_btn"
                                            data-id="{{$user->id}}"
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
                            {{$users->links('pagination::bootstrap-5')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_js')
    @include('ajax/user')
@endsection
