<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jasa Raharja Putera-Eclaim</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>


    <div class="content-header">
      <div class="container-fluid">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark text-center my-auto"><b>PENGAJUAN ECLAIM ONLINE</b></h1>
            <hr>
          </div><!-- /.col -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  @if ($message = Session::get('sukses'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
  @endif
  @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
  @endif

   <body>
<div class="card">
        <div class="container">
            <h3>Upload Dokumen</h3>
        </div><br>
 
    <form action="{{ url('eclaim/upload-dokumen') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
                <div>
                <input type="hidden" name= 'id', class="form-control" value="{{$data->id}}">
                </div>
                <div class="form-group">
                    <label for="nama_file">Nama File</label>
                    <input type="text" class="form-control" id="nama_file" name="nama_file">
                </div>
 
                <div class="form-group">
                    <label for="lokasi_file">Lokasi File</label>
                    <input type="file" id="lokasi_file" name="lokasi_file" multipart>
                </div>
 
                <input class="btn btn-primary" type="submit" value="Upload">
            </form>
 
        @if(count($errors) > 0)
            <div class="row">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
            </div>
        @endif
 
        </div>
  </div>
  </body>
   
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

</html>