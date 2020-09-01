@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h3>{{ $title }}</h3>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <button class="btn btn-sm btn-flat btn-success btn-close" a href=" http://localhost/eclaim/public/"><i class="fa fa-close"></i>Close</button>
                </p>
            </div>
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
            <div class="box-body">
              <div class="table-responsive">
              <table class="table myTable">
              <thead id="table_id">
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
                  <th>Dokumen Upload</th>
                  <th>Created At</th>
                  <th>Approve</th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($registers as $register)
                  {{-- <form action="{{url('/verifikasi/approve/'.$register->id)}}" method="post"> --}}
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <tr>
                  <td>{{$register->no_polis}}</td>
                  <td>{{$register->tgl_kejadian}}</td>
                  <td>{{$register->jam_kejadian}}</td>
                  <td>{{$register->penyebab}}</td>
                  <td>{{$register->deskripsi_kejadian}}</td>
                  <td>Rp.{{number_format ($register->estimasi_kerugian,0)}}</td>
                  <td>{{$register->no_rekening}}</td>
                  <td>{{$register->nama_bank}}</td>
                  <td>{{$register->no_klaim}}</td>
                    @if($register->status_klaim=='Not Yet Approve')
                        <td style="text-align: center"><label class="label label-danger" >Not Yet Approve</label></td>
                    @else
                        <td style="text-align: center"><label class="label label-success" >Approve</label></td>
                    @endif
                    <td><img src="{{url('storage/'.$register->nama_file)}}" width="100px" height="100px" alt=""></td>
                    {{-- <td><img src="{{url('storage/'.$r->bukti_pembayaran)}}" width="100px" height="100px" alt=""></td> --}}
                   <td>{{$register->created_at}}</td>
                   <td>
                        <a href="{{url('admin/approve/'. $register->id) }}">
                            <i class="fa fa-paint-brush" style="align-center"></i>
                        </a>
                    </td> 
                  </tr>
                  {{-- </form> --}}
              @endforeach
              </tbody>
              </table>
            </div>
          
                
            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection

<script type="text/javascript" src="{{ asset('/js/datatable.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/cdn-datatable.js') }}"></script>
@section('javascript')
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );

</script>
@endsection
