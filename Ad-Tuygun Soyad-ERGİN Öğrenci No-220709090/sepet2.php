<?php
session_start();
header('Content-Type: application/json'); // JSON formatta çıktı gönder

// Hataları göster (sadece geliştirme aşamasında)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Veritabanı bağlantısı
include 'database/sepet_öğeleri/sepetgetir.php';

// Kullanıcı giriş yapmış mı kontrol et
if (!isset($_SESSION['user_id'])) {
    echo json_encode([]); // Giriş yapılmamışsa boş sepet
    exit;
}

$user_id = $_SESSION['user_id'];

// Sepetteki ürünleri çek
$sql = "SELECT urunler.urun_ad, sepet_ogeleri.adet,sepet_ogeleri.product_id
        FROM sepet_ogeleri 
        JOIN urunler ON sepet_ogeleri.product_id = urunler.id
        WHERE sepet_ogeleri.user_id = ?";
$stmt = $baglanti->prepare($sql);

if (!$stmt) {
    echo json_encode(["Hata" => "Sorgu hazırlanamadı."]);
    exit;
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$sonuc = $stmt->get_result();

$urunler = [];
while ($row = $sonuc->fetch_assoc()) {
    // Her ürün için "Ürün Adı (Adet)" formatı kullan
    $urunler[] = [
        "id" => $row['product_id'],
        "urun_ad" => $row['urun_ad'],
        "adet" => $row['adet']
    ];/*$row['urun_ad'] . " (" . $row['adet'] . ")";*/
}

// JSON çıktıyı döndür
echo json_encode($urunler);
?>