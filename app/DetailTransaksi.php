<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detailtransaksis';
    protected $primaryKey = 'kd_detail_transaksi';
    protected $fillable = ['kd_transaksi', 'kd_barang', 'kd_user', 'qyt', 'harga'];

    public function barang()
    {
    return $this->belongsTo(Barang::class, 'kd_barang');
    }

    public function transaksi()
    {
    return $this->belongsTo(Transaksi::class, 'kd_transaksi');
    }

    public function user()
    {
    return $this->belongsTo(User::class, 'kd_user');
    }
}
