@extends('layout.main')

@section('title', 'List Jenis Kendaraan')

@section('header', 'Data Jenis Kendaraan')

@section('add')
<a href="/jenis_kendaraan/create"><button class="btn btn-success">Tambah</button></a>
@endsection
    
@section('content')
<div class="table-responsive">
<table class="table table-striped" id="list-jenis-kendaraan">
    <thead>                                 
        <tr>
            <th class="text-center">
                #
            </th>                           
            <th>Nama Kendaraan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>                                 
        @foreach ($jenis as $kendaraan)
        <tr>
            <td>{{ $kendaraan->id_jenis }}</td>
            <td>{{ $kendaraan->nama }}</td>
            <td>
                <a class="btn btn-primary" href="/jenis_kendaraan/{{ $kendaraan->id_jenis }}/edit">Edit</a>
                <form action="/jenis_kendaraan/{{ $kendaraan->id_jenis }}" method="POST">
                    @csrf    
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

@section('table-id', '#list-jenis-kendaraan')