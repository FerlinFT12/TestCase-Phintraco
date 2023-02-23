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
                    <button class="btn btn-primary" onclick="confirmPresensi()"> Check In</button>
                <!-- </form> -->

                <div id="map" style="width:500px;height:500px;"></div>
            </div>
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

                // var x = document.getElementById("demo");
                // if(navigator.geolocation) {
                //   navigator.geolocation.getCurrentPosition(showPosition);
                // } else {
                //   x.innerHTML = 'Geolocation Tidak Didukung oleh browser ini';
                // }
              }

              function showPosition(position) {
                var pos = new google.maps.LatLng(
                  position.coords.latitude,
                  position.coords.longitude
                );

                marker.setPosition(pos);
                map.setCenter(pos);
              }

              google.maps.event.addDomListener(window, "load", initialize);
            </script>
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