<div id="urun-listesi">
<?php
session_start();
include 'database/sepet_öğeleri/sepetgetir.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT u.urun_ad, u.fiyat, s.adet
        FROM sepet_ogeleri s
        JOIN urunler u ON s.product_id = u.id
        WHERE s.user_id = ?";
$stmt = $baglanti->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {
    echo $row['urun_ad'] . " - " . $row['adet'] . " adet - " . ($row['fiyat'] * $row['adet']) . " TL<br>";
}
?>
</div>
<button onclick="toplamiHesapla()">Toplam Fiyatı Göster</button>



<p id="toplam-fiyat"></p>
<button onclick="odemeYap()">Ödeme Yap</button>

<!-- Ödeme Sonucu -->
<p id="odeme-sonuc" style="font-weight: bold; color: green;"></p>


<script>
function toplamiHesapla() {
  fetch('sepet_toplam.php')
    .then(res => res.json())
    .then(data => {
      document.getElementById('toplam-fiyat').innerText = "Toplam: " + data.toplam + " TL";
    });
}
</script>
<script>
function odemeYap() {
  fetch('odeme_yap.php', {
    method: 'POST'
  })
  .then(res => res.json())
  .then(data => {
    const sonucAlani = document.getElementById("odeme-sonuc");
    sonucAlani.innerText = data.mesaj;

    if (data.durum === "ok") {
      // Sepeti ve toplam fiyatı sıfırla
      document.getElementById("sepet-listesi").innerHTML = "<li>Sepet boş</li>";
      document.getElementById("sepet-adet").innerText = "0";
      document.getElementById("toplam-fiyat").innerText = "Toplam: 0 TL";
    }
  });
}
</script>