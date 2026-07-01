<!DOCTYPE html>
<html>
<head>
<title>Tambah Kegiatan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{background:#f4f6f9;}
.card-box{border:none;border-radius:15px;}
</style>
</head>
<body>

<div class="container mt-5">

<div class="card shadow card-box">
<div class="card-body p-4">

<h2 class="text-warning mb-4"> Tambah Data Kegiatan</h2>

<form action="/kegiatan" method="POST">
@csrf

<label class="form-label fw-bold">Nama Kegiatan</label>
<input type="text" name="nama_kegiatan" class="form-control mb-1 @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan') }}">
@error('nama_kegiatan')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="form-label fw-bold mt-2">Tanggal</label>
<input type="date" name="tanggal" class="form-control mb-1 @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}">
@error('tanggal')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="form-label fw-bold mt-2">Lokasi</label>
<input type="text" name="lokasi" class="form-control mb-1 @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}">
@error('lokasi')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="form-label fw-bold mt-2">Deskripsi</label>
<textarea name="deskripsi" class="form-control mb-1 @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
@error('deskripsi')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<button class="btn btn-warning mt-3">Simpan</button>
<a href="/kegiatan" class="btn btn-secondary mt-3">Kembali</a>

</form>

</div>
</div>

</div>

</body>
</html>