<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Kegiatan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:#f4f6f9;
font-family:Arial, Helvetica, sans-serif;
}

.header-box{
background:linear-gradient(135deg,#ffc107,#fd7e14);
color:#212529;
padding:25px;
border-radius:15px;
}

.card-box{
border:none;
border-radius:15px;
}

.table thead{
background:#ffc107;
color:#212529;
}

.table tbody tr:hover{
background:#f1f1f1;
transition:0.3s;
}

.btn{
border-radius:10px;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="header-box shadow mb-4">
<h2> Data Kegiatan Kampus</h2>
<p>Kelola agenda kegiatan organisasi kampus</p>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="border-radius:10px;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card shadow card-box">
<div class="card-body">

<div class="d-flex justify-content-between mb-3">
<h4>Daftar Kegiatan</h4>
<a href="/kegiatan/create" class="btn btn-warning">+ Tambah Kegiatan</a>
</div>

<table class="table table-bordered table-hover">

<thead>
<tr>
<th>No</th>
<th>Nama Kegiatan</th>
<th>Tanggal</th>
<th>Lokasi</th>
<th>Deskripsi</th>
<th width="180">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($data as $row)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $row->nama_kegiatan }}</td>
<td>{{ $row->tanggal }}</td>
<td>{{ $row->lokasi }}</td>
<td>{{ $row->deskripsi }}</td>

<td>

<a href="/kegiatan/{{ $row->id }}/edit" class="btn btn-primary btn-sm">
Edit
</a>

@can('delete', $row)
<form action="/kegiatan/{{ $row->id }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">
Hapus
</button>

</form>
@endcan

</td>
</tr>
@endforeach

</tbody>

</table>

</div>
</div>

</div>

</body>
</html>