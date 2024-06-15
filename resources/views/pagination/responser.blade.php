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