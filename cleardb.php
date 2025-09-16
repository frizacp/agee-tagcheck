<?php

// 1. PENGATURAN KONEKSI DATABASE
$db_host = '127.0.0.1';
$db_port = '3306';
$db_name = 'agee-tagcheck';
$db_user = 'root';
$db_pass = ''; // Kosongkan jika tidak ada password
$db_table = 'tagcheck';

// String koneksi (DSN) untuk PDO
$dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_name;charset=utf8mb4";

try {
    // 2. MEMBUAT KONEKSI
    $pdo = new PDO($dsn, $db_user, $db_pass);

    // Mengatur mode error PDO ke exception agar error lebih mudah ditangani
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Koneksi ke database '{$db_name}' berhasil. -- ";

    // 3. MENJALANKAN PERINTAH UNTUK MENGOSONGKAN TABEL
    // Perintah TRUNCATE TABLE jauh lebih cepat daripada DELETE FROM untuk menghapus semua data
    $sql = "TRUNCATE TABLE `{$db_table}`";

    // Eksekusi perintah
    $pdo->exec($sql);

    echo "✅ Berhasil! Semua data dari tabel '{$db_table}' telah dihapus. -- ";

} catch (PDOException $e) {
    // 4. MENANGANI JIKA TERJADI ERROR
    // Hentikan skrip dan tampilkan pesan error
    die("❌ ERROR: Gagal terhubung atau menjalankan query. Pesan: " . $e->getMessage());
} finally {
    // 5. MENUTUP KONEKSI
    // Set objek PDO menjadi null untuk menutup koneksi
    $pdo = null;
    echo "🔌 Koneksi ditutup.";
}

// Skrip selesai di sini
?>