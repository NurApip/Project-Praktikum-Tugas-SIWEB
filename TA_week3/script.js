// ===========================================
// 1. FITUR DARK MODE (LocalStorage & DOM)
// ===========================================
const btnTheme = document.getElementById('btn-theme');
const body = document.body;

// Cek apakah ada simpanan tema di browser?
if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark-mode');
    btnTheme.innerText = "Mode Terang";
}

btnTheme.addEventListener('click', function() {
    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
        btnTheme.innerText = "Mode Terang";
    } else {
        localStorage.removeItem('theme');
        btnTheme.innerText = "Mode Gelap";
    }
});

// ===========================================
// 2. FITUR BELI (Event Listener & Math)
// ===========================================

function aktifkanTombolBeli() {
    const tombolBeli = document.querySelectorAll('.btn-detail');
    tombolBeli.forEach(function(button) {
        button.replaceWith(button.cloneNode(true));
    });
    const tombolBaru = document.querySelectorAll('.btn-detail');
    tombolBaru.forEach(function(button) {
        button.addEventListener('click', function(e) {
            const cardBody = e.target.closest('.card-body');
            const stokElement = cardBody.querySelector('.stok-text');
            let stok = parseInt(stokElement.innerText.replace("Stok: ", ""));
            if (stok > 0) {
                stok--;
                stokElement.innerText = "Stok: " + stok;
                const namaBarang = cardBody.querySelector('.card-title').innerText;
                alert("Berhasil membeli " + namaBarang);
            } else {
                alert("Stok Habis!");
                e.target.disabled = true;
                e.target.innerText = "Habis";
            }
        });
    });
}  
aktifkanTombolBeli();

// ===========================================
// 3. FITUR WISHLIST (SessionStorage, Modal, Event Delegation)
// ===========================================

const wishlistKey = 'sneaker_wishlist';

// GET Whislist arrya dari sessionStorage
function getWishlist() {
    const stored = sessionStorage.getItem(wishlistKey);
    return stored ? JSON.parse(stored) : [];
}

// Simpan Whislist array untuk sessionStorage
function saveWishlist(items) {
    sessionStorage.setItem(wishlistKey, JSON.stringify(items));
}

// Update penambahan amgka di navbar
function updateBadge() {
    const countSpan = document.getElementById('wishlist-count');
    if (countSpan) {
        const items = getWishlist();
        countSpan.textContent = items.length;
    }
}

// Menambahkan item ke wishlist
function addToWishlist(productName, targetBtn) {
    let items = getWishlist();
    if (!items.includes(productName)) {
        items.push(productName);
        saveWishlist(items);
        updateBadge();
        alert(`${productName} berhasil ditambahkan ke wishlist!`);
        
        const originalText = targetBtn.innerText;
        targetBtn.innerText = '✓ Di-wishlist';
        targetBtn.classList.add('btn-success');
        targetBtn.classList.remove('btn-outline-danger');
        setTimeout(() => {
            targetBtn.innerText = originalText;
            targetBtn.classList.remove('btn-success');
            targetBtn.classList.add('btn-outline-danger');
        }, 2000);
    } else {
        alert(`${productName} sudah ada di wishlist Kamu.`);
    }
}

// Hapus item dari wishlist
function removeFromWishlist(index) {
    let items = getWishlist();
    items.splice(index, 1);
    saveWishlist(items);
    tampilkanWishlist();
}

// Hapus semua
function clearWishlist() {
    sessionStorage.removeItem(wishlistKey);
    tampilkanWishlist();
}

// tampilkanWishlist() untuk navbar onclick
function tampilkanWishlist() {
    updateBadge();
    const list = document.getElementById('wishlist-list');
    const emptyMsg = document.getElementById('empty-wishlist');
    let items = getWishlist();

    list.innerHTML = '';

    if (items.length === 0) {
        emptyMsg.textContent = 'Wishlist kosong. Tambahkan sneakers favorit kamu.';
        emptyMsg.classList.remove('d-none');
        return;
    }

    emptyMsg.classList.add('d-none');

    items.forEach((item, index) => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.innerHTML = `<strong>${item}</strong>`;

        list.appendChild(li);
    });
}

// Aktifkan tombol wishlist dengan event delegation
function aktifkanTombolWishlist() {
    const buttons = document.querySelectorAll('.btn-wishlist');
    buttons.forEach(button => button.replaceWith(button.cloneNode(true)));
    const newButtons = document.querySelectorAll('.btn-wishlist');
    newButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const cardBody = e.target.closest('.card-body');
            const productName = cardBody.querySelector('.card-title').textContent;
            addToWishlist(productName, e.target);
        });
    });
}

// Init
aktifkanTombolWishlist();
updateBadge();

document.addEventListener('DOMContentLoaded', () => {
    const clearBtn = document.getElementById('clear-wishlist');
    clearBtn?.addEventListener('click', clearWishlist);
});

