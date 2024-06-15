<div class="modal fade" id="addpackageModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form  id="packageform" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success">
                <h1 class="modal-title fs-5" id="addModalLabel">Package Add</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Price</label>
                      <input type="number" class="form-control" name="package_price" id="package_price"  placeholder="Enter Price" >
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Date</label>
                      <input type="text" class="form-control" name="package_date" id="package_date"  placeholder="Enter Year/Month" >
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Total Email</label>
                      <input type="number" class="form-control" name="package_email" id="package_email"  placeholder="Enter Total" >
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Total Storage</label>
                      <input type="text" class="form-control" name="package_storage" id="package_storage"  placeholder="Enter Storage" >
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Database</label>
                      <input type="number" class="form-control" name="package_database" id="package_database"  placeholder="Enter Database" >
                      <p></p>
                  </div>
                  
                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Total Domains</label>
                      <input type="number" class="form-control" name="package_domain" id="package_domain"  placeholder="Enter Domain" >
                      <p></p>
                  </div>

                  <div class="from-group mb-3">
                      <label for="name" class="mb-2">Support</label>
                      <input type="text" class="form-control" name="package_support" id="package_support"  placeholder="Enter Support" >
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