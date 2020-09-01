<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = "registrations";

    public function registrasi(){
        return $this->belongsTo('App\UploadDokumen', 'lokasi_file', 'id');
    }

}
