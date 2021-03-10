@extends('layout.main')

@section('title', 'Edit Operator')

@section('header', 'Ubah Data Operator')

@section('size', 'col-md-6 col-lg-6')

@section('content')
<form action="/operator/{{ $operator->id_operator }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <div class="form-group">
        <h6>Nama Operator</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <input type="text" class="form-control" name="nama_operator" value="{{ $operator->nama_operator }}">
        </div>
    </div>
    <div class="form-group">
        <h6>Email</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
            <input type="email" class="form-control" name="email" value="{{ $operator->email }}">
        </div>
    </div>
    <div class="form-group">
        <h6>Password</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-key"></i>
                </div>
            </div>
            <input type="password" class="form-control" name="password" value="{{ $operator->password }}">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Update</button>
</form>
@endsection