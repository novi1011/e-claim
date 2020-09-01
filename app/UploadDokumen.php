<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadDokumen extends Model
{
    protected $table = "upload_dokumens";

    public function uploadDokumen(){
        return $this->hasOne('App\Registrasi', 'lokasi_file', 'id');
    }
}
