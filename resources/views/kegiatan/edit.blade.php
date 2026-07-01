<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Kegiatan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
    font-family: Arial, Helvetica, sans-serif;
}
.header-box {
    background: linear-gradient(135deg, #ffc107, #fd7e14);
    color: #212529;
    padding: 25px;
    border-radius: 15px;
}
.card-box {
    border: none;
    border-radius: 15px;
}
</style>
</head>
<body>

<div class="container mt-5">

    <div class="header-box shadow mb-4">
        <h2>📅 Edit Data Kegiatan</h2>
        <p>Perbarui informasi agenda kegiatan kampus</p>
    </div>

    <div class="card shadow card-box">
        <div class="card-body p-4">
            <form action="/kegiatan/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')

                <label class="form-label fw-bold">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" class="form-control mb-1 @error('nama_kegiatan') is-invalid @enderror" value="{{ old('nama_kegiatan', $data->nama_kegiatan) }}">
                @error('nama_kegiatan')
                    <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <label class="form-label fw-bold mt-2">Tanggal</label>
                <input type="date" name="tanggal" class="form-control mb-1 @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $data->tanggal) }}">
                @error('tanggal')
                    <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <label class="form-label fw-bold mt-2">Lokasi</label>
                <input type="text" name="lokasi" class="form-control mb-1 @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $data->lokasi) }}">
                @error('lokasi')
                    <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <label class="form-label fw-bold mt-2">Deskripsi</label>
                <textarea name="deskripsi" class="form-control mb-1 @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-warning mt-3">Update</button>
                <a href="/kegiatan" class="btn btn-secondary mt-3">Kembali</a>
            </form>
        </div>
    </div>

</div>

</body>
</html>