<!DOCTYPE html>
<html>
   
    
    <head>
    
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="ERGİN, ERGİNLER, YAPI">
        <meta name="author" content="Tuygun ERGİN">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title> Mezar Çalışmalarımız </title>
        <link rel="stylesheet" href="style3.css">
    <style>
        h1 {
            text-align: center;
            transform: translateY(3px);
            font-size: x-large;
            animation: slideLeftRight 2s infinite alternate ease-in-out;
        }
    @keyframes slideLeftRight {
    0% {
      transform: translateX(0px);
    }
    
    50% {
      transform: translateX(10px);
    }
    100% {
      transform: translateX(-5px);
    }
  }


    </style>
    
    </head>
    <body>
<?php
/*session_start();
echo "User ID: " . $_SESSION['user_id'];
*/?>
    <h1><i>EN ÇOK TERCİH EDİLENLER</i></h1>

<!--STAR GALAXY  MEZAR ÇALIŞMASI-->

    <hr class="çizgii">

    <div class="bolum1">
        <div class="paragraf">
        <img style="cursor:pointer;" src="star galaxy/star galaxy mezar.jpg" alt="Açıklayıcı Resim" onclick="openModal()">
        <p><i><b>Resme tıklayarak daha detaylı ve farklı</b></i></p>
        <p style="transform: translateY(-10px);"><i><b>çalışmalarımızdan fotoğrafları inceleyebilirsiniz.</b></i></p>
        <span style="position:absolute;font-size:medium;transform:translateY(-12px)"><b><i>Kullanılan Taş(lar).Büyütmek için tıklayınız.</i></b></span>
        <span class="animasyon-span"><b><i>20.000 TL'den başlayan fiyatlarla.</i></b></span>

         <div  style="position:relative;top:-70px;left:250px;z-index:360" class="urun" data-id="1" data-ad="Star-Galaxy-Mezar" data-fiyat="30000">
        <form class="sepet-formu" action="sepet3.php" method="post">
        <input type="hidden" name="product_id" value="1"> 
        <button class="sepetekle" style="cursor:pointer !important;" type="submit" >Sepete Ekle</button>
        </form>
        </div>


<div id="previewContainer"></div>

<script>
  const imageName = "star galaxy ana resim.jpg";// Hangi resmi API'den çekeceksin?

  fetch(`http://localhost/ERGİNLER%20YAPI%20WEB%20SİTESİ/api/anaresimgetir.php?name=${imageName}`)  // Kendi yoluna göre güncelle
    .then(response => response.json())
    .then(data => {
      if (data.imageUrl) {
        // Küçük resim gibi görünmesini sağla
        const preview = document.createElement("img");
        preview.src = data.imageUrl;
        preview.alt = "Resme tıkla";
        preview.style.width = "35px";
        preview.style.cursor = "pointer";
        preview.style.position = "absolute";
        preview.style.left= "20px";
        preview.style.top="485px ";

        // Tıklanınca büyük resmi göster
        preview.onclick = () => {
          window.open(data.imageUrl, "_blank");
        };

        document.getElementById("previewContainer").appendChild(preview);
      } 
    });
</script>

    </div>
        <div class="yazi1" style="position:relative">
            <h2><b>Star Galaxy Mezar Çalışmalarımız:</b></h2>
            <!--<h3 style=transform:translate(30px,30px)><b>Kullanılan Taş(lar)</b></h3>-->
            <p id="pp">Bu mezar çalışmaları,tamamı ile Star Galaxy taşından yapılmadır.</p>
                <p id="pp" >Taşdan söz edecek olursak, Star Galaxy diğer adı ile Hindistan saf siyah, granit sektöründe en çok tercih edilen ve bilinen granittir.</p>
               <p id="pp">  Gece gökyüzünü anımsatan dramatik bir etki veren, taşın derinliklerine gömülü altın ve bakır beneklere sahiptir. </p>
               <p id="pp"> !!Granit, aşınması zor ve dayanıklı bir taştır, bakımı kolaydır ve çeşitli kullanımlara uygundur.Mezar için çok idealdir,sadece su tutup temizlediğinizde eski haline anında gelecektir.!! </p>
               <p id="ppb" style=color:#0000c8> Yapmış olduğumuz mezarlar resimlerde de görüldüğü gibi,içine istenirse çita da konulabilir,içine mozaik de dökülebilir ve dahi birçok şey sizin tercihiniz doğrultusunda eklenebilir.Bunlar ek olarak ücretlendirilir.
                Ayrıca seçtiğiniz başlık ta önemli olmakla beraber siparişinize göre fiyat bilgisi verilmektedir. </p>
        </div>
    </div>
    <hr class="çizgi" style="transform: translateY(0px);margin-bottom:-15px !important;" >

