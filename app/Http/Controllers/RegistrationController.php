<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registrasi;
use App\UploadDokumen;
use App\PembayaranKlaim;
use DB; 
use Auth;
use Session;

class RegistrationController extends Controller
{
    public function create(){
       
        return view('admin/create');
    }

    public function index(){
        $title = "Verifikasi Eclaim";
        // $registers = Registrasi::all();
         $registers = DB::table('registrations')
            ->leftjoin('upload_dokumens', 'registrations.id', '=', 'upload_dokumens.reg_id')
            // ->leftjoin('detail_pembayarans', 'registrasi_klaims.id', '=', 'detail_pembayarans.reg_id')
            ->select('registrations.id','registrations.no_polis', 
            'registrations.tgl_kejadian',
            'registrations.jam_kejadian',
            'registrations.penyebab',
            'registrations.deskripsi_kejadian',
            'registrations.estimasi_kerugian',
            'registrations.no_rekening',
            'registrations.nama_bank',
            'registrations.no_klaim',
            'registrations.status_klaim',
            'registrations.created_at',
            'upload_dokumens.nama_file')
            // 'detail_pembayarans.bukti_pembayaran')
            ->orderBy('registrations.created_at','DESC')
            ->get();

        return view('admin/index', compact('registers', 'title'));
    }

    public function store(Request $request){
        $data = new Registrasi;
        $data->no_polis = $request->no_polis; 
        $data->tgl_kejadian = $request->tgl_kejadian;
        $data->jam_kejadian = $request->jam_kejadian;
        $data->penyebab = $request->penyebab;
        $data->deskripsi_kejadian = $request->deskripsi_kejadian;
        $data->estimasi_kerugian = $request->estimasi_kerugian;
        $data->no_rekening = $request->no_rekening;
        $data->nama_bank = $request->nama_bank;
        $data->no_klaim = $request->no_klaim;
        $data->status_klaim = "Not Yet Approve";
        $datapolis = $request->no_polis;
        $curl = curl_init();
 
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://services.jp.co.id/api/dummy/index.php/verification?nopolis=".$datapolis,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type:application/json',
                ),
            ));
 
        $response = curl_exec($curl);
        $err = curl_error($curl);
 
        curl_close($curl);
 
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $sel = json_decode($response);
                    // dd($kota);
        }

        try {
            $request->no_polis== $sel->nomorpolis;
            $data->save();
        } catch (\Throwable $th) {
            //throw $th;
            Session::flash('error', 'Data Tidak Ada!');
            return redirect()->back();
        }
           $id = $data->id;

        return redirect('/eclaim/upload-dokumen/'.$id);
    }

    public function approved($id){
         $approved = DB::table('registrations')
            ->leftjoin('upload_dokumens', 'registrations.id', '=', 'upload_dokumens.reg_id')
            // ->leftjoin('detail_pembayarans', 'registrasi_klaims.id', '=', 'detail_pembayarans.reg_id')
            ->select('registrations.id','registrations.no_polis', 
            'registrations.tgl_kejadian',
            'registrations.jam_kejadian',
            'registrations.penyebab',
            'registrations.deskripsi_kejadian',
            'registrations.estimasi_kerugian',
            'registrations.no_rekening',
            'registrations.nama_bank',
            'registrations.no_klaim',
            'registrations.status_klaim',
            'registrations.created_at',
            'upload_dokumens.nama_file')
            // 'detail_pembayarans.bukti_pembayaran')
            ->where('registrations.id',$id)
            ->get();

            foreach ($approved as $key => $value) {
                # code...
                $id = $value->id;
                if ($value->status_klaim=='Approve') {
                    # code...
                    Session::flash('error','Data telah di approve');
                    return redirect()->back();
                }
                if ($value->nama_file==null) {
                    # code...
                    Session::flash('error','Data Pendukung Tidak Ada : Tidak Bisa Di Approved');
                    return redirect()->back();
                }
            }

            // ret  urn $approved;
            $data = \App\Registrasi::find($id);
            $data->status_klaim= 'Approve';
            $data->save();

            return redirect('nilai/'.$id);
        
        // return redirect()->back();

    }

    public function editnilai($id){
        $title = "Pembayaran Klaim";
        $reg = Registrasi::findOrFail($id);

        return view('admin.nilai',compact('reg', 'title'));
    }

    public function storevalue(Request $request){
        $app = new \App\PersetujuanKlaim;
        $app->reg_id = $request->id;
        $app->tgl_persetujuan = date('Y-m-d');
        $app->uang_disetujui = $request->uang_disetujui;
        $app->nama_user = Auth::user()->name;
        $app->save();

        $gambar = $request->file('lokasi_file');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('lokasi_file')->move("storage/upload-bukti-pembayaran/", $namaFile);
        
        $pay = new PembayaranKlaim;
        $pay->reg_id = $request->id;
        $pay->lokasi_file_pembayaran = $namaFile; 
        $pay->tgl_bayar = date('Y-m-d');
        $pay->bukti_pembayaran = $request->bukti_pembayaran;
        $pay->nama_user = Auth::user()->name;
        // return $pay;
        $app->save();

        Session::flash('sukses','Data Berhasil Di Approve');
        return redirect()->back();
    }
 
   

    
}
