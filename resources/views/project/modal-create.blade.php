                <div class="modal fade" id="modal-create">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Project</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        @csrf
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="hidden" name="id" id="id">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Project" required>
                        </div>
                        <div class="form-group">
                          <label for="description">Deskripsi Project</label>
                          <textarea name="description" class="form-control" id="description" rows="5" placeholder="Masukkan Deskripsi Project" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="password">Start At</label>
                          <input type="date" class="form-control" name="start_at" id="start_at" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Finish At</label>
                          <input type="date" class="form-control" name="finish_at" id="finish_at" required>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  id="simpanproject" >Save</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->