<?php
include 'database/sepet_öğeleri/sepetgetir.php';

$urun_id = 1; // Burada görmek istediğin ürünün ID'sini değiştirerek farklı ürünleri sorgulayabilirsin

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

echo "<table border='1' style='transform:translate(650px,-65px)'>";
echo "<tr><th>Ürün Adı</th><th>Satış Miktarı (Son 1 Ay)</th></tr>";  

if ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['urun_ad']}</td><td style='text-align:center'>{$row['toplam_adet']}</td></tr>";
} else {
    echo "<tr><td colspan='2'>Bu ürün için son 1 ayda satış yok</td></tr>";
}

echo "</table>";
?>

   <div id="gallery" class="gallery" style="display: none;">
        <img src="star galaxy/star galaxy mezar.jpg" onclick="openModal(0)" alt="Resim 1">
        <img src="star galaxy/star galaxy mezar2.jpg" onclick="openModal(1)" alt="Resim 2">
        <img src="star galaxy/star galaxy mezar3.jpg" onclick="openModal(2)" alt="Resim 3">
        <img src="star galaxy/star galaxy mezar4.jpg" onclick="openModal(3)" alt="Resim 4">
        <img src="star galaxy/star galaxy mezar5.jpg" onclick="openModal(4)" alt="Resim 5">
        <img src="star galaxy/star galaxy mezar6.JPG" onclick="openModal(5)" alt="Resim 6">
        <img src="star galaxy/star galaxy mezar7.jpg" onclick="openModal(6)" alt="Resim 7">
        <img src="star galaxy/star galaxy mezar8.jpg" onclick="openModal(6)" alt="Resim 8">
      </div>

 <!-- Modal yapı -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <img id="modal-image" src="star galaxy/star galaxy mezar.jpg" alt="Büyük Resim">
      <div class="nav prev" onclick="changeSlide(-1)">&#10094;</div>
      <div class="nav next" onclick="changeSlide(1)">&#10095;</div>
    </div>
  </div>
  <script>
     const images = ["star galaxy/star galaxy mezar.jpg","star galaxy/star galaxy mezar2.jpg","star galaxy/star galaxy mezar3.jpg", "star galaxy/star galaxy mezar4.jpg","star galaxy/star galaxy mezar5.jpg","star galaxy/star galaxy mezar6.JPG","star galaxy/star galaxy mezar7.jpg","star galaxy/star galaxy mezar8.jpg"];
     let currentIndex = 0;

    function openModal() 
    {
      document.getElementById("myModal").style.display = "flex";
    }

    function closeModal() 
    {
      document.getElementById("myModal").style.display = "none";
    }
    function changeSlide(direction) {
      currentIndex = (currentIndex + direction + images.length) % images.length;
      updateImage();
    }
  
    function updateImage() {
      document.getElementById("modal-image").src = images[currentIndex];
    }
    </script>


<!-- HACK BLACK MEZAR ÇALIŞMASI-->
<?php include 'database/modalandgallerysistemi/modal getir.php';?>

