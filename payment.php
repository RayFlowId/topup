<?php
// Simulasi server untuk menerima dan memproses pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $paymentMethod = $_POST['paymentMethod']; // Misalnya, bisa COD atau E-Wallet

    // Proses pembayaran sesuai metode yang dipilih
    echo "<h1>Pembayaran untuk: $productName</h1>";
    echo "<p>Harga: $productPrice</p>";
    echo "<p>Metode Pembayaran: $paymentMethod</p>";

    // Misalnya, tampilkan tombol untuk konfirmasi pembayaran atau menggunakan API pihak ketiga untuk memproses
    echo "<p>Pembayaran berhasil diproses melalui $paymentMethod. Silakan tunggu konfirmasi.</p>";
} else {
    // Jika tidak menggunakan POST, tampilkan form pemilihan produk
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Top Up Game - RAYY</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }
            body {
                background-color: #121212;
                color: #fff;
                display: flex;
                justify-content: center;
                padding: 20px;
                font-size: 16px;
            }
            .container {
                width: 100%;
                max-width: 1200px;
            }
            .header {
                text-align: center;
                padding: 20px;
                background-color: #333;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            }
            .header h1 {
                font-size: 28px;
                color: #ff00ff;
                text-shadow: 2px 2px 5px rgba(255, 0, 255, 0.5);
            }
            .search-bar {
                width: 100%;
                padding: 10px;
                border-radius: 5px;
                border: none;
                font-size: 16px;
                margin-top: 10px;
                background-color: #222;
                color: #fff;
            }
            .search-bar:focus {
                outline: none;
                border: 2px solid #ff00ff;
            }
            .product-grid {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                margin-top: 20px;
            }
            .product-card {
                background-color: #222;
                border-radius: 10px;
                display: flex;
                width: 100%;
                max-width: 600px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                transition: transform 0.3s, box-shadow 0.3s;
                margin-bottom: 20px;
            }
            .product-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 15px rgba(255, 0, 255, 0.3);
            }
            .product-image {
                flex: 1;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 15px;
            }
            .product-image img {
                width: 100%;
                height: auto;
                max-height: 150px;
                object-fit: cover;
                border-radius: 10px;
            }
            .product-info {
                flex: 2;
                padding: 15px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .product-name {
                font-size: 18px;
                color: #ff66ff;
                font-weight: bold;
                margin-bottom: 10px;
                text-align: left;
            }
            .product-price {
                font-size: 20px;
                color: #ff00ff;
                font-weight: bold;
                margin-bottom: 15px;
                text-align: left;
            }
            .product-details {
                font-size: 14px;
                color: #bbb;
                line-height: 1.6;
                margin-bottom: 15px;
                text-align: left;
            }
            .order-button {
                background-color: #ff00ff;
                color: #fff;
                padding: 12px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s, transform 0.3s;
                align-self: flex-start;
            }
            .order-button:hover {
                background-color: #ff33ff;
                transform: scale(1.05);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Top Up Game - RAYY</h1>
                <input type="text" class="search-bar" placeholder="Cari produk..." id="searchBar">
            </div>

            <div class="product-grid" id="productGrid">
                <!-- Produk akan dimasukkan melalui JavaScript -->
            </div>
        </div>

        <script>
            // Dummy Data Produk
            const products = [
                {name: 'Top Up Mobile Legends 200 Diamond', price: 'Rp 50.000', image: 'https://rammpntxxx-up.hf.space/file/image-j9rqczvbdp.jpg', details: 'Top Up Mobile Legends 200 Diamond'},
                {name: 'Top Up Free Fire 500 Diamond', price: 'Rp 75.000', image: 'https://rammpntxxx-up.hf.space/file/image-ldpgc4hdz6.jpg', details: 'Top Up Free Fire 500 Diamond'},
                {name: 'Top Up Free Fire 1000 Diamond', price: 'Rp 150.000', image: 'https://rammpntxxx-up.hf.space/file/image-ldpgc4hdz6.jpg', details: 'Top Up Free Fire 1000 Diamond'},
                {name: 'Top Up Mobile Legends 500 Diamond', price: 'Rp 100.000', image: 'https://rammpntxxx-up.hf.space/file/image-j9rqczvbdp.jpg', details: 'Top Up Mobile Legends 500 Diamond'},
                {name: 'Top Up Mobile Legends 1000 Diamond', price: 'Rp 200.000', image: 'https://rammpntxxx-up.hf.space/file/image-j9rqczvbdp.jpg', details: 'Top Up Mobile Legends 1000 Diamond'},
            ];

            // Menampilkan Produk ke Grid
            function displayProducts(products) {
                const productGrid = document.getElementById('productGrid');
                productGrid.innerHTML = '';
                products.forEach(product => {
                    const productCard = `
                        <div class="product-card">
                            <div class="product-image">
                                <img src="${product.image}" alt="${product.name}">
                            </div>
                            <div class="product-info">
                                <h3 class="product-name">${product.name}</h3>
                                <p class="product-price">${product.price}</p>
                                <p class="product-details">${product.details}</p>
                                <form method="POST" action="payment.php">
                                    <input type="hidden" name="productName" value="${product.name}">
                                    <input type="hidden" name="productPrice" value="${product.price}">
                                    <label for="paymentMethod">Metode Pembayaran:</label>
                                    <select name="paymentMethod" required>
                                        <option value="COD">Cash on Delivery (COD)</option>
                                        <option value="E-Wallet">E-Wallet</option>
                                    </select>
                                    <button type="submit" class="order-button">Pesan Sekarang</button>
                                </form>
                            </div>
                        </div>
                    `;
                    productGrid.innerHTML += productCard;
                });
            }

            // Tampilkan semua produk saat pertama kali load
            displayProducts(products);
        </script>
    </body>
    </html>
    <?php
}
?>
