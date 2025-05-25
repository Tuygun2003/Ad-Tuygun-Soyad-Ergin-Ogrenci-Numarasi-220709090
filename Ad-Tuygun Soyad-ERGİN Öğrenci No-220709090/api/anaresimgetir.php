
<?php
header('Content-Type: application/json');

$allowedImages = ['afyon mermer ana resim.jpg','hack black granit ana resim.jpg', 'muğla mermer ana resim.jpg', 'star galaxy ana resim.jpg','marmara mermer ana resim.jpg','mısır taş ana resim.jpg','bursa siyahı ana resim.jpg','bej1 ana resim.JPG','bej2 ana resim.jpg','afyon beyaz ana resim.jpg','lamar_marquani porselen.JPG','lamar_statuario_pearl porselen resmi.jpg'];

if (isset($_GET['name']) && in_array($_GET['name'], $allowedImages)) {
    $imageName = $_GET['name'];
    $imageUrl = 'http://localhost/ERGİNLER%20YAPI%20WEB%20SİTESİ/ana resimler/' . $imageName;
    echo json_encode(['imageUrl' => $imageUrl]);
} else {
    echo json_encode(['error' => 'Geçersiz resim adı']);
}