<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id=1;
$ad='Hack Black';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-170', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '2', $content);
$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{topa}}', '40', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '115', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{title}}', 'Hack Black Mezar Çalışmalarımız', $content);
$content = str_replace('{{küçükresim1}}', '"hack black granit ana resim.jpg"', $content);
$content = str_replace('{{küçükresim2}}', '', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{paragraph1}}', 'Bu tezgah çalışmaları,tamamı ile Hack Black taşından yapılmadır.', $content);
$content = str_replace('{{paragraph2}}', 'Taşdan söz edecek olursak, "Hack Black" granit sektöründe mezar,tezgah,döşeme ve dahi bir çok alanda tercih edilen bir granittir.', $content);
$content = str_replace('{{paragraph3}}', ' Suya ve neme karşı tam koruma sağlayan yapısı sayesinde mezar yapımı için daha çok üst küpeşte veya istenirse mezarın komplesi için uygulanır.Müşterilerimiz çoğunluklan son zamanlarda tercih ettiği granitlerin başında gelmektedir.', $content);
$content = str_replace('{{paragraph4}}', '!!Granit, aşınması zor ve dayanıklı bir taştır, bakımı kolaydır ve çeşitli kullanımlara uygundur.Mezar için çok idealdir,sadece su tutup temizlediğinizde
 eski haline anında gelecektir.!!', $content);
 $content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);
 $content = str_replace('<p id="pp">{{paragraph5}}</p>', '<p id="ppb" style=color:#0000c8>{{paragraph5}}</p>', $content);
 $content = str_replace('{{paragraph5}}', 'Yapmış olduğumuz mezarlar resimlerde de görüldüğü gibi,içine istenirse çita da konulabilir,içine mozaik de dökülebilir ve dahi birçok şey sizin tercihiniz doğrultusunda eklenebilir.Bunlar ek olarak ücretlendirilir.
                Ayrıca seçtiğiniz başlık ta önemli olmakla beraber siparişinize göre fiyat bilgisi verilmektedir.', $content);



$content = str_replace('{{ilkresim}}', 'hack black/hack black mezar1.jpg', $content);
$content = str_replace('{{ilkacıklama}}', 'Hack black mezar resmi.', $content);
$content = str_replace('{{basresim}}', 'hack black/hack black mezar1.jpg', $content);
$content = str_replace('{{basacıklama}}', 'Hack black mezar gösterim resmi.', $content);


$galleryImages = [
  "hack black/hack black mezar1.jpg",
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {
  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";
}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', '"hack black/hack black mezar1.jpg"', $content);
echo $content; 

?>

<?php
$custom_class = "satis-konum-2";
$urun_id = 2;
include 'aylik_satis.php';
?>

<!--Küpeşte Star Galaxy,Gövde Marmara Olan Mezar Çalışması -->
<?php include 'database/modalandgallerysistemi/modal getir.php';?>



<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id = 2; // Bu kullanımda 1, başka kullanımda 2, sonra 3 vs...
$ad='Küpeşte Star Galaxy,Gövde Marmara Olan Mezar';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-180', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '3', $content);

$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{title}}', 'Küpeşte Star Galaxy,Gövde Marmara Taşı Olan Mezar Çalışmalarımız', $content);
$content = str_replace('{{topa}}', '70', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '115', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"marmara mermer ana resim.jpg"', $content);
$content = str_replace('{{küçükresim2}}', '"star galaxy ana resim.jpg"', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{paragraph1}}','Bu tezgah çalışmaları,tamamı ile Porselen taşlarından yapılmadır.', $content);
$content = str_replace('{{paragraph2}}','"Porselen", kırılgan olmayışı,ısıya dayanıklı,çizilmez ve leke tutmuyo(gözeneksiz yapıları sayesinde) oluşuyla ön plana çıkar.', $content);
$content = str_replace('{{paragraph3}}',' Çoğu taştan ayıran özellikleri sayesinde mutfak ve banyo tezgahlarında,dış mekan çalışmalarında çokca tercih edilir.', $content);
$content = str_replace('{{paragraph4}}','Porselen, kolay temizlenebilir ve hijyeniktir ayrıca modern bir görüntü sunar, giderek popüler hale gelmiştir.', $content);
$content = str_replace('<p id="pp">{{paragraph5}}</p>', '<p id="ppb" style=color:#734a12>{{paragraph5}}</p>', $content);
$content = str_replace('{{paragraph5}}', 'Mezarların üst küpeştesinin çoğunlukla kirli kalmasından dolayı ve bu kirin mermerin bir süre sonra içine işleyeceğinden, silinmesinin
çok güç olmasından dolayı, müşterilerimiz çoğunlukla üst küpeşteye granit, gövdeye de mermer yaptırmayı daha münasip görmektedir.', $content);
$content = str_replace('<p id="pp">{{paragraph6}}</p>', '<p id="ppb" style=color:#0000c8;transform:translate(-10px,-45px)>{{paragraph6}}</p>', $content);
$content = str_replace('{{paragraph6}}', 'Yapmış olduğumuz mezarlar resimlerde de görüldüğü gibi,içine istenirse çita da konulabilir,içine mozaik de dökülebilir ve dahi birçok şey sizin tercihiniz doğrultusunda eklenebilir.Bunlar ek olarak ücretlendirilir.
                Ayrıca seçtiğiniz başlık ta önemli olmakla beraber siparişinize göre fiyat bilgisi verilmektedir.', $content);
$content = str_replace('{{ilkresim}}', 'galaxy marmara/galaxy marmara1.jpg', $content);
$content = str_replace('{{ilkacıklama}}','küpeşte star galaxy gövde marmara mezar resmi.', $content);
$content = str_replace('{{basresim}}', 'galaxy marmara/galaxy marmara1.jpg', $content);
$content = str_replace('{{basacıklama}}','küpeşte star galaxy gövde marmara mezar gösterim resmi.', $content);


$galleryImages = [
  "galaxy marmara/galaxy marmara1.jpg",
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {
  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";
}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', '"galaxy marmara/galaxy marmara1.jpg"', $content);
echo $content; 

?>
  <?php
  $custom_class = "satis-konum-3";
  $urun_id = 3;
  include 'aylik_satis.php';
  ?>

<!--Küpeşte Star Galaxy,Gövde Afyon Bal Olan Mezar Çalışmaları-->
<?php include 'database/modalandgallerysistemi/modal getir.php';?>




<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id = 3; // Bu kullanımda 1, başka kullanımda 2, sonra 3 vs...
$ad='Küpeşte Star Galaxy,Gövde Afyon Olan Mezar';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-200', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '4', $content);

$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{title}}', 'Küpeşte Star Galaxy,Gövde Afyon Bal Olan Mezar Çalışmalarımız', $content);
$content = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content);
$content = str_replace('{{topa}}', '70', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '115', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"afyon mermer ana resim.jpg"', $content);
$content = str_replace('{{küçükresim2}}', '"star galaxy ana resim.jpg"', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{paragraph1}}', 'Bu mezar çalışmalarında,üst küpeşte taşı olarak "Star Galaxy" Graniti,gövde taşı olarak "Afyon" Mermeri kullanılmıştır. ', $content);
$content = str_replace('<p id="pp">{{paragraph4}}</p>', '', $content);
$content = str_replace('<p id="pp">{{paragraph5}}</p>', '<p id="ppb" style=color:#734a12>{{paragraph5}}</p>', $content);
$content = str_replace('{{paragraph5}}', 'Mezarların üst küpeştesinin çoğunlukla kirli kalmasından dolayı ve bu kirin mermerin bir süre sonra içine işleyeceğinden, silinmesinin
çok güç olmasından dolayı, müşterilerimiz çoğunlukla üst küpeşteye granit, gövdeye de mermer yaptırmayı daha münasip görmektedir.', $content);
$content = str_replace('{{paragraph2}}', 'Afyon mermeri,fazlaca çeşite sahip bir mermer olup,Türkiye blok mermerlerin yaklaşık üçte ikisinin çıkarıldığı yer olan Afyon’da bulunan ocaklarımızdan  çıkarılmaktadır.', $content);
$content = str_replace('{{paragraph3}}', 'Tüm iç ve dış mekanlarda kullanılmaya elverişli olup ekstra güzellik ve benzersizlik katar', $content);
$content = str_replace('<p id="pp">{{paragraph6}}</p>', '<p id="ppb" style=color:#0000c8;transform:translate(-10px,-45px)>{{paragraph6}}</p>', $content);
 $content = str_replace('{{paragraph6}}', 'Yapmış olduğumuz mezarlar resimlerde de görüldüğü gibi,içine istenirse çita da konulabilir,içine mozaik de dökülebilir ve dahi birçok şey sizin tercihiniz doğrultusunda eklenebilir.Bunlar ek olarak ücretlendirilir.
                Ayrıca seçtiğiniz başlık ta önemli olmakla beraber siparişinize göre fiyat bilgisi verilmektedir.', $content);
$content = str_replace('{{ilkresim}}', 'galaxy afyon/galaxy afyon.JPG', $content);
$content = str_replace('{{ilkacıklama}}', 'küpeşte star galaxy,gövde afyon mezar resmi.', $content);
$content = str_replace('{{basresim}}', 'galaxy afyon/galaxy afyon.JPG', $content);
$content = str_replace('{{basacıklama}}', 'küpeşte star galaxy,gövde afyon mezar gösterim resmi.', $content);




$galleryImages = [

  "galaxy afyon/galaxy afyon.JPG"
  
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {

  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";

}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', '"galaxy afyon/galaxy afyon.JPG"', $content);
echo $content; 

?>
  <?php
  $custom_class = "satis-konum-4";
  $urun_id = 4;
  include 'aylik_satis.php';
  ?>

<!--Küpeşte Star Galaxy,Gövde Afyon Beyaz Olan Mezar Çalışmaları-->
<?php include 'database/modalandgallerysistemi/modal getir.php';?>



<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id = 4; // Bu kullanımda 1, başka kullanımda 2, sonra 3 vs...
$ad='Küpeşte Star Galaxy,Gövde Afyon Beyaz Olan Mezar';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-225', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '5', $content);
/*$content = str_replace('{{sayfaadi}}', 'index2.php', $content);*/
$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{title}}', 'Küpeşte Star Galaxy,Gövde Afyon Beyaz Olan Mezar Çalışmalarımız', $content);
$content = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content);
$content = str_replace('{{topa}}', '70', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '115', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"star galaxy ana resim.jpg"', $content);
$content = str_replace('{{küçükresim2}}', '"afyon beyaz ana resim.jpg"', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{paragraph1}}', 'Bu mezar çalışmalarında,üst küpeşte taşı olarak "Star Galaxy" Graniti,gövde taşı olarak "Afyon Beyaz" Mermeri kullanılmıştır. ', $content);
$content = str_replace('{{paragraph4}}', 'Pek çok insan mezar yapımında üst küpeşte olarak granit,gövde olarak mermer kullanılmasını ister.', $content);
$content = str_replace('<p id="pp">{{paragraph5}}</p>', '<p id="ppb"style=color:#734a12>{{paragraph5}}</p>', $content);
$content = str_replace('{{paragraph5}}', 'Mezarların üst küpeştesinin çoğunlukla kirli kalmasından dolayı ve bu kirin mermerin bir süre sonra içine işleyeceğinden, silinmesinin
çok güç olmasından dolayı, müşterilerimiz çoğunlukla üst küpeşteye granit, gövdeye de mermer yaptırmayı daha münasip görmektedir.', $content);
$content = str_replace('{{paragraph2}}', 'Afyon Beyazı, Türkiye’de çıkarılan rekristalize karbonat minerallerinden oluşan, açık gri gölgeli yapraksız metamorfik kayadır.', $content);
$content = str_replace('{{paragraph3}}', 'Tezgah üstü, mozaik, duvar kaplama, döşeme, lavabo, merdiven, denizlik, koping, desen vb. projeler için tercih edilmektedir.', $content);
$content = str_replace('<p id="pp">{{paragraph6}}</p>', '<p id="ppb" style=color:#0000c8;transform:translate(-10px,-45px)>{{paragraph6}}</p>', $content);
 $content = str_replace('{{paragraph6}}', 'Yapmış olduğumuz mezarlar resimlerde de görüldüğü gibi,içine istenirse çita da konulabilir,içine mozaik de dökülebilir ve dahi birçok şey sizin tercihiniz doğrultusunda eklenebilir.Bunlar ek olarak ücretlendirilir.
                Ayrıca seçtiğiniz başlık ta önemli olmakla beraber siparişinize göre fiyat bilgisi verilmektedir.', $content);
$content = str_replace('{{ilkresim}}', 'galaxy muğla/galaxy muğla1.jpg', $content);
$content = str_replace('{{ilkacıklama}}', 'küpeşte star galaxy,gövde afyon mezar resmi.', $content);
$content = str_replace('{{basresim}}', 'galaxy muğla/galaxy muğla1.jpg', $content);
$content = str_replace('{{basacıklama}}', 'küpeşte star galaxy,gövde afyon mezar gösterim resmi.', $content);




$galleryImages = [

  "galaxy muğla/galaxy muğla1.jpg"
  
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {

  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";

}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', '"galaxy muğla/galaxy muğla1.jpg"', $content);
echo $content; 
?>

  <?php
  $custom_class = "satis-konum-5";
  $urun_id = 5;
  include 'aylik_satis.php';
  ?>


<div id="sepet-simge" style="position: fixed; top: 20px; right: 20px; cursor: pointer;z-index:361">
  🛒 <span id="sepet-adet">0</span>
  <div id="sepet-popup" style="display: none; background: yellow; border: 2px solid #ccc; padding: 20px; position: absolute; top: 25px; right: 0;height:450px;z-index:600;text-align:left;">

    <ul style="display: flex;flex-wrap: wrap;gap: 2px;width:100px;height:100px;z-index:500;text-align:left;padding-left:0px;margin-right:40px;list-style-position: inside;" id="sepet-listesi"></ul>
    <a href="sepetekranı.php" style="border-style=inset;position: absolute;top:450px">Sepete Git</a>
  </div>
</div>
<a href="cikis_yap.php" style="position: fixed; top: 48px; right: 20px; cursor: pointer;z-index:290;color:red; font-weight:bold;">Çıkış Yap</a>



<script>
// Sepeti güncelleyen fonksiyon
function sepetiGuncelle() {
  fetch("sepet2.php")
    .then(response => response.json())
    .then(data => {
      const sepetListesi = document.getElementById("sepet-listesi");
      const sepetAdet = document.getElementById("sepet-adet");

      // Önce listeyi temizle
      sepetListesi.innerHTML = "";

      if (data.length === 0) {
        sepetListesi.innerHTML = "<li>Sepet boş</li>";
      } else {
        data.forEach(urun => {
          const li = document.createElement("li");
          li.textContent = /*urun*/`${urun.urun_ad} (${urun.adet})`;
          li.style.padding = "2px 4px";
          li.style.fontSize = "14px";


           // Sil butonu
           const silBtn = document.createElement("button");
           silBtn.textContent = "❌";
           silBtn.style.border = "none";
          silBtn.style.background = "transparent";
          silBtn.style.cursor = "pointer";
          silBtn.style.color = "red";
          silBtn.title = "Sepetten sil";

            silBtn.addEventListener("click", () => {
            const formData = new FormData();
             formData.append("product_id", urun.id);

           fetch("sepet_sil.php", {
           method: "POST",
           body: formData
            })
            .then(res => res.text())
            .then(cevap => {
           if (cevap.trim() === "ok") {
           sepetiGuncelle(); // Arayüzü güncelle
           }
            });
  });

  li.appendChild(silBtn);
  sepetListesi.appendChild(li);
        });
      }

      // Adet bilgisini güncelle
      sepetAdet.textContent = data.length;
    });
}

// Sayfa yüklendiğinde formları dinle
document.addEventListener("DOMContentLoaded", () => {
  // Tüm sepete ekle formlarını seç
  document.querySelectorAll(".sepet-formu").forEach(form => {
    form.addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(form);

      fetch("sepet3.php", {
        method: "POST",
        body: formData
      })
      .then(res => res.text())
      .then(cevap => {
        if (cevap.trim() === "ok") {
          sepetiGuncelle(); // Güncelleme yap
        }
      });
    });
  });

  // Sepet simgesi üzerine gelince popup'ı göster ve güncelle
  const sepetSimge = document.getElementById("sepet-simge");
  const sepetPopup = document.getElementById("sepet-popup");

  sepetSimge.addEventListener("mouseenter", () => {
    sepetPopup.style.display = "block";
    sepetiGuncelle();
  });

  sepetSimge.addEventListener("mouseleave", () => {
    sepetPopup.style.display = "none";
  });

  // Sayfa açıldığında bir kez güncelle
  sepetiGuncelle();
});
</script>

</body>

</html>