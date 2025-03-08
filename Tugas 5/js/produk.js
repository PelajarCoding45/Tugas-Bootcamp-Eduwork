const products = [
  { name: 'Laptop', category: 'Elektronik' },
  { name: 'Buku', category: 'Alat Tulis' },
  { name: 'Kemeja', category: 'Pakaian' },
  { name: 'Mouse', category: 'Elektronik' },
  { name: 'Pensil', category: 'Alat Tulis' },
  { name: 'Celana', category: 'Pakaian' },
];

function displayProducts(productsToDisplay) {
  const productList = document.getElementById('productList');
  productList.innerHTML = ''; // Bersihkan daftar sebelum menampilkan

  productsToDisplay.forEach(product => {
    const productDiv = document.createElement('div');
    productDiv.classList.add('product');
    productDiv.innerHTML = `<strong>${product.name}</strong> (${product.category})`;
    productList.appendChild(productDiv);
  });
}

function filterProducts(searchTerm) {
  const filteredProducts = products.filter(product =>
    product.name.toLowerCase().includes(searchTerm.toLowerCase())
  );
  displayProducts(filteredProducts);
}

// Tampilkan semua produk saat halaman dimuat
displayProducts(products);

// Tambahkan event listener untuk input pencarian
const searchInput = document.getElementById('searchInput');
searchInput.addEventListener('input', () => {
  filterProducts(searchInput.value);
});