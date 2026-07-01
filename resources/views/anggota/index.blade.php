<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Anggota</title>

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

.table thead{
background:#0d6efd;
color:white;
}

.btn{
border-radius:10px;
}

.header-box{
background:linear-gradient(135deg,#0d6efd,#6610f2);
color:white;
padding:25px;
border-radius:15px;
}

.table tbody tr:hover{
background:#f1f1f1;
transition:0.3s;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="header-box mb-4 shadow">
<h2> Data Anggota Organisasi</h2>
<p>Kelola data anggota organisasi kampus</p>
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
<h4>Daftar Anggota</h4>
<a href="/anggota/create" class="btn btn-primary">+ Tambah Data</a>
</div>

<table class="table table-bordered table-hover">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>NIM</th>
<th>Jurusan</th>
<th>Jabatan</th>
<th>No HP</th>
<th width="180">Aksi</th>
</tr>
</thead>

<tbody>
@foreach($data as $row)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $row->nama }}</td>
<td>{{ $row->nim }}</td>
<td>{{ $row->jurusan }}</td>
<td>{{ $row->jabatan }}</td>
<td>{{ $row->no_hp }}</td>
<td>

<a href="/anggota/{{ $row->id }}/edit" class="btn btn-warning btn-sm">
Edit
</a>

@can('delete', $row)
<form action="/anggota/{{ $row->id }}" method="POST" style="display:inline;">
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