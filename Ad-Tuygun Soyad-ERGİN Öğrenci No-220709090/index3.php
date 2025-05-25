<!DOCTYPE html>
<html>


<head>

    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="ERGİN, ERGİNLER, YAPI">
    <meta name="author" content="Tuygun ERGİN">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Mutfak Tezgahı Çalışmalarımız </title>
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

    <h1><i>EN ÇOK TERCİH EDİLENLER</i></h1>

<!--STAR GALAXY ÇALIŞMASI-->

    <hr class="çizgii">

    <div class="bolum1">
        <div class="paragraf">
        <img style="cursor:pointer;" src="star galaxy/star galaxy.jpg" alt="Açıklayıcı Resim" onclick="openModal()">
        <p><i><b>Resme tıklayarak daha detaylı ve farklı</b></i></p>
        <p style="transform: translateY(-10px);"><i><b>çalışmalarımızdan fotoğrafları inceleyebilirsiniz.</b></i></p>
        <span style="font-size:medium"><b><i>Kullanılan Taş(lar).Büyütmek için tıklayınız</i></b></span>
        <span class="animasyon-span" style="left:150px;top:430px !important;" ><b><i>20.000 TL'den başlayan fiyatlarla.</i></b></span>
        
        <div style="z-index:360" class="urun" data-id="1" data-ad="Star-Galaxy Tezgah" data-fiyat="20000">
         <form class="sepet-formu" action="sepet3.php" method="post"> 
          <input type="hidden" name="product_id" value="6">
        <button class="sepetekle" style=" top:437px; left:450px !important;" type="submit" >Sepete Ekle</button>
        </form>
        </div>

<div id="previewContainer"></div>

<script>
  const imageName = "star galaxy ana resim.jpg"; // Hangi resmi API'den çekeceksin?

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

        // Tıklanınca büyük resmi göster
        preview.onclick = () => {
          window.open(data.imageUrl, "_blank");
        };

        document.getElementById("previewContainer").appendChild(preview);
      } 
    });
</script>
    </div>
        <div class="yazi1">
            <h2><b>Star Galaxy Tezgah Çalışmalarımız:</b></h2>
            <p id="pp">Bu tezgah çalışmaları,tamamı ile Star Galaxy taşından yapılmadır.</p>
                <p id="pp" >Taşdan söz edecek olursak, Star Galaxy diğer adı ile Hindistan saf siyah, granit sektöründe en çok tercih edilen ve bilinen granittir.</p>
               <p id="pp"> Renk tonu itibarı ile mutfak dolablarında kullanılır ve müşterilerimiz tarafından çokca tercih edilir. </p>
               <p id="pp">  Gece gökyüzünü anımsatan dramatik bir etki veren, taşın derinliklerine gömülü altın ve bakır beneklere sahiptir. </p>
               <p id="pp"> !!Granit aşınması zor ve dayanıklı bir taştır, bakımı kolaydır ve çeşitli kullanımlara uygundur.!! </p>

        </div>
    </div>
    <hr class="çizgi" style="transform: translateY(-20px);margin-bottom:-15px !important;">
<?php
include 'database/sepet_öğeleri/sepetgetir.php';

$urun_id = 6; // Burada görmek istediğin ürünün ID'sini değiştirerek farklı ürünleri sorgulayabilirsin

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

echo "<table border='1' style='transform:translate(650px,-75px)'>";
echo "<tr><th>Ürün Adı</th><th>Satış Miktarı (Son 1 Ay)</th></tr>";  

if ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['urun_ad']}</td><td style='text-align:center'>{$row['toplam_adet']}</td></tr>";
} else {
    echo "<tr><td colspan='2'>Bu ürün için son 1 ayda satış yok</td></tr>";
}

