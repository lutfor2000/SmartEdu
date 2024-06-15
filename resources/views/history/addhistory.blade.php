<div class="modal fade" id="addhistoryModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form  id="historyform" >
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="addModalLabel">History Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">History Year</label>
                      <input type="number" class="form-control" name="history_year" id="history_year"  placeholder="Enter Year" >
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Description</label>
                      <textarea  class="form-control" type="text" name="history_description" id="history_description" placeholder="Enter Descriptsion" cols="5" rows="4"></textarea>
                      <p></p>
                  </div>

                    <div class="from-group mb-3">
                        <label for="price" class="mb-2">History Photo</label>
                        <input type="file"  class="form-control text-center p-2" name="history_photo" id="history_photo">
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