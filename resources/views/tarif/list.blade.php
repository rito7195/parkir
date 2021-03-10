@extends('layout.main')

@section('title', 'Konfigurasi Tarif')

@section('header', 'Konfigurasi Tarif')

@section('content')
<div class="table-responsive">
<table class="table table-striped" id="konfigurasi-tarif">
    <thead>                                 
        <tr>
            <th class="text-center">
                #
            </th>                           
            <th>Jenis Kendaraan</th>
            <th>Tarif Normal</th>
            <th>Tarif Inap</th>
            <th>Jam Inap</th>
            <th>Perubahan Terakhir</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>                                 
        @foreach ($tarif as $tarif)
        <tr>
            <td>{{ $tarif->id_tarif }}</td>
            <td>{{ $tarif->nama }}</td>
            <td>{{ $tarif->tarif_normal }}</td>
            <td>{{ $tarif->tarif_inap }}</td>
            <td>{{ $tarif->jam_inap }} Jam</td>
            <td>{{ $tarif->nama_admin }} ({{ $tarif->updated_at }})</td>
            <td>
                <a class="btn btn-primary" href="/tarif/{{ $tarif->id_tarif }}/edit">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

@section('table-id', '#konfigurasi-tarif')