echo "</table>";
?>

   <div id="gallery" class="gallery" style="display: none;">
        <img src="star galaxy/star galaxy2.jpg" onclick="openModal(1)" alt="Resim 2">
        <img src="star galaxy/star galaxy3.jpg" onclick="openModal(2)" alt="Resim 3">
        <img src="star galaxy/star galaxy4.jpg" onclick="openModal(3)" alt="Resim 4">
        <img src="star galaxy/star galaxy5.jpg" onclick="openModal(4)" alt="Resim 5">

      </div>

 <!-- Modal yapı -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <img id="modal-image" src="star galaxy/star galaxy.jpg" alt="Büyük Resim">
      <div class="nav prev" onclick="changeSlide(-1)">&#10094;</div>
      <div class="nav next" onclick="changeSlide(1)">&#10095;</div>
    </div>
  </div>
  <script>
     const images = ["star galaxy/star galaxy.jpg","star galaxy/star galaxy2.jpg","star galaxy/star galaxy3.jpg", "star galaxy/star galaxy4.jpg","star galaxy/star galaxy5.jpg"];
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


<!-- MISIR TAŞI ÇALIŞMASI-->

<?php  include 'database/modalandgallerysistemi/modal getir.php';?>


<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id=1;
$ad='Mısır Taşı Tezgah';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-137', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '7', $content);
$content = str_replace('{{sayfaadi}}', 'index3.php', $content);
$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{title}}', 'Mısır Taşı Tezgah Çalışmalarımız', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{topa}}', '30', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '75', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"mısır taş ana resim.jpg"', $content);
$content = str_replace('{{küçükresim2}}', '""', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{paragraph1}}', 'Bu tezgah çalışmaları,tamamı ile Mısır taşından yapılmadır.', $content);
$content = str_replace('{{paragraph2}}', 'Taşdan söz edecek olursak, Mısır Taşı granit sektöründe daha çok banyolarda tercih edilen ve bilinen granittir.', $content);
$content = str_replace('{{paragraph3}}', ' Suya ve neme karşı dayanıklı yapısı sayesinde banyo tezgahlarında,duş alanlarında kullanılır ve müşterilerimiz tarafından çokca tercih edilir.', $content);
$content = str_replace('{{paragraph4}}', 'Kolay temizlenebilir yüzeyi sayesinde banyolarda modern bir görüntü sunar.', $content);
$content = str_replace('{{paragraph5}}', '!!Granit, aşınması zor ve dayanıklı bir taştır, bakımı kolaydır ve çeşitli kullanımlara uygundur.!!', $content);
$content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);
$content = str_replace('{{ilkresim}}', 'mısır taşı/mısır taşı1.jpg', $content);
$content = str_replace('{{ilkacıklama}}', 'Mısır taşı resmi.', $content);
$content = str_replace('{{basresim}}', 'mısır taşı/mısır taşı1.jpg', $content);
$content = str_replace('{{basacıklama}}', 'Mısır taşı gösterim resmi.', $content);




