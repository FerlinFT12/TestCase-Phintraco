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
              <form action="{{ route('project.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $project->name }}" placeholder="Masukkan Nama Project" required>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control" name="description" rows="5" placeholder="Masukkan Deskripsi Project" required>{{ $project->description }}</textarea>
                </div>
                <div class="form-group">
                  <label for="start_at">Start At</label>
                  <input type="date" class="form-control" name="start_at" value="{{ date('Y-m-d', strtotime($project->start_at)) }}" required>
                </div>
                <div class="form-group">
                  <label for="start_at">Finish At</label>
                  <input type="date" class="form-control" name="finish_at" value="{{ date('Y-m-d', strtotime($project->finish_at)) }}" required>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Update</button>
                  <a class="btn btn-danger" href="{{ route('project.index') }}">Kembali</a>
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