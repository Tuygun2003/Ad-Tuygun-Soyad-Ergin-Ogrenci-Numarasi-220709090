<?php
session_start();
include 'database/sepet_öğeleri/sepetgetir.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['toplam' => 0]);
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT u.fiyat, s.adet
        FROM sepet_ogeleri s
        JOIN urunler u ON s.product_id = u.id
        WHERE s.user_id = ?";
$stmt = $baglanti->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$toplam = 0;
while($row = $result->fetch_assoc()) {
    $toplam += $row['fiyat'] * $row['adet'];
}

echo json_encode(['toplam' => $toplam]);
?>