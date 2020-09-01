<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table){
            $table->increments('id');
            $table->string('no_polis');
            $table->date('tgl_kejadian');
            $table->time('jam_kejadian');
            $table->string('penyebab', 100);
            $table->string('deskripsi_kejadian', 100);
            $table->string('estimasi_kerugian', 100);
            $table->string('no_rekening', 100);
            $table->string('nama_bank', 100);
            $table->string('no_klaim', 100);
            $table->string('status_klaim', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
