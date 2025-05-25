<?php
session_start();
$baglanti = new mysqli("localhost", "root", "", "erginler");

// Güvenlik kontrolü: sadece admin girebilir
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: index1.php");
    exit();
}

// Kullanıcı onaylama işlemi
if (isset($_GET['onayla'])) {
    $kullanici_id = intval($_GET['onayla']);
    $guncelle = $baglanti->prepare("UPDATE kaydol_ekranı SET onay = 1 WHERE id = ?");
    $guncelle->bind_param("i", $kullanici_id);
    $guncelle->execute();
    header("Location: admin.php"); // sayfayı yenile
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Paneli</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        h2 { color: #333; }
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a.onayla { color: green; font-weight: bold; text-decoration: none; }
    </style>
</head>
<body>

<h2>Onay Bekleyen Kullanıcılar</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>İşlem</th>
    </tr>

    <?php
    // Onay bekleyenleri getir
    $sonuc = $baglanti->query("SELECT id, email FROM kaydol_ekranı WHERE onay = 0 AND adminmi = 0");
    if ($sonuc->num_rows > 0) {
        while ($row = $sonuc->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><a class='onayla' href='admin.php?onayla=" . $row['id'] . "'>✅ Onayla</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Onay bekleyen kullanıcı yok.</td></tr>";
    }
    ?>
</table>

<br>
<a href="index1.php">Çıkış Yap</a>

</body>
</html>