$galleryImages = [
  "mısır taşı/mısır taşı1.jpg",
  "mısır taşı/mısır taşı2.jpg",
  "mısır taşı/mısır taşı3.jpg",
  "mısır taşı/mısır taşı4.jpg"
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {
  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";
}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', '"mısır taşı/mısır taşı1.jpg","mısır taşı/mısır taşı2.jpg","mısır taşı/mısır taşı3.jpg", "mısır taşı/mısır taşı4.jpg"', $content);
echo $content; 

?>
<?php
$custom_class = "satis-konum-6";
$urun_id = 7; // Örnek: Hack Black ürünü
include 'aylik_satis.php';
?>
<!--Porselen Taşı Çalışması -->

<?php include 'database/modalandgallerysistemi/modal getir.php';?>


<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id = 2; // Bu kullanımda 1, başka kullanımda 2, sonra 3 vs...
$ad='Porselen Tezgah';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-135', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '8', $content);
$content = str_replace('{{sayfaadi}}', 'index3.php', $content);
$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{title}}', 'Porselen Tezgah Çalışmalarımız', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{topa}}', '30', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '75', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"lamar_marquani porselen.JPG"', $content);
$content = str_replace('{{küçükresim2}}', '"lamar_statuario_pearl porselen resmi.jpg"', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', '"https://drive.google.com/file/d/1djXmGLQFKipZI7go8L6xnlBkHtMT7QOf/view?usp=sharing"', $content);
$content = str_replace('{{paragraph1}}','Bu tezgah çalışmaları,tamamı ile Porselen taşlarından yapılmadır.', $content);
$content = str_replace('{{paragraph2}}','"Porselen", kırılgan olmayışı,ısıya dayanıklı,çizilmez ve leke tutmuyo(gözeneksiz yapıları sayesinde) oluşuyla ön plana çıkar.', $content);
$content = str_replace('{{paragraph3}}',' Çoğu taştan ayıran özellikleri sayesinde mutfak ve banyo tezgahlarında,dış mekan çalışmalarında çokca tercih edilir.', $content);
$content = str_replace('{{paragraph4}}','Porselen, kolay temizlenebilir ve hijyeniktir ayrıca modern bir görüntü sunar, giderek popüler hale gelmiştir.', $content);
$content = str_replace('{{paragraph5}}','!!Porselen tezgahlar, özellikle yüksek sıcaklıkta pişirilen doğal kil ve mineral karışımlarından üretilir.!!', $content);
$content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);
$content = str_replace('{{ilkresim}}', 'porselen/porselen1.jpg', $content);
$content = str_replace('{{ilkacıklama}}','porselen taş resmi.', $content);
$content = str_replace('{{basresim}}', 'porselen/porselen1.jpg', $content);
$content = str_replace('{{basacıklama}}','porselen taşı gösterim resmi.', $content);




$galleryImages = [
  "porselen/porselen1.jpg",
  "porselen/porselen2.jpg",
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {
  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";
}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', '"porselen/porselen1.jpg","porselen/porselen2.jpg"', $content);
echo $content; 

?>
<?php
$custom_class = "satis-konum-5";
$urun_id = 8; // Örnek: Hack Black ürünü
include 'aylik_satis.php';
?>
<!--Hack Black Çalışmaları-->

<?php include 'database/modalandgallerysistemi/modal getir.php';?>


<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id = 3; // Bu kullanımda 1, başka kullanımda 2, sonra 3 vs...
$ad='Hack Black Tezgah';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-137', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '9', $content);
$content = str_replace('{{sayfaadi}}', 'index3.php', $content);
$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{title}}', 'Hack Black Tezgah Çalışmalarımız', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{topa}}', '30', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '75', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"hack black granit ana resim.jpg"', $content);
$content = str_replace('{{küçükresim2}}', '""', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{paragraph1}}', 'Bu tezgah çalışmaları,tamamı ile Hack Black taşından yapılmadır.', $content);
$content = str_replace('{{paragraph2}}', 'Taşdan söz edecek olursak, "Hack Black" granit sektöründe mezar,tezgah,döşeme ve dahi bir çok alanda tercih edilen bir granittir.', $content);
$content = str_replace('{{paragraph3}}', ' Suya ve neme karşı tam koruma sağlayan yapısı sayesinde banyo tezgahlarında,mutfak tezgahlarında,mezar yapımında müşterilerimiz tarafından çokca tercih edilir.', $content);
$content = str_replace('{{paragraph4}}', 'Kullanım alanlarına ek olarak şöminelerin ve ocakların etrafında çokça kullanılır', $content);
$content = str_replace('{{paragraph5}}', '!!Granit, aşınması zor ve dayanıklı bir taştır, bakımı kolaydır ve çeşitli kullanımlara uygundur.!!', $content);
$content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);
$content = str_replace('{{ilkresim}}', 'hack black/hack black1.jpg', $content);
$content = str_replace('{{ilkacıklama}}', 'Hack Black taşı resmi.', $content);
$content = str_replace('{{basresim}}', 'hack black/hack black1.jpg', $content);
$content = str_replace('{{basacıklama}}', 'Hack Black taşı gösterim resmi.', $content);




