<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\camaras;
use Illuminate\Support\Facades\DB;

class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('cameras')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        
        camaras::create([
            'ip' => '10.90.111.37',
            'username' => 'admin',
            'password' => 'admin1234.',
            'lat' => 19.38965422866591,
            'lon' => 99.20036889604518,
            'id_sec' => 1,
        ]);
        camaras::create([
            'ip' => '10.90.111.37',
            'username' => 'admin',
            'password' => 'admin1234.',
            'lat' => 19.38965422866591,
            'lon' => 99.20036889604518,
            'id_sec' => 1,
        ]);
        camaras::create([
            'ip' => '10.90.111.37',
            'username' => 'admin',
            'password' => 'admin1234.',
            'lat' => 19.38965422866591,
            'lon' => 99.20036889604518,
            'id_sec' => 1,
        ]);
        camaras::create([
            'ip' => '10.90.111.37',
            'username' => 'admin',
            'password' => 'admin1234.',
            'lat' => 19.38965422866591,
            'lon' => 99.20036889604518,
            'id_sec' => 1,
        ]);
        camaras::create([
            'ip' => '10.90.111.37',
            'username' => 'admin',
            'password' => 'admin1234.',
            'lat' => 19.38965422866591,
            'lon' => 99.20036889604518,
            'id_sec' => 1,
        ]);camaras::create([
            'ip' => '10.90.111.37',
            'username' => 'admin',
            'password' => 'admin1234.',
            'lat' => 19.38965422866591,
            'lon' => 99.20036889604518,
            'id_sec' => 1,
        ]);
    }
}
