<table class = "table table-bordered text-center mb-4 table-responsive">
    <thead>
        <tr>
            <th>Serial No</th>
            <th>Title One</th>
            <th>Title Two</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($banners as $banner)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$banner->title_one}}</td>
            <td>{{$banner->title_two}}</td>
            <td>{{$banner->sub_title}}</td>
            <td>
               <img src="{{asset("uplods/banner_photo/".$banner->banner_photo)}}" class="w-20 h-20"  alt="not found">
            </td>
            <td>
            <div class="btn-group text-center ">
                <a type="submit" class="btn btn-sm btn-outline-success banner_edit_btn"
                data-bs-toggle="modal" data-bs-target="#bannerUpdateModal"
                data-id="{{$banner->id}}" 
                data-title_one="{{$banner->title_one}}" 
                data-title_two="{{$banner->title_two}}" 
                data-sub_title="{{$banner->sub_title}}" 
                data-banner_photo="{{$banner->banner_photo}}" 
                href = ""><i class="fa-regular fa-pen-to-square"></i></a>
                
                <a type="submit" class="btn btn-sm btn-outline-warning banner_delete_btn"
                data-id="{{$banner->id}}"
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
{{$banners->links('pagination::bootstrap-5')}}