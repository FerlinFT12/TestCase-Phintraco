<footer class="main-footer">
    <strong>Copyright &copy; <?php date('Y'); ?> <a href="{{ route('home') }}">Phintraco Technology</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('dist/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script>
  $(document).ready( function () {
    var table = $('.tbluser').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('showuser') }}',
      columns: [
        { data: 'id', name:'id'},
        { data: 'name', name:'name'},
        { data: 'email', name:'email'},
        { data: 'role', name: 'role'},
        { data: 'created_at', name:'created_at'},
        { data: 'updated_at', name:'updated_at'},
        { data: 'aksi', name: 'aksi'}
      ]
    });

    //button create post event
    $(document).on('click', '.addUser', function() {
      $('#name').val(''),
      $('#email').val(''),
      $('#password').val(''),
      $('#role').val('admin'),
      $('#simpan').text('Save');
      $('#modal-create').modal('show');
    });

    $('#simpan').on('click', function() {
      if($(this).text() === "Update") {
        updateUser();
      } else {
        storeUser();
      }
    });

    $(document).on('click', '.editUser', function() {
      let id = $(this).attr('id');
      $('#tambah').click();
      $('#simpan').text('Update');

      $.ajax({
        url: "{{ route('user.index') }}/"+id+"/edit",
        type: 'get',
        data: {
          id: id,
        },
        success: function(res) {
          $('#modal-create').modal('show');

          $('#id').val(res.user.id),
          $('#name').val(res.user.name),
          $('#email').val(res.user.email),
          $('#password').val(res.user.password),
          $('#role').val(res.user.role)
        }
      });
    });

    $(document).on('click', '.deleteUser', function() {
      let id = $(this).attr('id');
      confirm("Yakin ingin menghapus data User ini ?");

      $.ajax({
        url: "{{ route('user.index') }}/"+id,
        type: "delete",
        data: {
          id: id,
          "_token": "{{ csrf_token() }}"
        },
        success: function(data) {
          table.draw();
        },
        error: function(data) {
          console.log('Error: ', data);
        }
      });
    });

    function storeUser() {
        $.ajax({
          url: "{{ route('user.store') }}",
          type: "post",
          data: {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            role: $('#role').val(),
            "_token": "{{ csrf_token() }}"
          }
          // success: function(res) {
          //       $('#name').val(''),
          //       $('#email').val(''),
          //       $('#password').val(''),
          //       $('#role').val('admin'),
  
          //       $('#modal-create').modal('hide');
          //       table.draw();
  
          // },
          // error: function(xhr) {
          //   alert(xhr.responJson.text);
          // }
        });
    }

    function updateUser() {
        let idUser = $('#id').val();
        $.ajax({
          url: "{{ route('user.index') }}/"+idUser,
          type: "put",
          data: {
            id: idUser,
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            role: $('#role').val(),
            "_token": "{{ csrf_token() }}"
          },
          success: function(res) {
                $('#id').val(''),
                $('#name').val(''),
                $('#email').val(''),
                $('#password').val(''),
                $('#role').val('admin'),
  
                $('#modal-create').modal('hide');
                table.draw();
  
          },
          error: function(xhr) {
            alert(xhr.responJson.text);
          }
        });
    }
  });
</script>

<script>
  $(document).ready( function () {
    var tableProject = $('.tblproject').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('showprojects') }}',
      columns: [
        { data: 'id', name:'id'},
        { data: 'name', name:'name'},
        { data: 'description', name:'description'},
        { data: 'start_at', name: 'start_at'},
        { data: 'finish_at', name:'finish_at'},
        { data: 'aksi', name: 'aksi'}
      ]
    });

    //button create post event
    $(document).on('click', '.addProject', function() {
      $('#name').val(''),
      $('#description').val(''),
      $('#start_at').val(new Date().getDate()),
      $('#finish_at').val(new Date().getDate()),
      $('#simpanproject').text('Save');
      $('#modal-create').modal('show');
    });

    $('#simpanproject').on('click', function() {
      if($(this).text() === "UpdateProject") {
        updateProject();
      } else {
        storeProject();
      }
    });

    $(document).on('click', '.editProject', function() {
      let id = $(this).attr('id');
      $('#tambah').click();
      $('#simpanproject').text('UpdateProject');

      $.ajax({
        url: "{{ route('project.index') }}/"+id+"/edit",
        type: 'get',
        data: {
          id: id,
        },
        success: function(res) {
          $('#modal-create').modal('show');

          $('#id').val(res.project.id),
          $('#name').val(res.project.name),
          $('#description').val(res.project.description),
          $('#start_at').val(res.project.start_at),
          $('#finish_at').val(res.project.finish_at)
        }
      });
    });

    $(document).on('click', '.deleteProject', function() {
      let id = $(this).attr('id');
      confirm("Yakin ingin menghapus data Project ?");

      $.ajax({
        url: "{{ route('project.index') }}/"+id,
        type: "delete",
        data: {
          id: id,
          "_token": "{{ csrf_token() }}"
        },
        success: function(data) {
          tableProject.draw();
        },
        error: function(data) {
          console.log('Error: ', data);
        }
      });
    });

    function storeProject() {
        $.ajax({
          url: "{{ route('project.store') }}",
          type: "post",
          data: {
            name: $('#name').val(),
            description: $('#description').val(),
            start_at: $('#start_at').val(),
            finish_at: $('#finish_at').val(),
            "_token": "{{ csrf_token() }}"
          },
          success: function(res2) {
                $('#name').val(''),
                $('#description').val(''),
                $('#start_at').val(new Date().getDate()),
                $('#finish_at').val(new Date().getDate()),
  
                $('#modal-create').modal('hide');
                tableProject.draw();
  
          },
          error: function(xhr) {
            alert(xhr.responJson.text);
          }
        });
    }

    function updateProject() {
        let idUser = $('#id').val();
        $.ajax({
          url: "{{ route('project.index') }}/"+idUser,
          type: "put",
          data: {
            id: idUser,
            name: $('#name').val(),
            description: $('#description').val(),
            start_at: $('#start_at').val(),
            finish_at: $('#finish_at').val(),
            "_token": "{{ csrf_token() }}"
          },
          success: function(res) {
                $('#id').val(''),
                $('#name').val(''),
                $('#description').val(''),
                $('#start_at').val(new Date().getDate()),
                $('#finish_at').val(new Date().getDate()),
  
                $('#modal-create').modal('hide');
                tableProject.draw();
  
          },
          error: function(xhr) {
            alert(xhr.responJson.text);
          }
        });
    }
  });
</script>

</body>
</html>