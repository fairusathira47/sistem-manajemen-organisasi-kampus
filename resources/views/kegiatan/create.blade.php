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

<label>Nama Kegiatan</label>
<input type="text" name="nama_kegiatan" class="form-control mb-3">

<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control mb-3">

<label>Lokasi</label>
<input type="text" name="lokasi" class="form-control mb-3">

<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control mb-3"></textarea>

<button class="btn btn-warning">Simpan</button>
<a href="/kegiatan" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

</div>

</body>
</html>