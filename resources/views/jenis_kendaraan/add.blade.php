@extends('layout.main')

@section('title', 'Add Jenis Kendaraan')

@section('header', 'Tambah Data Jenis Kendaraan')

@section('size', 'col-md-6 col-lg-6')

@section('content')
<form action="/jenis_kendaraan" method="post">
    @csrf
    <div class="form-group">
        <h6>Nama Kendaraan</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-car"></i>
                </div>
            </div>
            <input type="text" class="form-control" name="nama">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection