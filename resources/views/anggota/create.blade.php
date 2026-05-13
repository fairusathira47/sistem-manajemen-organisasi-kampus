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
<input type="text" name="nama" class="form-control mb-3" placeholder="Masukkan Nama">

<label>NIM</label>
<input type="text" name="nim" class="form-control mb-3" placeholder="Masukkan NIM">

<label>Jurusan</label>
<input type="text" name="jurusan" class="form-control mb-3" placeholder="Masukkan Jurusan">

<label>Jabatan</label>
<input type="text" name="jabatan" class="form-control mb-3" placeholder="Masukkan Jabatan">

<label>No HP</label>
<input type="text" name="no_hp" class="form-control mb-4" placeholder="Masukkan Nomor HP">

<button type="submit" class="btn btn-primary">💾 Simpan</button>
<a href="/anggota" class="btn btn-secondary">⬅ Kembali</a>

</form>

</div>
</div>

</div>

</body>
</html>