<div class="modal fade" id="updateCourselModal" tabindex="-1" aria-labelledby="updatecourseModalLabel" aria-hidden="true">
    <form  id="courseupdateform" >
        @csrf
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="up_course_photo" name="course_photo">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="updatecourseModalLabel">Course Update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Name</label>
                      <input type="text" class="form-control" name="course_name" id="up_course_name"  placeholder="Enter Name" >
                      <p></p>
                  </div>


                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Short Description</label>
                      <textarea  class="form-control" type="text" name="course_short_desc" id="up_course_short_desc" placeholder="Enter Short Descriptsion" cols="5" rows="4"></textarea>
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Long Description</label>
                      <textarea  class="form-control" type="text" name="course_long_desc" id="up_course_long_desc" placeholder="Enter Long Descriptsion" cols="5" rows="4"></textarea>
                      <p></p>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2"> Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="course_new_photo" id="course_new_photo">
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