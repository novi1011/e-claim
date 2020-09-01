@extends('layouts.master')
 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        <ul style = "margin:40px;" class="list-group">
            <li class="list-group-item">Nomer Polis         : {{$reg->no_polis}}   </i>
            <li class="list-group-item">Tanggal Kejadian    : {{$reg->tgl_kejadian}}  </i>
            <li class="list-group-item">Waktu Kejadian      : {{$reg->jam_kejadian}}  </i>
            <li class="list-group-item">Penyebab            : {{$reg->penyebab}}  </i>
            <li class="list-group-item">Deskripsi Kejadian  : {{$reg->deskripsi_kejadian}}  </i>
            <li class="list-group-item">Estimasi Kerugian   : {{$reg->estimasi_kerugian}}  </i>
            <li class="list-group-item">Nomer Rekening      : {{$reg->no_rekening}}  </i>
            <li class="list-group-item">Nama Bank           : {{$reg->nama_bank}}  </i>
            <li class="list-group-item">Nomor Klaim         : {{$reg->no_klaim}}  </i>
            <li class="list-group-item">Created at          : {{$reg->created_at}}  </i>
        </ul>
        
        </div>

        <div class="col-sm-6">
        <br><br>
        {{-- <form action="{{url ('storevalue')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div style= "margin:left:40px;" class="form-group">
                <input type="hidden" name="id" value="{{$reg->id}}">
            <label for="">Nilai yang disetujui</label>
                <input type="number" class="form-control" name="uang_disetujui">
            <br>
            <label for="">Deskripsi Pembayaran</label>
            <input type="text" class="form-control" name="bukti_pembayaran">
            <br>
            <label for="lokasi_file">Input Bukti Pembayaran</label>
                <input type="file" name="lokasi_file" multipart >
            <br>
                <button type="submit" class="btn btn-primary"  value="Simpan"></button>
            
        </form>
            </div>
        </div>

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
</div> --}}
  <div class="col-md-6">
            <br><br>
            <form action="{{url('storevalue')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
               <div style="margin:left:10px;" class="form-group">
                <br><br>
                    <input readonly type="hidden" name="id" value="{{$reg->id}}">
                    <label for="uang_disetujui">Masukan Nilai</label>
                    <input type="number" class="form-control" name="uang_disetujui" ><br>
                    <label for="bukti_pembayaran">BUKTI</label>
                    <input type="text" class="form-control" name="bukti_pembayaran" ><br>
                    <div class="form-group">
                        <label for="lokasi_file">Lokasi File</label><br>
                        <input type="file" id="lokasi_file" name="lokasi_file" multipart>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" >Save</button>
               </div>
            </form>
        </div>
    </div>
</div>

       


@endsection