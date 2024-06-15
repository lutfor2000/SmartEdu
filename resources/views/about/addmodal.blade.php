<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form  id="aboutfrom" method="POST" >
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="addModalLabel">About</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Erorr Message Start --}}
                   <div class="mb-3"><span id="error" class="alert text-danger"></span></div>
                {{-- Erorr Message End --}}

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">About Title</label>
                      <input type="text" class="form-control" name="about_title"  placeholder="about Title">
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">About Description</label>
                      <textarea class="form-control pt-5 pb-5" name="about_description" placeholder="Enter About Description" rows="4"></textarea>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2">About Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="about_photo" >
                    </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">About Title Tow</label>
                      <input type="text" class="form-control" name="about_title_two"  placeholder="about Title Two">
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">About Description Two</label>
                      <textarea class="form-control pt-5 pb-5" name="about_description_two" placeholder="Enter About Description Two" rows="4"></textarea>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2">About Photo Two</label>
                        <input type="file"  class="form-control text-center p-2" name="about_photo_two" >
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