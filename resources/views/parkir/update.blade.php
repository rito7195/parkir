<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/parkir/{{ $parkir->id_parkir }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        <input type="hidden" name="id_jenis" value="{{ $parkir->id_jenis }}">
        <input type="hidden" name="id_operator" value="{{ $parkir->id_operator }}">
        <input type="hidden" name="plat_nomor" value="{{ $parkir->plat_nomor }}">
        <input type="hidden" name="tgl_parkir" value="{{ $parkir->tgl_parkir }}">
        <input type="submit" value="Update">
    </form>
</body>
</html>