<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocodes extends Model
{
    //

    protected $fillable = [
        'code',
        'active',
        'expired',
        'value',
        'radius',
        'longitude',
    ];

}
