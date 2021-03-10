<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use App\Models\JenisKendaraan;
use App\Models\KonfigurasiTarif;
use App\Models\Cek;
use App\Models\KonfigurasiKapasitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Alert;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkir = DB::table('tb_parkir')
            ->join('tb_jenis_kendaraan', 'tb_parkir.id_jenis', '=', 'tb_jenis_kendaraan.id_jenis')
            ->join('tb_operator', 'tb_parkir.id_operator', '=', 'tb_operator.id_operator')
            ->select('tb_parkir.*', 'tb_jenis_kendaraan.nama', 'tb_operator.nama_operator')
            ->get();
        
        return view('parkir.list', compact('parkir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = JenisKendaraan::all();
        
        return view('parkir.add', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['tgl_parkir'] = date('Y-m-d');
        $data['jam_masuk'] = date('Y-m-d H:i:s');
        $data['id_operator'] = Auth::guard('operator')->id();
        $cek = Cek::where('id_jenis', '=', $request->id_jenis)->first();
        $kapasitas = KonfigurasiKapasitas::where('id_jenis', '=', $request->id_jenis)->first();

        if ($cek->jumlah < $kapasitas->kapasitas) {
            if (Parkir::create($data)) {
                $cek->jumlah = $cek->jumlah + 1;
                $cek->save();
            
                return redirect('/parkir');
            }
        } else {
            return redirect('/parkir')->with('kapasitas', 'Lahan Parkir Penuh');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function show(Parkir $parkir)
    {
        return $parkir;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function edit(Parkir $parkir)
    {
        return view('parkir.update', compact('parkir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parkir $parkir)
    {
        $parkir->id_operator = Auth::guard('operator')->id();
        $parkir->jam_keluar = date('Y-m-d H:i:s');
        $masuk = strtotime($parkir->jam_masuk);
        $keluar = strtotime($parkir->jam_keluar);
        $diff = ($keluar - $masuk) / (60 * 60);
        $tarif = KonfigurasiTarif::where('id_jenis', '=', $parkir->id_jenis)->first();

        if ($diff < $tarif->jam_inap) {
            $parkir->tagihan = $tarif->tarif_normal;
        } else {
            $parkir->tagihan = $tarif->tarif_inap;
        }
        
        if ($parkir->save()) {
            $cek = Cek::where('id_jenis', '=', $parkir->id_jenis)->first();
            $cek->jumlah = $cek->jumlah - 1;
            $cek->save();
        }

        return redirect('/parkir')->with('tagihan', $parkir->tagihan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parkir  $parkir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parkir $parkir)
    {
        if ($parkir->delete()) {
            return back();
        }
    }
}
