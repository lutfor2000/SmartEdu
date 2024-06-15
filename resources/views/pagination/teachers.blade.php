<table class = "table table-bordered text-center mb-4 ">
    <thead>
        <tr>
            <th>Serial No</th>
            <th>Name</th>
            <th>Title</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($teachers as $teacher)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{strtoupper($teacher->teacher_name)}}</td>
            <td>{{ucwords(strtolower($teacher->teacher_title))}}</td>
            <td>
               <img src="{{asset("uplods/teacher_photo/".$teacher->teacher_photo)}}" style ='width:80px; height:100px; border-radius:0';   alt="not found">
            </td>
            <td>
            <div class="btn-group text-center ">
                <a type="submit" class="btn btn-sm btn-outline-success teacher_edit_btn"
                data-bs-toggle="modal" data-bs-target="#updateteacherlModal"
                data-id="{{$teacher->id}}" 
                data-teacher_name="{{$teacher->teacher_name}}"   
                data-teacher_title="{{$teacher->teacher_title}}"   
                data-teacher_photo="{{$teacher->teacher_photo}}"   
                ><i class="fa-regular fa-pen-to-square"></i></a>
                
                <a type="submit" class="btn btn-sm btn-outline-warning teacher_delete_btn"
                data-id="{{$teacher->id}}"
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
{{$teachers->links('pagination::bootstrap-5')}}