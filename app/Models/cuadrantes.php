<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cuadrantes extends Model
{
    protected $table = 'poligonos_cuadrante_nuevo';

    protected $fillable = [
        'cuadrante',
        'lat',
        'lon'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getLatAttribute($lat){
        return str_replace(',', '.', $lat);
    }

    public function getLonAttribute($lon){
        return str_replace(',', '.', $lon);
    }
}
