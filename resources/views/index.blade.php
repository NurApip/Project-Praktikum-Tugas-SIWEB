<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cibaduyut SHOES</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    {{-- 1. BAGIAN ASET: Gunakan helper asset() --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body class="d-flex flex-column min-vh-100">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">CIBADUYUT SHOES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            {{-- 2. BAGIAN SESSION: Menggunakan Blade Directive @if --}}
            @if(!session()->has('user'))
                {{-- Jika Belum Login --}}
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Login</a>
            @else
                {{-- Jika Sudah Login --}}
                <span class="navbar-text me-2 text-white">Halo, {{ session('user') }}!</span>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">Logout</a>
            @endif

            <button class="btn btn-outline-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#wishlistModal" onclick="tampilkanWishlist()">
                ⭐ Wishlist (<span id="wishlist-count">0</span>)
            </button>
            <button id="btn-theme" class="btn btn-outline-light btn-sm">Mode Gelap</button>
        </div>
    </div>
</nav>

<section class="hero text-white">
    <div class="container text-center">
        <h2>Sistem Manajemen Sepatu</h2>
        <p class="lead mb-4">Sepatu impian dari koleksi eksklusif</p>
    </div>
</section>

<div class="container my-4">
    <div class="row text-center mb-4">
        <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><h6 class="text-muted">Total Produk</h6><h3>12</h3></div></div></div>
        <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><h6 class="text-muted">Stok Tersedia</h6><h3>85</h3></div></div></div>
        <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><h6 class="text-muted">Kategori</h6><h3>3</h3></div></div></div>
    </div>

    <h4 class="mb-3">Daftar Sepatu</h4>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100">
                {{-- BAGIAN GAMBAR: Gunakan asset() --}}
                <img src="{{ asset('assets/NIKE_P_6000.jpg') }}" class="card-img-top" alt="Sepatu">
                <div class="card-body">
                    <h6 class="card-title">Nike P-6000</h6>
                    <p class="mb-1">Harga: Rp 1.299.000</p>
                    <p class="text-muted stok-text">Stok: 10</p>
                    <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                    <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ asset('assets/AIR_FORCE_1.jpg') }}" class="card-img-top" alt="Sepatu">
                <div class="card-body">
                    <h6 class="card-title">Nike Air Force 1</h6>
                    <p class="mb-1">Harga: Rp 1.599.000</p>
                    <p class="text-muted stok-text">Stok: 7</p>
                    <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                    <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <img src="{{ asset('assets/AIR_JORDAN_1_LOW.jpg') }}" class="card-img-top" alt="Sepatu">
                <div class="card-body">
                    <h6 class="card-title">Nike Air Jordan 1 Low</h6>
                    <p class="mb-1">Harga: Rp 1.799.000</p>
                    <p class="text-muted stok-text">Stok: 19</p>
                    <button class="btn btn-primary btn-detail w-50 me-2">Beli</button>
                    <button class="btn btn-outline-danger btn-wishlist w-50">❤️ Wishlist</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-auto border-top">
    <small>© 2026 Cibaduyut Shoes</small>
</footer>

<!-- Wishlist Modal -->
<div class="modal fade" id="wishlistModal" tabindex="-1" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wishlistModalLabel">Wishlist Kamu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="empty-wishlist" class="text-center text-muted d-none">Wishlist kosong.</div>
                <ul id="wishlist-list" class="list-group"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" id="clear-wishlist" class="btn btn-outline-danger">Hapus Semua</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
{{-- BAGIAN SCRIPT: Gunakan asset() --}}
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
