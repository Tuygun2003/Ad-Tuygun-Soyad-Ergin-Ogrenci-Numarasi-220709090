<?php
include 'database/sepet_öğeleri/sepetgetir.php';

if (!isset($urun_id)) {
    echo "Ürün ID belirtilmemiş.";
    return;
} 

$sql = "SELECT u.urun_ad, SUM(s.adet) AS toplam_adet
        FROM satin_alinanlar s
        JOIN urunler u ON s.urun_id = u.id
        WHERE s.satin_alis_tarihi >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
        AND s.urun_id = ?
        GROUP BY s.urun_id";

$stmt = $baglanti->prepare($sql);
$stmt->bind_param("i", $urun_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<div class='$custom_class'>";
echo "<table border='1' style='transform:translate(660px,-115px)'>";
echo "<tr><th>Ürün Adı</th><th>Satış Miktarı (Son 1 Ay)</th></tr>";  

if ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['urun_ad']}</td><td style='text-align:center'>{$row['toplam_adet']}</td></tr>";
} else {
    echo "<tr><td colspan='2'>Bu ürün için son 1 ayda satış yok</td></tr>";
}

echo "</table>";
echo "</div>";
