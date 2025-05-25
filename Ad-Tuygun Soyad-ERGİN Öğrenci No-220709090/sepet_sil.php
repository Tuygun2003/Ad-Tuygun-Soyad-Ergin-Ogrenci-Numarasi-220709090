<?php
session_start();
include 'database/sepet_öğeleri/sepetgetir.php';

if (!isset($_SESSION['user_id']) || !isset($_POST['product_id'])) {
    echo "hata";
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// Önce mevcut adeti kontrol et
$sql = "SELECT adet FROM sepet_ogeleri WHERE user_id = ? AND product_id = ?";
$stmt = $baglanti->prepare($sql);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $adet = $row['adet'];

    if ($adet > 1) {
        // Adeti 1 azalt
        $sql = "UPDATE sepet_ogeleri SET adet = adet - 1 WHERE user_id = ? AND product_id = ?";
        $stmt = $baglanti->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
        echo "ok";
    } else {
        // Adet 1 ise tamamen sil
        $sql = "DELETE FROM sepet_ogeleri WHERE user_id = ? AND product_id = ?";
        $stmt = $baglanti->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
        echo "ok";
    }
} else {
    echo "Ürün bulunamadı.";
}
?>