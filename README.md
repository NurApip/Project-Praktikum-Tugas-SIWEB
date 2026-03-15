# Project-Praktikum-Tugas-SIWEB
=======
# Sistem Manajemen Sepatu Cibaduyut Shoes

## Overview Project
Project ini dibuat untuk mengelola toko sepatu online Cibaduyut Shoes. Awalnya mungkin dari HTML/JS sederhana, sekarang udah pindah ke Laravel framework biar lebih rapi dan scalable. Fokusnya refactor kode ke MVC pattern pake Blade template, tapi fitur inti tetep sama kayak sebelumnya.

Semua fitur JS interaktif (dark mode, wishlist, stok real-time) masih work, cuma sekarang dibungkus Laravel biar routing, session, sama asset handling lebih aman dan clean.

## Fitur Sistem
- **Login System (Laravel Session)**: Proteksi halaman pake session bawaan Laravel. Username/password divalidasi di controller.
- **Remember Me (Cookies)**: Cookie terenkripsi otomatis Laravel buat stay login.
- **Dynamic Navbar**: Halo user dari `session('user')`, login/logout link berubah otomatis.
- **Dark Mode Toggle**: LocalStorage + CSS class switch.
- **Stok Management**: Tombol "Beli" kurangin stok real-time, alert habis.
- **Wishlist**: SessionStorage, tambah/hapus item, count badge, modal popup.
- **Asset Loading**: Semua CSS/JS/gambar pake `{{ asset() }}` helper.

## Struktur Direktori Laravel
```
project-sepatu/
│
├── app/Http/Controllers/
│   ├── AuthController.php     # Handle login, logout, session check
│   └── Controller.php         # Base controller
│
├── public/
│   ├── css/style.css          # Styling (hero bg, dark mode, cards)
│   ├── js/script.js           # JS logic (dark, beli, wishlist)
│   └── assets/                # Gambar sepatu (NIKE_P_6000.jpg dll)
│
├── resources/views/
│   ├── index.blade.php        # Halaman utama shoes catalog
│   └── login.blade.php        # Form login
│
├── routes/
│   └── web.php                # Route '/' → index, '/login' → controller
│
├── TODO.md & TODO-2.md        # Progress fix assets/modal
└── README.md                  # Ini dokumennya
```

## Penjelasan Kode & Output

### Kode Program Utama
**routes/web.php** (Routing):
```php
Route::get('/', fn() => view('index'));  // Shoes catalog
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
```

**app/Http/Controllers/AuthController.php** (Logic):
- `showLogin()`: Cek session, return view login.
- `login()`: Validate POST, set session/cookie, redirect index.
- `logout()`: Flush session, redirect login.

**resources/views/index.blade.php** (View):
- Navbar dinamis `@if session`.
- Hero section CSS bg image.
- Cards sepatu dengan `{{ asset('assets/xxx.jpg') }}`.
- Modal wishlist Bootstrap.

**public/js/script.js** (Interaktivitas):
- `aktifkanTombolWishlist()`: Event delegation klik ❤️.
- `tampilkanWishlist()`: Render list dari sessionStorage ke modal.
- Dark mode toggle localStorage.

### Output Saat Dijalankan
```
php artisan serve → http://127.0.0.1:8000
```
- **Halaman Shoes**: Navbar (Login/Halo user/Logout), hero bg gambar sepatu, 3 cards NIKE, stats (12 produk/85 stok/3 kategori).
- **Klik ❤️**: Alert "Nike P-6000 berhasil ditambahkan!", badge count +1.
- **Navbar ⭐**: Modal "Wishlist Kamu" list item atau "kosong".
- **Mode Gelap**: Toggle btn, background gelap cards invert.
- **Beli**: Stok 10→9, alert "Berhasil membeli".

### Penjelasan Teknis
**Routing**: Gak perlu akses langsung login.php lagi. Laravel router tangkap semua URL, arahin ke controller method yang pas.

**Controller**: Semua logika (cek login, set session) dipindah dari HTML atas ke PHP class. View cuma tampilan, aman dari XSS auto escape `{{ }}`.

**Blade**: `@if session()->has('user')` bikin navbar pintar ganti link. `asset()` generate URL `/css/style.css` absolut.

**Assets**: Dipindah public/ biar Laravel serve static files langsung. No broken link pas production.

**JS Persistence**: LocalStorage dark mode, sessionStorage wishlist – tetep work cross refresh.


Terima kasih .
