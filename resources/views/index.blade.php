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
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Style -->
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
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box" style="background-color:#163676">
              <img src="{{ asset('dist/img/af-budget-img.webp') }}">
              <div class="wrapedbox"></div>
              <div class="inner text-white">
                <h4>Total AF Budget</h4>

                <p>Rp 1.023.029.345</p>

                <style>
                  .trapezoid {
                      position: relative;
                      width: 110px;
                      /* height: 100px; */
                      bottom: 70px;
                      border-bottom: 50px solid #f00;
                      border-left: 35px solid transparent;
                      /* border-right: 25px solid transparent; */
                      /* transform: skew(-20deg); */
                      /* overflow: hidden; */
                      transform: rotate(180deg);
                      overflow: hidden;
                  }
                  .image1 {
                      /* position: absolute; */
                      background-image: url(https://images.pexels.com/photos/6962992/pexels-photo-6962992.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
                      background-size: cover;
                      background-position: center 30%;
                      width: 150px;
                      height: 70px;
                  }
                  
                </style>
                <!-- <div class="image1"></div> -->
                <!-- <div class="trapezoid"></div> -->
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box" style="background-color:#163676">
              <img src="{{ asset('dist/img/af-budget-img.webp') }}">
              <div class="wrapedbox"></div>
              <div class="inner text-white">
                <h4>Total AF Created</h4>

                <p>1049</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <!-- small box -->
            <div class="small-box" style="background-color:#163676">
              <img src="{{ asset('dist/img/af-budget-img.webp') }}">
              <div class="wrapedbox"></div>
              <div class="inner text-white">
                <h4>Total AF Cancelled</h4>

                <p>318</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-8">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">AF Created By Month</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-4 -->
          <div class="col-4">
            <!-- PIE CHART -->
            <!-- <div class="card"> -->
              <!-- <div class="card-header"> -->
                <!-- <h3 class="card-title">Pie Chart</h3> -->

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> -->
              <!-- </div> -->
              <!-- <div class="card-body"> -->
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              <!-- </div> -->
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-4 col-4">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Top 5 Sales</h3>
                <div class="card-tools">
                  March 2023
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>AF Created</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Andrian Sebastian</td>
                    <td>102</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Bagas Norfianto</td>
                    <td>93</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Nurul Afiansyah</td>
                    <td>80</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Septonur Hadi</td>
                    <td>54</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Budianto sofyan</td>
                    <td>29</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Top 5 Pre Sales</h3>
                <div class="card-tools">
                  March 2023
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>AF Created</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Andrian Sebastian</td>
                    <td>102</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Bagas Norfianto</td>
                    <td>93</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Nurul Afiansyah</td>
                    <td>80</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Septonur Hadi</td>
                    <td>54</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Budianto sofyan</td>
                    <td>29</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-4">

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
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script>
	window.setTimeout("waktu()", 1000);
 
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("time").innerHTML = waktu.getHours()+':'+waktu.getMinutes()+':'+waktu.getSeconds();
	}
</script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */



    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, {
      maintainAspectRatio : false,
      responsive : true,
      plugins: {
        title: {
          display: true,
          text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
        }
      }
    })

    var lineChartData = $.extend(true, {}, {
      labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label               : 'AF Created',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointStyle: 'circle',
          pointRadius: 10,
          pointHoverRadius: 15,
          // pointRadius          : false,
          // pointColor          : '#3b8bba',
          // pointStrokeColor    : 'rgba(60,141,188,1)',
          // pointHighlightFill  : '#fff',
          // pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 60, 55, 28, 63, 75, 67, 71, 78, 67, 73, 90]
        },
        // {
        //   label               : 'Electronics',
        //   backgroundColor     : 'rgba(210, 214, 222, 1)',
        //   borderColor         : 'rgba(210, 214, 222, 1)',
        //   pointRadius         : false,
        //   pointColor          : 'rgba(210, 214, 222, 1)',
        //   pointStrokeColor    : '#c1c7d1',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(220,220,220,1)',
        //   data                : [65, 59, 80, 81, 56, 55, 40]
        // },
      ]
    })

    lineChartData.datasets[0].fill = false;
    // lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Created',
          'Approved',
          'Process',
          'Cancelled',
      ],
      datasets: [
        {
          data: [800,350,550,300],
          backgroundColor : ['#FFBD00', '#009CFF', '#05377A', '#FF6C00'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
</body>
</html>