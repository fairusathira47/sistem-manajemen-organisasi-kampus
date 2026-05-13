<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Organisasi Kampus</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:#f4f6f9;
font-family:Arial, Helvetica, sans-serif;
}

.navbar{
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.hero{
background:linear-gradient(135deg,#0d6efd,#6610f2);
padding:70px 0;
color:white;
text-align:center;
border-radius:0 0 30px 30px;
}

.menu-card{
border:none;
border-radius:15px;
transition:0.3s;
}

.menu-card:hover{
transform:translateY(-8px);
box-shadow:0 12px 25px rgba(0,0,0,0.15);
}

.footer{
margin-top:70px;
background:#212529;
color:white;
padding:20px;
text-align:center;
}
</style>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
<a class="navbar-brand" href="/">Organisasi Kampus</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">
<ul class="navbar-nav ms-auto">
<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
<li class="nav-item"><a class="nav-link" href="/anggota">Anggota</a></li>
<li class="nav-item"><a class="nav-link" href="/divisi">Divisi</a></li>
<li class="nav-item"><a class="nav-link" href="/kegiatan">Kegiatan</a></li>
</ul>
</div>
</div>
</nav>

<!-- Hero -->
<div class="hero">
<div class="container">
<h1 class="display-5 fw-bold">Sistem Manajemen Organisasi Kampus</h1>
<p class="lead">Project Laravel CRUD Mata Kuliah Pemrograman Framework</p>
</div>
</div>

<!-- Content -->
<div class="container mt-5">

<div class="row g-4">

<div class="col-md-4">
<div class="card menu-card shadow">
<div class="card-body text-center p-4">
<h3> Anggota</h3>
<p>Kelola data anggota organisasi kampus.</p>
<a href="/anggota" class="btn btn-primary">Buka</a>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card menu-card shadow">
<div class="card-body text-center p-4">
<h3> Divisi</h3>
<p>Kelola divisi dan struktur organisasi.</p>
<a href="/divisi" class="btn btn-success">Buka</a>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card menu-card shadow">
<div class="card-body text-center p-4">
<h3> Kegiatan</h3>
<p>Kelola agenda kegiatan kampus.</p>
<a href="/kegiatan" class="btn btn-warning">Buka</a>
</div>
</div>
</div>

</div>

<div class="card mt-5 shadow border-0">
<div class="card-body p-4">
<h3>Tentang Sistem</h3>
<p>
Website ini dibuat menggunakan Laravel Framework dengan fitur CRUD
(Create, Read, Update, Delete) untuk membantu pengelolaan organisasi kampus.
</p>
</div>
</div>

</div>

<!-- Footer -->
<div class="footer">
© 2026 Sistem Organisasi Kampus | Laravel Project
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>