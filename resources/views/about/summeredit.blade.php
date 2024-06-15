<div class="modal fade" id="summerediteModal" tabindex="-1" aria-labelledby="summeraddModalLabel" aria-hidden="true">
    <form  id="summerupdatefrom" method="POST" >
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="summeraddModalLabel">Summary</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Erorr Message Start --}}
                   {{-- <div class="mb-3"><span id="error" class="alert text-danger"></span></div> --}}
                {{-- Erorr Message End --}}
                   <input type="hidden" name="id" id="id">
                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Summary Title</label>
                      <input type="text" class="form-control" name="summary_title" id="up_summary_title"  placeholder="Summary Title">
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Summary Description</label>
                      <textarea class="form-control pt-5 pb-5" name="summary_description" id="up_summary_description" placeholder="Enter Summary Description" rows="4"></textarea>
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Summary Icon</label>
                      <input type="text" class="form-control" name="summary_icon" id="up_summary_icon"  placeholder="Summary Icon">
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