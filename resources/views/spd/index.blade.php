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
  <!-- <script
      src="https://maps.googleapis.com/maps/api/js?key="
      defer
    ></script> -->
  <!-- <script>
  function confirmPresensi() { 
    if(confirm("Apakah Anda Yakin ingin Check In di Lokasi Anda Saat ini ?")) {
      getLocation();
    } else {
      alert('Silahkan Check In Jika Lokasi Anda Sudah Tepat');
      return false;
    }
  }

  var map, marker, circle, radius = 25;

  function initialize() {
    var center = new google.maps.LatLng(-6.22436174037392, 106.8418477856633);
    map = new google.maps.Map(document.getElementById("map"), {
      center: center,
      zoom: 15
    });

    marker = new google.maps.Marker({
      position: center,
      map: map
    });

    circle = new google.maps.Circle({
      strokeColor: '#0000FF',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#0000FF',
      map: map,
      center: center,
      radius: radius
    });
  }

  function getLocation() {
    if(navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      alert('Geolocation Tidak Didukung Oleh Browser Ini');
    }
  }

  function showPosition(position) {
    var pos = new google.maps.LatLng(
      position.coords.latitude,
      position.coords.longitude
    );

    marker.setPosition(pos);
    map.setCenter(pos);

    var distance = google.maps.geometry.spherical.computeDistanceBetween(
      pos, circle.getCenter()
    );

    if(distance > circle.getRadius()) {
      document.getElementById('checkin').disabled = true;
      alert('Kamu berada di luar radius. Tidak bisa Check In');
    } else {
      document.getElementById('checkin').disabled = false;
      alert('Kamu berada di dalam radius. Bisa Check In');
    }
  }

  google.maps.event.addDomListener(window, "load", initialize);
