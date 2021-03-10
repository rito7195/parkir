@extends('layout.main')

@section('title', 'Edit Kapasitas')

@section('header', 'Ubah Data Kapasitas Parkir')

@section('size', 'col-md-6 col-lg-6')

@section('content')
<form action="/kapasitas/{{ $kapasita->id_kapasitas }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <div class="form-group">
        <h6>Kapasitas</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-square"></i>
                </div>
            </div>
            <input type="number" class="form-control" name="kapasitas" value="{{ $kapasita->kapasitas }}">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Update</button>
</form>
@endsection