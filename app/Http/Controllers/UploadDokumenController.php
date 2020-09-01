<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UploadDokumen;
use Session;

class UploadDokumenController extends Controller
{
    public function create(){
        
        return view('admin/upload-user');
    }

    public function hal($id){
        $data = \App\Registrasi::find($id);
        return view('admin.upload-user',compact('data'));
    }


    public function store(Request $request){
        $this->validate($request, [
            'nama_file' => 'required',
            'lokasi_file' => 'required|image',
            ]);

        $gambar = $request->file('lokasi_file');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('lokasi_file')->move("storage/uploadgambar/", $namaFile);
        $do = new UploadDokumen;
        $do->reg_id = $request->id;
        $do->lokasi_file =  $namaFile;
        $do->tgl_upload = date('Y-m-d');
        $do->nama_file = $request->nama_file;
        $do->save();
        
        Session::flash('sukses', 'Data Produk Berhasil Di Tambah');
        // return redirect('')->with(['message' => "Berhasil diupload!", 'alert-type' => 'success']);
       
    }
}
