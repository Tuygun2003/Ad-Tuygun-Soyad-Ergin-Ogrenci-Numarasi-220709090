<?php
session_start();
$baglanti = new mysqli("localhost", "root", "", "erginler");
if ($baglanti->connect_error) {
    die(json_encode(["durum" => "hata", "mesaj" => "Veritabanı bağlantı hatası."]));
}

$user_id = $_SESSION['user_id'];

// Önce kullanıcının sepetini al
$sql = "SELECT product_id, adet FROM sepet_ogeleri WHERE user_id = ?";
$stmt = $baglanti->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$urunler = [];
while ($row = $result->fetch_assoc()) {
    $urunler[] = $row;
}

// Sepet boşsa işlem yapma
if (count($urunler) === 0) {
    echo json_encode(["durum" => "hata", "mesaj" => "Sepet boş."]);
    exit();
}

// Satin alinanlara kayıt et
$ekle = $baglanti->prepare("INSERT INTO satin_alinanlar (user_id, urun_id, adet) VALUES (?, ?, ?)");
foreach ($urunler as $urun) {
    $ekle->bind_param("iii", $user_id, $urun['product_id'], $urun['adet']);
    $ekle->execute();
}

// Sepeti temizle
$sil = $baglanti->prepare("DELETE FROM sepet_ogeleri WHERE user_id = ?");
$sil->bind_param("i", $user_id);
$sil->execute();

echo json_encode(["durum" => "ok", "mesaj" => "Ödeme başarıyla yapıldı.Sepet boşaltıldı"]);
?>
