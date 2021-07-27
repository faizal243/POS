<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $primaryKey ="kd_merek";
    protected $fillable = [
        'kd_merek','merek'
    ];
}
