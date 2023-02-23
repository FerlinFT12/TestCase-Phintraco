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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI9geoJuf4e93KofgYT4pqT_Po3xtW4yg"></script>

  <script>
    function confirmPresensi() { 
      if(confirm("Apakah Anda Yakin ingin Check In di Lokasi Anda Saat ini ?")) {
        getLocation();
      } else {
        alert('Silahkan Check In Jika Lokasi Anda Sudah Tepat');
        return false;
      }
    }

    function getLocation() {
      if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert('Geolocation Tidak Didukung Oleh Browser Ini');
      }
    }
  </script>

  

  <script>
        var x = document.getElementById("demo");
        var y = document.getElementById("demo2");
     
        // function getLocation() {
        //   if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(showPosition);
        //   } else { 
        //     x.innerHTML = "Geolocation tidak didukung oleh browser ini.";
        //   }
        // }
        function haversine_distance(mk1, mk2) {
            var R = 3958.8; // Radius of the Earth in miles
            var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
            var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
            var difflat = rlat2-rlat1; // Radian difference (latitudes)
            var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)
            
            var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
            return d;
        }

    const dataperusahaan = @json($perusahaan); //menyimpan data lat, long perusahaan ke dalam array javascript
        
    function showPosition(position) {
        document.getElementById("latitudegeo").value= position.coords.latitude;
        document.getElementById("longitudegeo").value= position.coords.longitude;
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        latlon = {lat: lat, lng: lon}
        const METERS_IN_MILE = 1609.344;
        const locs = latlon;
        var diameter = 200;

        const phincon = new google.maps.LatLng(-6.2243585897018185, 106.84186113263642); //lat long phincon sebagai center maps
        //create the map
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: phincon
        });

        let isAtCompany = false;
        
        const markeruser = new google.maps.Marker({ //marker user
            position: locs,
            map,
            title: 'Marker User'
        });

        const infoWindowuser = new google.maps.InfoWindow({ //infoWindow user
            content: "<p>Lat Long User</p>",
            ariaLabel: "User"
        });

        markeruser.addListener("click", () => { //marker user ketika di klik
            infoWindowuser.open({
            anchor: markeruser,
            map
            });
        });

        var mkuser = new google.maps.Marker({position: locs, map: map});

        //looping untuk mengecek lokasi saat ini dengan lokasi-lokasi perusahaan
        for(let i = 0; i < dataperusahaan.length; i++) {
          const dtperusahaan = dataperusahaan[i];
          const nama_perusahaan = dtperusahaan.nama_perusahaan;
          const company = new google.maps.LatLng(dtperusahaan.latitude, dtperusahaan.longitude); //lat long perusahaan yang di looping

          const markercompany = new google.maps.Marker({ //marker perusahaan yang di looping
            position: company,
            map,
            title: 'Company'
          });

          const infoWindow = new google.maps.InfoWindow({ //infoWindow perusahaan yang di looping
            content: nama_perusahaan,
            ariaLabel: "Company"
          });

          markercompany.addListener("click", () => { //marker perusahaan yang di looping dan diklik
            infoWindow.open({
            anchor: markercompany,
            map
            });
          });

          var mkcompany = new google.maps.Marker({position: company, map: map}); //marker perusahaan yang di looping. variabel ini digunakan untuk menghitung jarak perusahaan dengan user
          
          // Calculate and display the distance between markers company - user
          const distance = haversine_distance(mkcompany, mkuser);
          
          const jarak_in_m = distance.toFixed(2) * METERS_IN_MILE; //jarak dalam satuan meter
          
          if (jarak_in_m <= 25 && jarak_in_m <= 50) { // jika jarak <= 25 meter, maka isAtCompany = true, isAtCompany akan digunakan untuk menampilkan keterangan dan btn Check In
            document.getElementById('msg').innerHTML = "Jarak Anda dengan Kantor Terdeket : " + distance.toFixed(2) + " mi atau "+jarak_in_m +" meter. lat : ";
            document.getElementById("btncheckin").disabled = false;
            document.getElementById("komentar").innerHTML = "Silahkan Check In";
          } else if(jarak_in_m > 25 && jarak_in_m <= 50) {
            document.getElementById('msg').innerHTML = "Jarak Anda dengan Kantor Terdeket : " + distance.toFixed(2) + " mi atau "+jarak_in_m +" meter. lat : ";
            document.getElementById("btncheckin").disabled = true;
            document.getElementById("komentar").innerHTML = "Jarak Anda Jauh dari Radius Kantor";
          }
          
          var linecompanyuser = new google.maps.Polyline({ // garis polyline user dengan perusahaan dalam looping 
            path: [company, locs],
            map: map
          });
          
        }

        // if(isAtCompany) {
          //draw a line showing the straight distance between the markers phincon - user
          // var linecompanyuser = new google.maps.Polyline({
          //     path: [terdekat, locs],
          //     map: map
          //   });
        // }


        // const phincon = new google.maps.LatLng(-6.2243585897018185, 106.84186113263642);
        // const phintech = new google.maps.LatLng(-6.229169833011968, 106.82525700395708);
        //create the map
        // const map = new google.maps.Map(document.getElementById("map"), {
            // zoom: 14,
            // center: phincon
        // });

        // const markerphincon = new google.maps.Marker({ //marker perusahaan phincon
        //     position: phincon,
        //     map,
        //     title: 'Phincon'
        // });

        // const markerphintech = new google.maps.Marker({ //marker perusahaan phintech
        //     position: phintech,
        //     map,
        //     title: 'Phintech'
        // });

        // const markeruser = new google.maps.Marker({ //marker user
        //     position: locs,
        //     map,
        //     title: 'Marker User'
        // });

        // const infoWindowphincon = new google.maps.InfoWindow({
        //     content: "<p>Lat Long PT. Phincon</p>",
        //     ariaLabel: "Phincon"
        // });

        // const infoWindowphintech = new google.maps.InfoWindow({
        //     content: "<p>Lat Long PT. Phintech</p>",
        //     ariaLabel: "Phintech"
        // });

        // const infoWindowuser = new google.maps.InfoWindow({
        //     content: "<p>Lat Long User</p>",
        //     ariaLabel: "User"
        // });

        // markerphincon.addListener("click", () => {
        //     infoWindowphincon.open({
        //     anchor: markerphincon,
        //     map
        //     });
        // });

        // markerphintech.addListener("click", () => {
        //     infoWindowphintech.open({
        //     anchor: markerphintech,
        //     map
        //     });
        // });

        // markeruser.addListener("click", () => {
        //     infoWindowuser.open({
        //     anchor: markeruser,
        //     map
        //     });
        // });

          // The markers for Phincon, Phintech dan User
        // var mkphincon = new google.maps.Marker({position: phincon, map: map});
        // var mkphintech = new google.maps.Marker({position: phintech, map: map});
        // var mkuser = new google.maps.Marker({position: locs, map: map});

        // //draw a line showing the straight distance between the markers phincon - user
        // var linephinconuser = new google.maps.Polyline({
        //     path: [phincon, locs],
        //     map: map
        // });

        //draw a line showing the straight distance between the markers phintech - user
        // var linephintechuser = new google.maps.Polyline({
        //     path: [phintech, locs],
        //     map: map
        // });
    
         // Calculate and display the distance between markers phincon - user
        //  var distance = haversine_distance(mkphincon, mkuser);
        //  var jarak_in_m = distance.toFixed(2) * METERS_IN_MILE;
        //  document.getElementById('msg').innerHTML = "Distance between markers: " + distance.toFixed(2) + " mi atau "+jarak_in_m +" meter. lat : ";

        //  if(jarak_in_m > 25) {
        //     document.getElementById("btncheckin").disabled = true;
        //     document.getElementById("komentar").innerHTML = "Jarak Anda Jauh dari Radius Kantor";
        //  } else if (jarak_in_m < 25 || jarak_in_m == 25) {
        //     document.getElementById("btncheckin").disabled = false;
        //     document.getElementById("komentar").innerHTML = "Silahkan Check In";
        //  }
    }

    

        
  </script>

  <!-- <script type="module" src="{{ asset('index.js') }} "></script> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/phintraco-logo.png') }}" alt="PhintracoLogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('user.index') }}" class="nav-link">User</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('project.index') }}" class="nav-link">Project</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('presensi.index') }}" class="nav-link">Presensi</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ auth()->user()->name }}</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">Logout </buttton>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('dist/img/phintraco-logo.png') }}" alt="Phintraco Group Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Phintraco</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{ (request()->segment(1) == 'user') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->segment(1) == 'project') ? 'active' : '' }}">
            <a href="{{ route('project.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Project
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->segment(1) == 'presensi') ? 'active' : '' }}">
            <a href="{{ route('presensi.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Presensi
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->segment(1) == 'spd') ? 'active' : '' }}">
            <a href="{{ route('spd.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                SPD
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 col-12">
            <h1 class="m-0">{{ $title }}</h1>
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
          <div class="col-sm-12 col-12">
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
            <div class="card-body">
                <!-- <form action="{{ route('presensi.store') }}" method="POST"> -->
                    <!-- @csrf -->
                    <br>
                    <button class="btn btn-primary" onclick="confirmPresensi()"> Get My Location</button>
                    
                    <form action="{{route ('presensi.store') }}" method="POST">
                    @csrf
                    <input type="text" name="latitudegeo" id="latitudegeo" hidden>
                    <input type="text" name="longitudegeo" id="longitudegeo" hidden>
                    
                    <button type="submit" id="btncheckin" class="btn btn-danger" disabled>Check In</button>
                  </form>
                  
                  <div id="komentar"></div>
                  <div id="msg"></div>
                  <div id="asdasd"></div>
                    
                <!-- </form> -->

                <!-- <div id="map" style="width:100%;height:500px;"></div>
                <button id="checkin" disabled> Check In </button> -->
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $title2 }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- <form action="{{ route('presensi.store') }}" method="POST"> -->
                    <!-- @csrf -->
                    <!-- <button class="btn btn-primary" onclick="confirmPresensi()"> Get My Location</button> -->
                <!-- </form> -->

                <div id="map" style="width:100%;height:500px;"></div>
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