<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sectores extends Model
{
    protected $table = 'poligonos_sectores_nuevo';

    protected $filllable = [
        'lat',
        'sector',
        'lon',      
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
