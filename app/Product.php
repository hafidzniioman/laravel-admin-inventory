<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    /**
     * The Attributes that are mass assignable
     * 
     * @var array
     */

     protected $fillable = [
        'nama', 
        'kode_barang',
        'no_urut_pendaftaran', 
        'merk', 'tahun_peroleh', 
        'jumlah_barang', 
        'satuan_barang', 
        'lokasi', 
        'image'
     ];
}
