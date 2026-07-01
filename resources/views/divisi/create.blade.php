<!DOCTYPE html>
<html>
<head>
<title>Tambah Divisi</title>
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

<h2 class="text-success mb-4">🏢 Tambah Data Divisi</h2>

<form action="/divisi" method="POST">
@csrf

<label class="form-label fw-bold">Nama Divisi</label>
<input type="text" name="nama_divisi" class="form-control mb-1 @error('nama_divisi') is-invalid @enderror" value="{{ old('nama_divisi') }}">
@error('nama_divisi')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="form-label fw-bold mt-2">Ketua</label>
<input type="text" name="ketua" class="form-control mb-1 @error('ketua') is-invalid @enderror" value="{{ old('ketua') }}">
@error('ketua')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="form-label fw-bold mt-2">Keterangan</label>
<textarea name="keterangan" class="form-control mb-1 @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
@error('keterangan')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<button class="btn btn-success mt-3">Simpan</button>
<a href="/divisi" class="btn btn-secondary mt-3">Kembali</a>

</form>

</div>
</div>

</div>

</body>
</html>