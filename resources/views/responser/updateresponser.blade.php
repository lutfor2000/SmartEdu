<div class="modal fade" id="updateResponserlModal" tabindex="-1" aria-labelledby="addresponserModalLabel" aria-hidden="true">
    <form  id="updateresponserform" method="POST" >
        @csrf
        <input type="hidden" id="id" name="id">
        <input type="hidden" id="up_responser_photo" name="responser_photo">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="addresponserModalLabel">Responser Update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                    <div class="from-group mb-3">
                        <label for="photo" class="mb-2">Responser Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="responser_new_photo" id="responser_new_photo" >
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