@extends('layout.main')

@section('title', 'Add Parkir')

@section('header', 'Tambah Data Parkir')

@section('size', 'col-md-6 col-lg-6')

@section('content')
<form action="/parkir" method="post">
    @csrf
    <div class="form-group">
        <h6>Jenis Kendaraan</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-car"></i>
                </div>
            </div>
            <select class="form-control" name="id_jenis">
                @foreach ($jenis as $jenis)
                    <option value="{{ $jenis->id_jenis }}">{{ $jenis->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <h6>Plat Nomor</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                </div>
            </div>
            <input type="text" class="form-control" name="plat_nomor">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection