<table class = "table table-bordered text-center mb-4 ">
    <thead>
        <tr>
            <th>Serial No</th>
            <th>Price</th>
            <th>Date</th>
            <th>Email</th>
            <th>Storage</th>
            <th>Datanase</th>
            <th>Domain</th>
            <th>Support</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($packages as $package)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$package->package_price}}</td>
            <td>{{$package->package_date}}</td>
            <td>{{$package->package_email}}</td>
            <td>{{$package->package_storage}}</td>
            <td>{{$package->package_database}}</td>
            <td>{{$package->package_domain}}</td>
            <td>{{$package->package_support}}</td>
            <td>
            <div class="btn-group text-center ">
                <a type="submit" class="btn btn-sm btn-outline-success package_edit_btn"
                data-bs-toggle="modal" data-bs-target="#updatepackageModal"
                data-id="{{$package->id}}" 
                data-package_price="{{$package->package_price}}" 
                data-package_date="{{$package->package_date}}" 
                data-package_email="{{$package->package_email}}" 
                data-package_storage="{{$package->package_storage}}" 
                data-package_database="{{$package->package_database}}" 
                data-package_domain="{{$package->package_domain}}" 
                data-package_support="{{$package->package_support}}" 
                href = ""><i class="fa-regular fa-pen-to-square"></i></a>
                
                <a type="submit" class="btn btn-sm btn-outline-warning package_delete_btn"
                data-id="{{$package->id}}"
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
{{$packages->links('pagination::bootstrap-5')}}