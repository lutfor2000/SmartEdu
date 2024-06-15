<div class="modal fade" id="addcourseModal" tabindex="-1" aria-labelledby="addcourseModalLabel" aria-hidden="true">
    <form  id="courseform" >
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="addcourseModalLabel">Course Insert</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Name</label>
                      <input type="text" class="form-control" name="course_name" id="course_name"  placeholder="Enter Name" >
                      <p></p>
                  </div>


                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Short Description</label>
                      <textarea  class="form-control" type="text" name="course_short_desc" id="course_short_desc" placeholder="Enter Short Descriptsion" cols="5" rows="4"></textarea>
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Long Description</label>
                      <textarea  class="form-control" type="text" name="course_long_desc" id="course_long_desc" placeholder="Enter Long Descriptsion" cols="5" rows="4"></textarea>
                      <p></p>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2"> Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="course_photo" id="course_photo">
                        <p></p>
                    </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Upload</button>
              </div>
            </div>
          </div>
    </form>
</div>