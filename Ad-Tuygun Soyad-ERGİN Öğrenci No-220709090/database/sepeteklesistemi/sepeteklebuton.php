<?php
$pdo = new PDO("mysql:host=localhost;dbname=erginler;charset=utf8", "root", "");
$stmt= $pdo->prepare("SELECT content FROM sepet_ekrani WHERE title = ?");
$stmt->execute(["sepet_buton"]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$content1 = $row ? $row['content'] : '';
?>