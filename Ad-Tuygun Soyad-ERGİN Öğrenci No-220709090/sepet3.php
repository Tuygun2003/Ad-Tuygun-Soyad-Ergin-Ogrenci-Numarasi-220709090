<?php
session_start();
include 'database/sepet_öğeleri/sepetgetir.php';

$user_id = $_SESSION['user_id']; // Giriş yapmış kullanıcı
$product_id = $_POST['product_id']; // Ürün ID (gelen formdan)

// Aynı ürün sepette varsa adet artır
$sql_check = "SELECT * FROM sepet_ogeleri WHERE user_id = ? AND product_id = ?";
$stmt = $baglanti->prepare($sql_check);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // varsa adet +1 yap
    $sql_update = "UPDATE sepet_ogeleri SET adet = adet + 1 WHERE user_id = ? AND product_id = ?";
    $stmt = $baglanti->prepare($sql_update);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
} else {
    // yoksa yeni satır ekle
    $sql_insert = "INSERT INTO sepet_ogeleri (user_id, product_id, adet) VALUES (?, ?, 1)";
    $stmt = $baglanti->prepare($sql_insert);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
}
/*echo "ok";*/
/*echo "Ürün sepete eklendi.";*/
?>