<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }} " />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@include('layouts2.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12 col-sm-12">
            <h1 class="m-0">User</h1>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('pegawai.prosesimportpegawai') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">File</label>
                  <input type="file" class="form-control" name="file" value="{{ old('file') }}" required>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-upload"></i> Import</button>
                  <a class="btn btn-danger" href="{{ route('pegawai.index') }}"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
    var tableProject = $('.tblpegawai').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('showpegawais') }}",
      columns: [
        { data: 'uuid', name:'uuid'},
        { data: 'parent_uuid', name:'parent_uuid'},
        { data: 'company_id', name:'company_id'},
        { data: 'department_code', name: 'department_code'},
        { data: 'name', name:'name'},
        { data: 'email', name:'email'},
        { data: 'empl_id', name:'empl_id'},
        { data: 'join_data', name:'join_data'},
        { data: 'ext_no', name:'ext_no'},
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