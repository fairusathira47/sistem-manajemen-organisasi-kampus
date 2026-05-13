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

<label>Nama Divisi</label>
<input type="text" name="nama_divisi" class="form-control mb-3">

<label>Ketua</label>
<input type="text" name="ketua" class="form-control mb-3">

<label>Keterangan</label>
<textarea name="keterangan" class="form-control mb-3"></textarea>

<button class="btn btn-success">Simpan</button>
<a href="/divisi" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

</div>

</body>
</html>