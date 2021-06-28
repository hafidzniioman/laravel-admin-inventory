<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->bigInteger('kode_barang');
            $table->bigInteger('no_urut_pendaftaran');
            $table->string('merk');
            $table->bigInteger('tahun_peroleh');
            $table->bigInteger('jumlah_barang');
            $table->bigInteger('satuan_barang');
            $table->string('lokasi');
            $table->text('image');
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
        Schema::dropIfExists('products');
    }
}
