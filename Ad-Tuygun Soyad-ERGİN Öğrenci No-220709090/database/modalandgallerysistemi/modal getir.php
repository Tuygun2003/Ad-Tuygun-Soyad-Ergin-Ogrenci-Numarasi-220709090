
<?php
$pdo = new PDO("mysql:host=localhost;dbname=erginler;charset=utf8", "root", "");
$stmt = $pdo->prepare("SELECT content FROM erginlertablo WHERE title = ?");
$stmt->execute(["modalAndGalleryTemplate"]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$content = $row ? $row['content'] : '';
?>
