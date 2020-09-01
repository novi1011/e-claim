<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT.JASA RAHARJA PUTERA</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <style>
  .body {
      background-image: url("paper.gif");
      background-color: #cccccc;
  }


  </style>
</head>
<body>
<div class="card">
  
  <div class="content-header">
    <div class="container-fluid">
        <div class="col-sm-12">
          <h1 class="m-0 text-dark text-center my-auto"><b>PENGAJUAN ECLAIM ONLINE</b></h1>
          <hr>
        </div><!-- /.col -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
  
  <div class="container">
      @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
          </div>
      @endif
    <div class="box-body" >
      <form role="form" method="post" action="{{url('/eclaim')}}">
        {{ csrf_field() }}
        
          <div class="box-body">
              <div  class="form-group">
                <label for="exampleFormControlInput1">Nomor Polis</label>
                <input type="text" class="form-control" name="no_polis" id="nomor_polis" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Tanggal Kejadian</label>
                <input type="date" class="form-control" name="tgl_kejadian" id="tanggal_kejadian" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Waktu Kejadian</label>
                <input type="time" class="form-control" name="jam_kejadian" id="jam_kejadian" required >
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Penyebab</label>
                <input type="text" class="form-control" id="penyebab" name="penyebab" required></textarea>
              </div>
               <div class="form-group">
                <label for="exampleFormControlTextarea1">Deskripsi Kejadian</label>
                <textarea class="form-control" id="deskripsi_kejadian" name="deskripsi_kejadian" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Estimasi Kerugian</label>
                <input type="text" class="form-control" name="estimasi_kerugian" id="estimasi_kerugian" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nomer Rekening</label>
                <input type="text" class="form-control" name="no_rekening" id="no_rekeningn" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nama Bank</label>
                <input type="text" class="form-control" name="nama_bank" id="nama_bank" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Nomer Klaim</label>
                <input type="text" class="form-control" name="no_klaim" id="no_klaim" required>
              </div>
               <!-- <div class="form-group">
                <label for="exampleFormControlInput1">Status Klaim</label>  -->
                <input type="hidden" class="form-control" name="status_klaim" id="status_klaim">
              <!-- {{-- </div> --}} -->
          </div> 
          <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
    </div>
    <div>
    <br><br>
    
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

</body>  
</html>