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
                    <button class="btn btn-primary" onclick="confirmPresensi()"> Get My Location</button>
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
                <button id="checkin" disabled> Check In </button>
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