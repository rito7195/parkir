@extends('layout.main')

@section('title', 'Edit Jenis Kendaraan')

@section('header', 'Ubah Data Jenis Kendaraan')

@section('size', 'col-md-6 col-lg-6')

@section('content')
<form action="/jenis_kendaraan/{{ $jenisKendaraan->id_jenis }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <div class="form-group">
        <h6>Nama Kendaraan</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-car"></i>
                </div>
            </div>
            <input type="text" class="form-control" name="nama" value="{{ $jenisKendaraan->nama }}">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Update</button>
</form>
@endsection