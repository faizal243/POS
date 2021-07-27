<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $primaryKey ="kd_distributor";
    protected $fillable = [
        'kd_distributor','nama_distributor','alamat','no_telepon'
    ];

}
