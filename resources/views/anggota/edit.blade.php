<!DOCTYPE html>
<html>
<head>
<title>Edit Anggota</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<h2>Edit Anggota</h2>

<form action="/anggota/{{ $data->id }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama" value="{{ $data->nama }}" class="form-control mb-2">
<input type="text" name="nim" value="{{ $data->nim }}" class="form-control mb-2">
<input type="text" name="jurusan" value="{{ $data->jurusan }}" class="form-control mb-2">
<input type="text" name="jabatan" value="{{ $data->jabatan }}" class="form-control mb-2">
<input type="text" name="no_hp" value="{{ $data->no_hp }}" class="form-control mb-2">

<button class="btn btn-primary">Update</button>
<a href="/anggota" class="btn btn-secondary">Kembali</a>

</form>

</div>

</body>
</html>