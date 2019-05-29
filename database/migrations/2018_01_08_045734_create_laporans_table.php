<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id_laporan');
            $table->integer('id_kecamatan')->unsigned();
            $table->integer('id_fasilitas')->unsigned();
            $table->string('lokasi', 100);
            $table->string('foto', 64)->nullable();
            $table->dateTime('tgl_dikirim');
            $table->dateTime('updated_at');
            $table->string('pengirim', 100);
            $table->dateTime('tgl_diverifikasi');
            $table->integer('status');
            $table->string('keterangan');

            $table->index(['id_kecamatan', 'id_fasilitas']);

            $table->foreign('id_kecamatan')
                ->references('id_kecamatan')
                ->on('kecamatan')
                ->onDelete('cascade');
            $table->foreign('id_fasilitas')
                ->references('id_fasilitas')
                ->on('fasilitas')
                ->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
