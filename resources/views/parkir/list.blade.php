@extends('layout.main')

@section('title', 'List Parkir')

@section('header', 'Data Parkir')

@if (Auth::guard('operator')->check())
  @section('add')
  <a href="/parkir/create"><button class="btn btn-success">Tambah</button></a>
  @endsection
@endif

@section('content')
<div class="table-responsive">
  <table class="table table-striped" id="list-parkir">
    <thead>                                 
      <tr>
        <th class="text-center">
          #
        </th>
        <th>Jenis Kendaraan</th>
        <th>Operator</th>
        <th>Plat Nomor</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Tagihan</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>                                 
      @foreach ($parkir as $parkir)
      <tr>
        <td>{{ $parkir->id_parkir }}</td>
        <td>{{ $parkir->nama }}</td>
        <td>{{ $parkir->nama_operator }}</td>
        <td>{{ $parkir->plat_nomor }}</td>
        <td>{{ $parkir->jam_masuk }}</td>
        <td>{{ $parkir->jam_keluar }}</td>
        <td>{{ $parkir->tagihan }}</td>
        <td>
          @if ($parkir->jam_keluar == null)
          <div class="badge badge-primary">Belum Keluar</div>
          @else
          <div class="badge badge-success">Sudah Keluar</div>
          @endif
        </td>
        <td>
          <form action="/parkir/{{ $parkir->id_parkir }}" method="POST">
            @csrf    
            {{ method_field('PATCH') }}
            <button class="btn btn-primary" type="submit">Sudah Keluar</button>
          </form>
          <form action="/parkir/{{ $parkir->id_parkir }}" method="POST">
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

@if (session('tagihan'))
	<script>
		Swal.fire(
			'Sukses!',
			'Tagihan : {{ session('tagihan') }}',
			'success'
		)
	</script>
@endif
@if (session('kapasitas'))
	<script>
		Swal.fire(
			'Gagal!',
			'{{ session('kapasitas') }}',
			'error'
		)
	</script>
@endif

@endsection

@section('table-id', '#list-parkir')