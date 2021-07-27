<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey ="kd_transaksi";
    protected $fillable = [
        'kd_transkasi','total_barang','total_harga','total_bayar','kembalian','tanggal_beli',
    ];
}
