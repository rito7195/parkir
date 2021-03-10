@extends('layout.main')

@section('title', 'List Admin')

@section('header', 'Data Admin')

@section('add')
<a href="/admin/create"><button class="btn btn-success">Tambah</button></a>
@endsection
    
@section('content')
<div class="table-responsive">
<table class="table table-striped" id="admin">
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
        @foreach ($admin as $adm)
        <tr>
            <td>{{ $adm->id_admin }}</td>
            <td>{{ $adm->nama_admin }}</td>
            <td>{{ $adm->email }}</td>
            <td>{{ $adm->password }}</td>
            <td>
                <a href="/admin/{{ $adm->id_admin }}/edit"><button class="btn btn-primary">Edit</button></a>
                <form action="/admin/{{ $adm->id_admin }}" method="POST">
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

@section('table-id', '#admin')