<div class="modal fade" id="bannerUpdateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form  id="bannerfromupdate" method="POST" >
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="updateModalLabel">Banner</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Erorr Message Start --}}
                   <div class="mb-3"><span id="banner_error" class="alert text-danger"></span></div>
                {{-- Erorr Message End --}}
                   <input type="hidden" name="id" id="id">
                   <input type="hidden" name="banner_photo" id="banner_photo">
                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Title One</label>
                      <input type="text" class="form-control" name="title_one" id="title_one">
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Title Two</label>
                      <input type="text" class="form-control" name="title_two" id="title_two">
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Banner Sub Title</label>
                      <textarea class="form-control pt-5 pb-5" name="sub_title" id="sub_title" rows="4"></textarea>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2">Add Banner Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="banner_new_photo"  >
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