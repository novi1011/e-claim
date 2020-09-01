<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePembayaranKlaim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_klaim', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reg_id');
            $table->date('tgl_bayar');
            $table->string('bukti_pembayaran', 100);
            $table->string('lokasi_file_pembayaran', 100);
            $table->string('nama_user', 100);
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
