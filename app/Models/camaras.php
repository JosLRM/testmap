<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class camaras extends Model
{
    protected $table='cameras';

    protected $fillable=[
        'ip',
        'username',
        'password',
        'lat',
        'lon',
        'id_sec',
    ];

    protected $hidden = [

        'created_at',
        'updated_at'
    ];
}
