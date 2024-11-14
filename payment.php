<?php
// Jika form dikirimkan, ambil data dari form dan proses pembayaran
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data produk dan metode pembayaran
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $paymentMethod = $_POST['paymentMethod']; // Misalnya, COD atau E-Wallet

    // Tampilkan rincian pembayaran
    echo "<h1>Pembayaran untuk: $productName</h1>";
    echo "<p>Harga: $productPrice</p>";
    echo "<p>Metode Pembayaran: $paymentMethod</p>";

    // Misalnya, simulasikan proses pembayaran dan tampilkan pesan sukses
    echo "<p>Pembayaran berhasil diproses melalui $paymentMethod. Silakan tunggu konfirmasi.</p>";
} else {
    // Jika tidak menggunakan POST, tampilkan pesan error atau redirect ke halaman utama
    echo "<p>Terjadi kesalahan. Silakan coba lagi.</p>";
}
?>
