<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Divisi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:#f4f6f9;
font-family:Arial, Helvetica, sans-serif;
}

.header-box{
background:linear-gradient(135deg,#198754,#20c997);
color:white;
padding:25px;
border-radius:15px;
}

.card-box{
border:none;
border-radius:15px;
}

.table thead{
background:#198754;
color:white;
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
<h2> Data Divisi Organisasi</h2>
<p>Kelola struktur divisi organisasi kampus</p>
</div>

<div class="card shadow card-box">
<div class="card-body">

<div class="d-flex justify-content-between mb-3">
<h4>Daftar Divisi</h4>
<a href="/divisi/create" class="btn btn-success">+ Tambah Divisi</a>
</div>

<table class="table table-bordered table-hover">

<thead>
<tr>
<th>No</th>
<th>Nama Divisi</th>
<th>Ketua</th>
<th>Keterangan</th>
<th width="180">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($data as $row)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $row->nama_divisi }}</td>
<td>{{ $row->ketua }}</td>
<td>{{ $row->keterangan }}</td>

<td>

<a href="/divisi/{{ $row->id }}/edit" class="btn btn-warning btn-sm">
Edit
</a>

<form action="/divisi/{{ $row->id }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">
Hapus
</button>

</form>

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