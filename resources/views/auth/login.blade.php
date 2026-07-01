<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Masuk - Sistem Organisasi Kampus</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
<style>
    body {
        background: linear-gradient(135deg, #0f172a, #1e1b4b, #311042);
        font-family: 'Outfit', sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #f1f5f9;
        overflow-x: hidden;
    }
    .login-container {
        width: 100%;
        max-width: 450px;
        padding: 20px;
    }
    .glass-card {
        background: rgba(30, 41, 59, 0.7);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 60px rgba(99, 102, 241, 0.15);
    }
    .brand-header {
        background: linear-gradient(135deg, #6366f1, #a855f7);
        padding: 35px 20px;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    .brand-title {
        font-weight: 800;
        letter-spacing: -1px;
        margin-bottom: 5px;
        font-size: 1.8rem;
        background: linear-gradient(to right, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .form-control {
        background: rgba(15, 23, 42, 0.6);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #f1f5f9;
        border-radius: 12px;
        padding: 12px 16px;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        background: rgba(15, 23, 42, 0.8);
        border-color: #8b5cf6;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.25);
        color: #fff;
    }
    .btn-submit {
        background: linear-gradient(135deg, #6366f1, #a855f7);
        border: none;
        border-radius: 12px;
        padding: 12px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
    }
    .btn-submit:hover {
        background: linear-gradient(135deg, #4f46e5, #9333ea);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
    }
    .btn-submit:active {
        transform: translateY(0);
    }
    .form-label {
        font-weight: 500;
        font-size: 0.9rem;
        color: #cbd5e1;
        margin-bottom: 6px;
    }
</style>
</head>
<body>

<div class="login-container">
    <div class="glass-card shadow">
        <div class="brand-header">
            <h1 class="brand-title">ORGANISASI KAMPUS</h1>
            <p class="text-white-50 m-0 small">Sistem Manajemen Portal Mahasiswa</p>
        </div>
        <div class="card-body p-4 p-md-5">
            
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 text-white shadow-sm mb-4" role="alert" style="background: rgba(16, 185, 129, 0.2); border-radius: 12px;">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 text-white shadow-sm mb-4" role="alert" style="background: rgba(239, 68, 68, 0.2); border-radius: 12px;">
                <ul class="m-0 p-0 list-unstyled small">
                    @foreach($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="/login" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                </div>
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input" style="background-color: rgba(15, 23, 42, 0.6); border-color: rgba(255, 255, 255, 0.1);">
                        <label class="form-check-label small text-secondary" for="remember">Ingat Saya</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-submit w-100 mb-3">Masuk Sekarang</button>
                <div class="text-center mt-4">
                    <p class="text-secondary small m-0">Belum punya akun? <a href="/register" class="text-decoration-none" style="color: #a855f7; font-weight: 600;">Daftar di sini</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
