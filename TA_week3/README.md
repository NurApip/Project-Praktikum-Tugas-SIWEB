# Sistem Manajemen Sepatu (Cibaduyut Shoes)
Aplikasi web sederhana buat ngelola katalog sepatu, punya tampilan responsif sama interaktif. Dibuat pake HTML, CSS (Bootstrap 5), Vanilla JS, plus PHP buat login. Data stok sama wishlist disimpen di localStorage/sessionStorage biar tetep ada pas refresh.

## Gambaran Umum (Overview)
Ini simulasi homepage toko sepatu online. Bisa liat daftar sepatu Nike (P-6000, Air Force 1, Air Jordan 1 Low), cek stok, tambah wishlist, beli (stok auto berkurang real-time). Login pake PHP session sama cookie "Remember Me". Semua interaksi otomatis tersave di browser.

## Integrasi PHP &amp; Sistem Autentikasi
Dari client-side murni jadi dinamis pake PHP. Fokus keamanan login server-side pake session. Cookie buat remember login 7 hari.

### Apa yang Ada?
- **index.php** diubah jadi PHP: `session_start()`, cek `$_SESSION['user']`, navbar dinamis (halo username + logout kalo login).
- **login.php**: Form POST ke `controller/proses_login.php`, error dari `$_SESSION['error']`.
- **controller/proses_login.php**: Hardcode admin/123, set `$_SESSION['user']`, cookie `remember_user` kalo dicentang (`setcookie(..., time() + 7 days)`).
- **controller/logout.php**: `session_destroy()`, hapus cookie, redirect.

## Fitur Utama
- **Login/Logout &amp; Remember Me**: Session PHP + cookie 7 hari.
- **Dark Mode Persisten**: Toggle di `script.js` pake `localStorage 'theme'`, CSS `.dark-mode`.
- **Beli &amp; Stok**: JS parse "Stok: X" dari DOM, kurangin, disable kalo 0.
- **Wishlist**: `sessionStorage 'sneaker_wishlist'`, modal + badge navbar, add/remove/clear.
- **Responsif**: Bootstrap 5 navbar/card/modal.
- **Gambar**: `images/NIKE_P_6000.jpg` dll, hero `background.jpg`.

## Teknologi
- **PHP**: Session, cookie, proses login/logout.
- **HTML5/CSS3**: Struktur + custom dark mode di `style.css`.
- **Bootstrap 5**: UI components/modal/navbar.
- **Vanilla JS** (`script.js`): DOM manip, local/sessionStorage, event delegation.

## Struktur Berkas
```
TA_week3/
├── index.php          # Halaman utama + session check
├── login.php          # Form login
├── controller/
│   ├── proses_login.php # Validasi + session/cookie
│   └── logout.php       # Destroy session/cookie
├── script.js          # Dark mode, beli, wishlist JS
├── style.css          # Custom styles + dark mode
├── images/            # Foto sepatu + bg
├── LICENSE
└── README.md
```

Cara jalanin: Buka `index.php` di browser (XAMPP/php built-in). Login: admin/123, centang Remember Me optional. Beli/wishlist berubah real-time, dark mode toggle navbar.

