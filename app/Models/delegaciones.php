<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Table;

class delegaciones extends Model
{

    protected $table = 'poligonos_delegaciones_nuevo';
    protected $fillable = [
        'id_del',
        'delegacion',
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
