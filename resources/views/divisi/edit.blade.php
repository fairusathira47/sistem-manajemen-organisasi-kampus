<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Divisi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
    font-family: Arial, Helvetica, sans-serif;
}
.header-box {
    background: linear-gradient(135deg, #198754, #20c997);
    color: white;
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
        <h2>🏢 Edit Data Divisi</h2>
        <p>Perbarui informasi divisi organisasi</p>
    </div>

    <div class="card shadow card-box">
        <div class="card-body p-4">
            <form action="/divisi/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')

                <label class="form-label fw-bold">Nama Divisi</label>
                <input type="text" name="nama_divisi" class="form-control mb-1 @error('nama_divisi') is-invalid @enderror" value="{{ old('nama_divisi', $data->nama_divisi) }}">
                @error('nama_divisi')
                    <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <label class="form-label fw-bold mt-2">Ketua</label>
                <input type="text" name="ketua" class="form-control mb-1 @error('ketua') is-invalid @enderror" value="{{ old('ketua', $data->ketua) }}">
                @error('ketua')
                    <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <label class="form-label fw-bold mt-2">Keterangan</label>
                <textarea name="keterangan" class="form-control mb-1 @error('keterangan') is-invalid @enderror">{{ old('keterangan', $data->keterangan) }}</textarea>
                @error('keterangan')
                    <div class="text-danger small mb-3">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-success mt-3">Update</button>
                <a href="/divisi" class="btn btn-secondary mt-3">Kembali</a>
            </form>
        </div>
    </div>

</div>

</body>
</html>
