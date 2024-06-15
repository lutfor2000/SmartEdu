@extends('layouts.backend')
@section('title')
  Order
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-success">Customer</div>
           
            <div class="card-body">
                <div class="card-body">
                    <div id="table-data" class="text-center" style="overflow-x:auto;">
                        <table class = "table table-bordered text-center mb-4 ">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>name</th>
                                    <th>Price</th>
                                    <th>Expart Date</th>
                                    <th>Storage</th>
                                    <th>Database</th>
                                    <th>Domain</th>
                                    <th>Support</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{$order->order_package_price}}</td>
                                    <td>{{$order->order_package_date}}</td>
                                    <td>{{$order->order_package_storage}}</td>
                                    <td>{{$order->order_package_database}}</td>
                                    <td>{{$order->order_package_domain}}</td>
                                    <td>{{$order->order_package_support}}</td>
                                   
                                    <td>
                                    <div class="btn-group text-center "> 
                                        <a type="submit" class="btn btn-sm btn-outline-warning history_delete_btn"
                                        {{-- data-id="{{$history->id}}" --}}
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
        </div>
    </div>
</div>
</div>

@endsection