<?php

namespace App\Http\Controllers;

use App\Models\KonfigurasiTarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonfigurasiTarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarif = DB::table('tb_konfigurasi_tarif')
            ->join('tb_jenis_kendaraan', 'tb_konfigurasi_tarif.id_jenis', '=', 'tb_jenis_kendaraan.id_jenis')
            ->join('tb_admin', 'tb_konfigurasi_tarif.id_admin', '=', 'tb_admin.id_admin')
            ->select('tb_konfigurasi_tarif.*', 'tb_jenis_kendaraan.nama', 'tb_admin.nama_admin')
            ->get();
        
        return view('tarif.list', compact('tarif'));
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
     * @param  \App\Models\KonfigurasiTarif  $konfigurasiTarif
     * @return \Illuminate\Http\Response
     */
    public function show(KonfigurasiTarif $konfigurasiTarif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonfigurasiTarif  $konfigurasiTarif
     * @return \Illuminate\Http\Response
     */
    public function edit(KonfigurasiTarif $tarif)
    {
        return view('tarif.update', compact('tarif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KonfigurasiTarif  $konfigurasiTarif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KonfigurasiTarif $tarif)
    {
        $tarif->tarif_normal = $request->tarif_normal;
        $tarif->tarif_inap = $request->tarif_inap;
        $tarif->jam_inap = $request->jam_inap;
        $tarif->id_admin = Auth::guard('admin')->id();

        $tarif->save();
        return redirect('/tarif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonfigurasiTarif  $konfigurasiTarif
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonfigurasiTarif $konfigurasiTarif)
    {
        //
    }
}