$galleryImages = [

  "hack black/hack black1.jpg",
  
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {

  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";

}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', '"hack black/hack black1.jpg"', $content);
echo $content; 

?>
<?php
$urun_id = 9; // Örnek: Hack Black ürünü
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
          li.textContent = /*urun;*/`${urun.urun_ad} (${urun.adet})`;
          li.style.padding = "2px 4px";
          li.style.fontSize = "14px";
          

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







<!--<script>
let sepet = JSON.parse(localStorage.getItem('sepet')) || [];

document.addEventListener('DOMContentLoaded', function () {
  guncelleSepetGorunum();
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('sepetekle')) {
        const urunDiv = e.target.closest('.urun');
        if (!urunDiv) return;

        let id = urunDiv.dataset.id;
        let ad = urunDiv.dataset.ad;
        let fiyat = urunDiv.dataset.fiyat;

        // Ürün daha önce eklendiyse tekrar eklemeyelim (opsiyonel)
        const mevcut = sepet.find(item => item.id === id);
        if (!mevcut) {
            sepet.push({ id, ad, fiyat });
            localStorage.setItem('sepet', JSON.stringify(sepet)); // localStorage'a kaydet
            guncelleSepetGorunum();
        }
    }
});

function guncelleSepetGorunum() {
    document.getElementById('sepet-adet').textContent = sepet.length;

    const liste = document.getElementById('sepet-listesi');
    liste.innerHTML = '';
    sepet.forEach(urun => {
        const li = document.createElement('li');
        li.textContent = `${urun.ad} - ${urun.fiyat} TL`;
        liste.appendChild(li);
    });
}

const sepetSimge = document.getElementById('sepet-simge');
sepetSimge.addEventListener('mouseenter', () => {
    document.getElementById('sepet-popup').style.display = 'block';
});
sepetSimge.addEventListener('mouseleave', () => {
    document.getElementById('sepet-popup').style.display = 'none';
});
</script>-->





</body>
</html>





















   
 <!-- <div class="bolum1">
<div class="paragraf">
        <img src="mısır taşı/mısır taşı1.jpg" alt="Açıklayıcı Resim" onclick="openModal()">
        <p><i><b>Resme tıklayarak daha detaylı ve farklı</b></i></p>
        <p><i><b>çalışmalarımızdan fotoğrafları inceleyebilirsiniz.</b></i></p>
    </div>
    <div class="yazi1">
            <h2><b>Mısır Taşı Tezgah Çalışmalarımız:</b></h2>
            <p>Bu tezgah çalışmaları,tamamı ile Star Galaxy taşından yapılmadır.</p>
                <p >Taşdan söz edecek olursak, Mısır Taşı granit sektöründe daha çok banyolarda tercih edilen ve bilinen granittir.</p>
               <p> Suya ve neme karşı dayanıklı yapısı sayesinde banyo tezgahlarında,duş alanlarında kullanılır ve müşterilerimiz tarafından çokca tercih edilir. </p>
               <p>  Kolay temizlenebilir yüzeyi sayesinde banyolarda modern bir görüntü sunar. </p>
               <p> Granit, aşınması zor ve dayanıklı bir taştır, bakımı kolaydır ve çeşitli kullanımlara uygundur. </p>

        </div>
  </div>

        <div class="gallery" style="display: none;">
        <img src="mısır taşı/mısır taşı2.jpg" onclick="openModal(0)" alt="Resim 2">
        <img src="mısır taşı/mısır taşı3.jpg" onclick="openModal(1)" alt="Resim 3">
        <img src="mısır taşı/mısır taşı4.jpg" onclick="openModal(2)" alt="Resim 4">

      </div>
<script>
      const images = ["mısır taşı/mısır taşı1.jpg","mısır taşı/mısır taşı2.jpg","mısır taşı/mısır taşı3.jpg", "mısır taşı/mısır taşı4.jpg"];
</script>-->