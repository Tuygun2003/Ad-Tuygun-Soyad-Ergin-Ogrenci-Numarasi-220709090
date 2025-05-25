<?php
session_start(); // Oturumu başlat
 // bağlantı dosyanı dahil et
include 'database/sepet_öğeleri/sepetgetir.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $baglanti->query("UPDATE kaydol_ekranı SET ilk_cikis = 1 WHERE id = $user_id");
}
session_unset(); // Tüm oturum değişkenlerini sil
session_destroy(); // Oturumu tamamen sonlandır

// Ana sayfaya veya giriş sayfasına yönlendir
header("Location: index1.php"); 
exit;
?>