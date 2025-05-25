<?php
$servername = "localhost";        // Genelde localhost olur
$username = "root";              // Veritabanı kullanıcı adı (XAMPP için genelde root)
$password = "";                  // Şifre (XAMPP'de genelde boştur)
$database = "erginler";    // Kendi veritabanı adını yaz

// Bağlantıyı oluştur
$baglanti = new mysqli($servername, $username, $password, $database);

// Bağlantı kontrolü
if ($baglanti->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $baglanti->connect_error);
}

// Karakter seti Türkçe uyumluluğu için
$baglanti->set_charset("utf8");
?>