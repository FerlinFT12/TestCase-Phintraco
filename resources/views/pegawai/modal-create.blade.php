<div class="modal fade" id="modal-create">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Project</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('user.store') }}" method="POST">
                @csrf
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="email" class="form-control" name="email" placeholder="Masukkan Alamat Email" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="form-group">
                          <label for="role">Role</label>
                          <select name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                      </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->