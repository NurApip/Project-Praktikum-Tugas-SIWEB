# Cibaduyut Shoes - Sistem Manajemen Sepatu (Tugas Akhir 2)

## Fitur JavaScript Ditambahkan

### 1. Dark Mode (localStorage)
- Toggle via #btn-theme: `body.classList.toggle('dark-mode')`
- Simpan state permanen di `localStorage 'theme': 'dark'`
- CSS classes di style.css untuk dark theme.

### 2. Tombol Beli (DOM Manipulation + Logic)
- Event delegation: clone/reset buttons untuk multiple listeners.
- `aktifkanTombolBeli()`: Parse stok dari .stok-text, kurangi stok--, alert nama produk dari .card-title.
- Disable + "Habis" jika stok 0.

### 3. Wishlist/Keranjang (sessionStorage + Modal)
- `sessionStorage 'sneaker_wishlist'`: Array nama produk unik (no duplicates).
- `addToWishlist()`: Push jika belum ada, save JSON, update badge #wishlist-count, visual feedback.
- Event delegation `aktifkanTombolWishlist()` untuk .btn-wishlist.
- `tampilkanWishlist()` (global untuk navbar onclick): Render list di #wishlist-list pakai createElement/appendChild, toggle #empty-wishlist.
- Bonus: `removeFromWishlist(index)` onclick hapus spesifik, `clearWishlist()` tombol Hapus Semua.
- Modal #wishlistModal + badge update real-time.

Semua gunakan `let/const`, vanilla JS, comments rapi. Stok & dark mode persist independen.

## Cara Test
- Open index.html di browser.
- Klik Beli: stok turun, alert.
- Toggle dark mode, refresh: persist.
- Add Wishlist (dupe dicek), lihat badge/modal, hapus/clear. Close tab: session clear.

© 2026 Cibaduyut Shoes

