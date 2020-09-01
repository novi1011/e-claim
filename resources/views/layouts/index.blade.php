<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jasa Raharja Putera-eclaim</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="{{url('width=device-width, initial-scale=1')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


    <div class="content-header">
      <div class="container-fluid">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark text-center my-auto"><b>PERSETUJUAN ECLAIM ONLINE</b></h1>
            <hr>
          </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-body" style="overflow-x:auto;">
              <table class="table table-hover">
              <thead>
                  <tr>
                  <th>Nomor Polis</th>
                  <th>Tanggal Kejadian</th>
                  <th>Waktu Kejadian</th>
                  <th>Penyebab</th>
                  <th>Deskripsi Kejadian</th>
                  <th>Estimasi Kerugian</th>
                  <th>Nomor Rekening</th>
                  <th>Nama Bank</th>
                  <th>Nomor Klaim</th>
                  <th>Status Klaim</th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($registers as $register)
                  <form action="{{url('/verifikasi')}}" method="get">
                  {{ csrf_field() }}
                  <tr>
                  <td>{{$register->no_polis}}</td>
                  <td>{{$register->tgl_kejadian}}</td>
                  <td>{{$register->jam_kejadian}}</td>
                  <td>{{$register->penyebab}}</td>
                  <td>{{$register->deskripsi_keajadian}}</td>
                  <td>{{$register->estimasi_kerugian}}</td>
                  <td>{{$register->no_rekening}}</td>
                  <td>{{$register->nama_bank}}</td>
                  <td>{{$register->no_klaim}}</td>
                  <td>{{$register->status_klaim}}</td>
                  </tr>
                  </form>
              @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

   
    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy;2020 PT.Jasa Raharja. All rights reserved | by BRD </span>|
        <a href="https://www.jasaraharja.co.id/privacy-policy" class="textregular" style="text-decoration:none;">Privacy Policy</a>|
        <a href="https://www.jasaraharja.co.id/terms-conditions" class="textregular" style="text-decoration:none;">Terms &amp; Conditions</a>
      </div>
    </div>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>