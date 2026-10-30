<?php

namespace App\Http\Controllers;

use App\Models\{test, delegaciones, sectores};
use App\Models\cuadrantes;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $datos_del = delegaciones::select('lat', 'lon', 'delegacion')->limit(50)->get();
        $datos_sec = sectores::select('lat', 'lon', 'sector')->limit(50)->get();
        $datos_cts =cuadrantes::select('lat', 'lon', 'cuadrante')->limit(50)->get();
        return view('test1', compact('datos_del', 'datos_sec', 'datos_cts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, test $test)
    {
        //
    }

    /**
     *Testde mapa numero 3
     */
    public function mapa()
    {
        $datos_del = delegaciones::select('lat', 'lon', 'delegacion')->limit(500)->get();
        $datos_sec = sectores::select('lat', 'lon', 'sector')->limit(500)->get();
        $datos_cts =cuadrantes::select('lat', 'lon', 'cuadrante')->limit(500)->get();
        return view('mapa', compact('datos_del', 'datos_sec', 'datos_cts'));
    }
    

    public function test2(){
        $datos_del = delegaciones::select('lat', 'lon', 'delegacion')->limit(500)->get();
        $datos_sec = sectores::select('lat', 'lon', 'sector')->limit(500)->get();
        $datos_cts =cuadrantes::select('lat', 'lon', 'cuadrante')->limit(500)->get();
        return view('test2', compact('datos_del', 'datos_sec', 'datos_cts'));
    }
}
