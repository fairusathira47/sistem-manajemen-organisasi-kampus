<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Anggota</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:#f4f6f9;
font-family:Arial, Helvetica, sans-serif;
}
.header-box{
background:linear-gradient(135deg,#0d6efd,#6610f2);
color:white;
padding:25px;
border-radius:15px;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="header-box shadow mb-4">
<h2>Edit Data Anggota</h2>
<p>Perbarui informasi anggota organisasi</p>
</div>

<div class="card shadow" style="border:none; border-radius:15px;">
    <div class="card-body p-4">
        <form action="/anggota/{{ $data->id }}" method="POST">
        @csrf
        @method('PUT')

        <label class="form-label fw-bold">Nama Lengkap</label>
        <input type="text" name="nama" value="{{ old('nama', $data->nama) }}" class="form-control mb-1 @error('nama') is-invalid @enderror">
        @error('nama')
            <div class="text-danger small mb-3">{{ $message }}</div>
        @enderror

        <label class="form-label fw-bold mt-2">NIM</label>
        <input type="text" name="nim" value="{{ old('nim', $data->nim) }}" class="form-control mb-1 @error('nim') is-invalid @enderror">
        @error('nim')
            <div class="text-danger small mb-3">{{ $message }}</div>
        @enderror

        <label class="form-label fw-bold mt-2">Jurusan</label>
        <input type="text" name="jurusan" value="{{ old('jurusan', $data->jurusan) }}" class="form-control mb-1 @error('jurusan') is-invalid @enderror">
        @error('jurusan')
            <div class="text-danger small mb-3">{{ $message }}</div>
        @enderror

        <label class="form-label fw-bold mt-2">Jabatan</label>
        <input type="text" name="jabatan" value="{{ old('jabatan', $data->jabatan) }}" class="form-control mb-1 @error('jabatan') is-invalid @enderror">
        @error('jabatan')
            <div class="text-danger small mb-3">{{ $message }}</div>
        @enderror

        <label class="form-label fw-bold mt-2">No HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp', $data->no_hp) }}" class="form-control mb-1 @error('no_hp') is-invalid @enderror">
        @error('no_hp')
            <div class="text-danger small mb-3">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary mt-3">Update</button>
        <a href="/anggota" class="btn btn-secondary mt-3">Kembali</a>

        </form>
    </div>
</div>

</div>

</body>
</html>