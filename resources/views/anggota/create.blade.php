<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Anggota</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:#f4f6f9;
font-family:Arial, Helvetica, sans-serif;
}

.card-box{
border:none;
border-radius:15px;
}

.header-box{
background:linear-gradient(135deg,#0d6efd,#6610f2);
color:white;
padding:25px;
border-radius:15px;
}

.btn{
border-radius:10px;
}

label{
font-weight:bold;
margin-bottom:5px;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="header-box shadow mb-4">
<h2>👨‍🎓 Tambah Data Anggota</h2>
<p>Masukkan data anggota organisasi kampus</p>
</div>

<div class="card shadow card-box">
<div class="card-body p-4">

<form action="/anggota" method="POST">
@csrf

<label>Nama Lengkap</label>
<input type="text" name="nama" class="form-control mb-1 @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old('nama') }}">
@error('nama')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="mt-2">NIM</label>
<input type="text" name="nim" class="form-control mb-1 @error('nim') is-invalid @enderror" placeholder="Masukkan NIM" value="{{ old('nim') }}">
@error('nim')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="mt-2">Jurusan</label>
<input type="text" name="jurusan" class="form-control mb-1 @error('jurusan') is-invalid @enderror" placeholder="Masukkan Jurusan" value="{{ old('jurusan') }}">
@error('jurusan')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="mt-2">Jabatan</label>
<input type="text" name="jabatan" class="form-control mb-1 @error('jabatan') is-invalid @enderror" placeholder="Masukkan Jabatan" value="{{ old('jabatan') }}">
@error('jabatan')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<label class="mt-2">No HP</label>
<input type="text" name="no_hp" class="form-control mb-1 @error('no_hp') is-invalid @enderror" placeholder="Masukkan Nomor HP" value="{{ old('no_hp') }}">
@error('no_hp')
    <div class="text-danger small mb-3">{{ $message }}</div>
@enderror

<button type="submit" class="btn btn-primary mt-3">💾 Simpan</button>
<a href="/anggota" class="btn btn-secondary mt-3">⬅ Kembali</a>

</form>

</div>
</div>

</div>

</body>
</html>