</script> -->

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

    function showPosition(position) {
        document.getElementById("latitudegeo").value= position.coords.latitude;
        document.getElementById("longitudegeo").value= position.coords.longitude;
        lat = position.coords.latitude;
        lon = position.coords.longitude;
        latlon = {lat: lat, lng: lon}
        var user = {lat:-6.184508853459494 , lng: 106.8311744556733 };
        const METERS_IN_MILE = 1609.344;
        var locs = latlon;
        var diameter = 200;

        const mitrasejati = new google.maps.LatLng(-6.226518011254657, 106.8496551693218);
        // const mitrasejati = new google.maps.LatLng(-6.2264813301483475, 106.8483530233136);
        // -6.2264813301483475, 106.8483530233136
        //create the map
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: mitrasejati
        });

        const marker = new google.maps.Marker({
            position: mitrasejati,
            map,
            title: 'Hello World'
        });

        const marker2 = new google.maps.Marker({
            position: locs,
            map,
            title: 'Hello World 2'
        });

        const infoWindow = new google.maps.InfoWindow({
            content: "<p>Lat Long PT. Mitra Sejati Pertama</p>",
            ariaLabel: "Mitra Sejati Pertama"
        });

        const infoWindowgeo = new google.maps.InfoWindow({
            content: "<p>Lat Long User</p>",
            ariaLabel: "User"
        });

        marker.addListener("click", () => {
            infoWindow.open({
            anchor: marker,
            map
            });
        });

        marker2.addListener("click", () => {
            infoWindowgeo.open({
            anchor: marker2,
            map
            });
        });

          // The markers for The Dakota and The Frick Collection
        var mk1 = new google.maps.Marker({position: mitrasejati, map: map});
        var mk2 = new google.maps.Marker({position: locs, map: map});

        //draw a line showing the straight distance between the markers
        var line = new google.maps.Polyline({
            path: [mitrasejati, locs],
            map: map
        });
    
         // Calculate and display the distance between markers
         var distance = haversine_distance(mk1, mk2);
         var jarak_in_m = distance.toFixed(2) * METERS_IN_MILE;
         document.getElementById('msg').innerHTML = "Distance between markers: " + distance.toFixed(2) + " mi atau "+jarak_in_m +" meter. lat : ";

         if(jarak_in_m > 25) {
            document.getElementById("btncheckin").disabled = true;
            document.getElementById("komentar").innerHTML = "Jarak Anda Jauh dari Radius Kantor";
         } else if (jarak_in_m < 25 || jarak_in_m == 25) {
            document.getElementById("btncheckin").disabled = false;
            document.getElementById("komentar").innerHTML = "Silahkan Check In";
         }


        // var usermenko = {lat:-6.1694498469866295 , lng: 106.8378371553251 };
        //(diameter 100 nggak sampek pintu masuk depat tempat mobil biasanya nurunin)
        // var usermenko = {lat:-6.169785615408362, lng: 106.83720165493625 }; 
        //   // (kalau diameter 100 nggak sampek deputi bidang koordinasi kerjasama, kalau 120 sampek)
        //   var usermenko = {lat:-6.169630948351483, lng: 106.83754229546858 }; 
        //   //(diameter 100 sudah menjangkau bagian depan pintu masuk dan deputi bidang koordinasi kerjasama)
        //   var locs = latlon;
        //   var diametermenko = 140;
        
        //   var myOptions = {
        //       center:locs,
        //       zoom:16,
        //       mapTypeId:google.maps.MapTypeId.ROADMAP
        //   }
        
        //   var map = new google.maps.Map(document.getElementById("map"), myOptions); //membuat peta lokasi
        //   var user_marker = new google.maps.Marker({ //membuat marker pada peta
        //       position:locs,
        //       map:map,
        //       title:"You are here!"
        //   });
        //   const namapegawai = '<p>test admin</p>';
        //   const infowindow = new google.maps.InfoWindow({
        //       content: namapegawai,
        //   });
        
        //   user_marker.addListener("click",()=> {
        //       infowindow.open(map,user_marker);
        //   });
        //   var cityCircle = new google.maps.Circle({ //created a circle to mark the radius
        //         strokeColor: '#FF0000',
        //         strokeOpacity: 0.8,
        //         strokeWeight: 2,
        //         fillColor: '#FF0000',
        //         fillOpacity: 0.35,
        //         map: map,
        //         center: user,
        //         radius: diameter,
        //         clickable: false
        //     });

        //   var menkoCircle = new google.maps.Circle({ //created a circle to mark the radius
        //         strokeColor: '#FF0000',
        //         strokeOpacity: 0.8,
        //         strokeWeight: 2,
        //         fillColor: '#FF0000',
        //         fillOpacity: 0.35,
        //         map: map,
        //         center: usermenko,
        //         radius: diametermenko,
        //         clickable: false
        //     });
        
        //   x.innerHTML = "<input type=\"hidden\" name=\"latitude\" id=\"latitude\" value="+position.coords.latitude+"><br><input type=\"hidden\" name=\"longitude\" id=\"longitude\" value="+position.coords.longitude+">";
        //   var z = arePointsNear(user, locs, diameter);
        //   console.log(locs);
        //   if(z){ //jika n ada, artinya di dalam circle
        //             marker = new google.maps.Marker({
        //                 map: map,
        //                 position: locs,
        //                 label: {
        //                 text:"I", //marking all jobs inside radius with I
        //                 color:"white"
        //                 }
        //             });
        //             y.innerHTML = "<input type=\"text\" name=\"jarak\" id=\"jarak\" value="+z+">";
        //         } else { //jika n tidak ada, artinya di diluar circle
        //             // marker = new google.maps.Marker({
        //             //     map: map,
        //             //     position: locs,
        //             //     label: {
        //             //     text:"O", //marking all jobs outside radius with O
        //             //     color:"white"
        //             //     }
        //             // });
        //             // y.innerHTML = "<input type=\"text\" name=\"jarak\" id=\"jarak\" value="+z+">";

        //             window.alert("Anda tidak bisa absen WFO jika lokasi di luar radius");
        //         }
    }

    

        
  </script>

  <!-- <script type="module" src="{{ asset('index.js') }} "></script> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

@extends('layouts2.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 col-12">
            <h1 class="m-0">Project</h1>
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
                <a class="btn btn-primary float-right" href="{{ route('project.create') }}"><i class="fas fa-plus"></i> Tambah Project</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover tblproject">
                  <thead>
                  <tr>
                    <th>ID.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start At</th>
                    <th>Finish At</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
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