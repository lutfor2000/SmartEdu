<div class="modal fade" id="aboutediteModal" tabindex="-1" aria-labelledby="editeModalLabel" aria-hidden="true">
    <form  id="aboutfromupdate" method="POST" >
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="editeModalLabel">About</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Erorr Message Start --}}
                   <div class="mb-3"><span id="about_error" class="alert text-danger"></span></div>
                {{-- Erorr Message End --}}
                   <input type="hidden" name="id" id="id">
                   <input type="hidden" name="about_photo" id="about_photo">
                   <input type="hidden" name="about_photo_two" id="about_photo_two">
                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">About Title</label>
                      <input type="text" class="form-control" name="about_title" id="about_title"  placeholder="about Title">
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">About Description</label>
                      <textarea class="form-control pt-5 pb-5" name="about_description" id="about_description" rows="4"></textarea>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2">About Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="about_photo_new" >
                    </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">About Title Tow</label>
                      <input type="text" class="form-control" name="about_title_two" id="about_title_two">
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">About Description Two</label>
                      <textarea class="form-control pt-5 pb-5" name="about_description_two" id="about_description_two" rows="4"></textarea>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2">About Photo Two</label>
                        <input type="file"  class="form-control text-center p-2" name="about_photo_two_new" >
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