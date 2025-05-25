<?php
session_start();
include 'database/sepet_öğeleri/sepetgetir.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index1.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yeni_sifre = password_hash($_POST['yeni_sifre'], PASSWORD_DEFAULT);
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE kaydol_ekranı SET sifre = ?,sifre_guncellendi_mi = 1 WHERE id = ?";
    $stmt = $baglanti->prepare($sql);
    $stmt->bind_param("si", $yeni_sifre, $user_id);
    $stmt->execute();

    header("Location: index1.php?durum=sifre_degisti");
    exit();
}
?>
<div class="modal" id="kaydolModal" style="display:block;">
  <button class="kapat2" onclick="modal4Kapat()">&times;</button>
  <div style="width:350px" class="modal-icerik">
    <h3>Şifrenizi Güncelleyin</h3>
    <form method="POST" >
      <input style="width:250px;height:20px;transform:translateY(5px)" type="password" name="yeni_sifre" placeholder="Yeni Şifre" required><br>
      <button style="transform:translateY(8px)" type="submit" name="kaydol">Şifreyi Güncelle</button>
    </form>
  </div>
</div>
<script>
  function modal4Kapat() {
    window.location.href = "index1.php";
  }
</script>


