@extends('layout.main')

@section('title', 'Add Operator')

@section('header', 'Tambah Data Operator')

@section('size', 'col-md-6 col-lg-6')

@section('content')
<form action="/operator" method="post">
    @csrf
    <div class="form-group">
        <h6>Nama Operator</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <input type="text" class="form-control" name="nama_operator">
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
            <input type="email" class="form-control" name="email">
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
            <input type="password" class="form-control" name="password">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Submit</button>
</form>
@endsection