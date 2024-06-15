<div class="modal fade" id="addtestimonialModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form  id="testimonialform" >
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="addModalLabel">Testimonial</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Name</label>
                      <input type="text" class="form-control" name="testimonial_name" id="testimonial_name"  placeholder="Enter Name" >
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Title</label>
                      <input type="text" class="form-control" name="testimonial_title" id="testimonial_title"  placeholder="Enter Title" >
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Description</label>
                      <textarea  class="form-control" type="text" name="testimonial_desc" id="testimonial_desc" placeholder="Enter Descriptsion" cols="5" rows="4"></textarea>
                      <p></p>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2"> Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="testimonial_photo" id="testimonial_photo">
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