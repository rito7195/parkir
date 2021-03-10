@extends('layout.main')

@section('title', 'List Operator')

@section('header', 'Data Operator')

@section('add')
<a href="/operator/create"><button class="btn btn-success">Tambah</button></a>
@endsection
    
@section('content')
<div class="table-responsive">
<table class="table table-striped" id="operator">
    <thead>                                 
        <tr>
            <th class="text-center">
                #
            </th>                           
            <th>Nama Operator</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>                                 
        @foreach ($operator as $op)
        <tr>
            <td>{{ $op->id_operator }}</td>
            <td>{{ $op->nama_operator }}</td>
            <td>{{ $op->email }}</td>
            <td>{{ $op->password }}</td>
            <td>
                <a class="btn btn-primary" href="/operator/{{ $op->id_operator }}/edit">Edit</a>
                <form action="/operator/{{ $op->id_operator }}" method="POST">
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

@section('table-id', '#operator')