@extends('layout.main')

@section('title', 'Edit Admin')

@section('header', 'Ubah Data Admin')

@section('size', 'col-md-6 col-lg-6')

@section('content')
<form action="/tarif/{{ $tarif->id_tarif }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <div class="form-group">
        <h6>Tarif Normal</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-money-bill"></i>
                </div>
            </div>
            <input type="number" class="form-control" name="tarif_normal" value="{{ $tarif->tarif_normal }}">
        </div>
    </div>
    <div class="form-group">
        <h6>Tarif Inap</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
            <input type="number" class="form-control" name="tarif_inap" value="{{ $tarif->tarif_inap }}">
        </div>
    </div>
    <div class="form-group">
        <h6>Jam Inap</h6>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <input type="number" class="form-control" name="jam_inap" value="{{ $tarif->jam_inap }}">
        </div>
    </div>
    <button class="btn btn-success" type="submit">Update</button>
</form>
@endsection

    {{-- <form action="/tarif/{{ $tarif->id_tarif }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        <label for="">Tarif Normal</label>
        <br>
        <input type="number" name="tarif_normal" value="{{ $tarif->tarif_normal }}">
        <br>
        <label for="">Tarif Inap</label>
        <br>
        <input type="number" name="tarif_inap" value="{{ $tarif->tarif_inap }}">
        <br>
        <label for="">Jam Inap</label>
        <br>
        <input type="number" name="jam_inap" value="{{ $tarif->jam_inap }}">
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html> --}}