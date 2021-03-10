@extends('layout.main')

@section('title', 'Konfigurasi Kapasitas')

@section('header', 'Konfigurasi Kapasitas')
    
@section('content')
<div class="table-responsive">
<table class="table table-striped" id="konfigurasi-kapasitas">
    <thead>                                 
        <tr>
            <th class="text-center">
                #
            </th>                           
            <th>Jenis Kendaraan</th>
            <th>Kapasitas</th>
            <th>Perubahan Terakhir</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>                                 
        @foreach ($kapasitas as $kapasitas)
        <tr>
            <td>{{ $kapasitas->id_kapasitas }}</td>
            <td>{{ $kapasitas->nama }}</td>
            <td>{{ $kapasitas->kapasitas }}</td>
            <td>{{ $kapasitas->nama_admin }} ({{ $kapasitas->updated_at }})</td>
            <td>
                <a class="btn btn-primary" href="/kapasitas/{{ $kapasitas->id_kapasitas }}/edit">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

@section('table-id', '#konfigurasi-kapasitas')