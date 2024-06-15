<div class="modal fade" id="updateteacherlModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form  id="teacherupdateform" method="POST" >
        @csrf
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="up_teacher_photo" name="teacher_photo">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="addModalLabel">Teacher Update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                     
                    <div class="from-group mb-3">
                        <label for="name" class="mb-2">Name</label>
                        <input type="text" class="form-control" name="teacher_name" id="up_teacher_name"  placeholder="Teacher Name" >
                        <p></p>
                    </div>

                    <div class="from-group mb-3">
                        <label for="name" class="mb-2">Title</label>
                        <input type="text" class="form-control" name="teacher_title" id="up_teacher_title"  placeholder="Teacher Title" >
                        <p></p>
                    </div>

                    <div class="from-group mb-3">
                        <label for="photo" class="mb-2">Teacher Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="teacher_new_photo" id="teacher_new_photo" >
                        <p></p>
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>
          </div>
    </form>
</div>