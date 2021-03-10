<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\KonfigurasiKapasitas;
use App\Models\KonfigurasiTarif;
use App\Models\Cek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = new JenisKendaraan();
        $jenis = $obj::all();
        return view('jenis_kendaraan.list', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_kendaraan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = JenisKendaraan::create($request->all());
        if ($data) {
            $kapasitas['id_jenis'] = $data->id_jenis;
            $kapasitas['id_admin'] = Auth::guard('admin')->id();
            $tarif['id_jenis'] = $data->id_jenis;
            $tarif['id_admin'] = Auth::guard('admin')->id();
            $cek['id_jenis'] = $data->id_jenis;

            KonfigurasiKapasitas::create($kapasitas);
            KonfigurasiTarif::create($tarif);
            Cek::create($cek);
            return redirect('/jenis_kendaraan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKendaraan $jenisKendaraan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKendaraan $jenisKendaraan)
    {
        return view('jenis_kendaraan.update', compact('jenisKendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKendaraan $jenisKendaraan)
    {
        $jenisKendaraan->nama = $request->nama;
        $jenisKendaraan->save();
        return redirect('/jenis_kendaraan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKendaraan $jenisKendaraan)
    {
        if ($jenisKendaraan->delete()) {
            KonfigurasiKapasitas::destroy($jenisKendaraan->id_jenis);
            KonfigurasiTarif::destroy($jenisKendaraan->id_jenis);
            Cek::destroy($jenisKendaraan->id_jenis);
            
            return back();
        }
    }
}
