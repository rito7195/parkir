<?php

namespace App\Http\Controllers;

use App\Models\KonfigurasiKapasitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonfigurasiKapasitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kapasitas = DB::table('tb_konfigurasi_kapasitas')
            ->join('tb_jenis_kendaraan', 'tb_konfigurasi_kapasitas.id_jenis', '=', 'tb_jenis_kendaraan.id_jenis')
            ->join('tb_admin', 'tb_konfigurasi_kapasitas.id_admin', '=', 'tb_admin.id_admin')
            ->select('tb_konfigurasi_kapasitas.*', 'tb_jenis_kendaraan.nama', 'tb_admin.nama_admin')
            ->get();

        return view('kapasitas.list', compact('kapasitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KonfigurasiKapasitas  $konfigurasiKapasitas
     * @return \Illuminate\Http\Response
     */
    public function show(KonfigurasiKapasitas $konfigurasiKapasitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonfigurasiKapasitas  $konfigurasiKapasitas
     * @return \Illuminate\Http\Response
     */
    public function edit(KonfigurasiKapasitas $kapasita)
    {
        return view('kapasitas.update', compact('kapasita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KonfigurasiKapasitas  $konfigurasiKapasitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonfigurasiKapasitas $kapasita)
    {
        $kapasita->kapasitas = $request->kapasitas;
        $kapasita->id_admin = Auth::guard('admin')->id();
        
        $kapasita->save();
        return redirect('/kapasitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonfigurasiKapasitas  $konfigurasiKapasitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonfigurasiKapasitas $konfigurasiKapasitas)
    {
    
    }
}
