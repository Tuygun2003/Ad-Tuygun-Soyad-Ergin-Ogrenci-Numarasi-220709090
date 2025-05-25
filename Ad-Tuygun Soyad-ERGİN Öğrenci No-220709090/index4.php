<!DOCTYPE html>
<html>
   
    
    <head>
    
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="ERGİN, ERGİNLER, YAPI">
        <meta name="author" content="Tuygun ERGİN">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <title> Basamak Kaplama Ve Denizlik Çalışmalarımız </title>
        <link rel="stylesheet" href="style3.css">
    <style>
        h1 {
            text-align: center;
            transform: translateY(3px);
            font-size: x-large;
        }
    </style>
    
    </head>
    <body>
    <h1><i></i></h1>

<!-- BASAMAK ÇALIŞMALARI-->

<?php include 'database/modalandgallerysistemi/modal getir.php';?>


<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id=1;
$ad='Basamak';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-135', $content1);
$content1 = str_replace('{{lefta}}', '50', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '10', $content);
$content = str_replace('{{sayfaadi}}', 'index4.php', $content);
$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{title}}', 'Basamak Çalışmalarımız', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{topa}}', '30', $content);
$content = str_replace('{{lefta}}', '120', $content);
$content = str_replace('{{topb}}', '75', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"bej1 ana resim.JPG"', $content);
$content = str_replace('{{küçükresim2}}', '"bej2 ana resim.jpg"', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{küçükresim3}}', '"bursa siyahı ana resim.jpg"', $content);
$content = str_replace('{{paragraph1}}', 'Basamak çalışmalarımız,resimlerde de görüldüğü gibi birçok farklı taş kullanılarak yapılmıştır.', $content);
$content = str_replace('{{paragraph2}}', 'Genelde bölgeye uygun taşlar kullanılır fakat müşterilerimizin isteği bizim için önceliklidir.', $content);
$content = str_replace('{{paragraph3}}', 'Basamak için kullanılan başlıca taş Bej ve Bej çeşitleridir.(Kullanılan taşlardaki ilk resim).', $content);
$content = str_replace('<p id="pp">{{paragraph4}}</p>', '', $content);
$content = str_replace('<p id="pp">{{paragraph5}}</p>', '', $content);
 $content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);

 /*$content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);
 $paragraph6 = ''; 
 if (!empty(trim($paragraph6))) {
  $content = str_replace('{{paragraph6}}', $paragraph6, $content);
} else {
  // <p id="pp">{{paragraph6}}</p> satırını şablondan tamamen sil
  $content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);
}*/


$content = str_replace('{{ilkresim}}', 'basamaklar/basamak1.jpg', $content);
$content = str_replace('{{ilkacıklama}}', 'basamak resmi.', $content);
$content = str_replace('{{basresim}}', 'basamaklar/basamak1.jpg', $content);
$content = str_replace('{{basacıklama}}', 'basamak gösterim resmi.', $content);




$galleryImages = [
 "basamaklar/basamak1.jpg","basamaklar/basamak2.jpg","basamaklar/basamak3.jpg","basamaklar/basamak4.jpg","basamaklar/basamak5.jpg","basamaklar/basamak6.jpg","basamaklar/basamak7.jpg",
 "basamaklar/basamak8.jpg","basamaklar/basamak9.jpg","basamaklar/basamak10.jpg","basamaklar/basamak11.jpg","basamaklar/basamak12.jpg","basamaklar/basamak13.jpg","basamaklar/basamak14.jpg",
 "basamaklar/basamak15.jpg","basamaklar/basamak16.jpg","basamaklar/basamak17.jpg",
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {
  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";
}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', ' "basamaklar/basamak1.jpg","basamaklar/basamak2.jpg","basamaklar/basamak3.jpg","basamaklar/basamak4.jpg","basamaklar/basamak5.jpg","basamaklar/basamak6.jpg","basamaklar/basamak7.jpg",
 "basamaklar/basamak8.jpg","basamaklar/basamak9.jpg","basamaklar/basamak10.jpg","basamaklar/basamak11.jpg","basamaklar/basamak12.jpg","basamaklar/basamak13.jpg","basamaklar/basamak14.jpg",
 "basamaklar/basamak15.jpg","basamaklar/basamak16.jpg","basamaklar/basamak17.jpg",', $content);
echo $content; 

?>


<?php
$custom_class = "satis-konum-5";
$urun_id = 10; // Örnek: Hack Black ürünü
include 'aylik_satis.php';
?>



<!--KAPLAMA ÇALIŞMALARI -->

<?php include 'database/modalandgallerysistemi/modal getir.php';?>


<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id = 2; // Bu kullanımda 1, başka kullanımda 2, sonra 3 vs...
$ad='Kaplama';
$fiyat='20000';
$content1= str_replace('{{topa}}', '-135', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '11', $content);
$content = str_replace('{{sayfaadi}}', 'index4.php', $content);
$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{title}}', 'Kaplama Çalışmalarımız', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{topa}}', '30', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '75', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"marmara mermer ana resim.jpg"', $content);
$content = str_replace('{{küçükresim2}}', '"bursa siyahı ana resim.jpg"', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{paragraph1}}','Basamak çalışmalarımız,resimlerde de görüldüğü gibi birçok farklı taş kullanılarak yapılmıştır.', $content);
$content = str_replace('{{paragraph2}}','Granit, seramik, mermer kaplama, yapıların iç mekanlarında veya dış cephelerinde kullanılan bir kaplama türünü ifade eder', $content);
$content = str_replace('{{paragraph3}}','Granit, seramik ve mermer kaplama, yapıların hem iç hem de dış mekanlarında estetik ve fonksiyonel bir görünüm sağlamak amacıyla tercih edilir.', $content);
$content = str_replace('{{paragraph4}}','Bu kaplamaların seçimi, yapı tipine, kullanım amacına ve tasarım tercihlerine göre yapılır.', $content);
/*$content = str_replace('{{paragraph5}}','!!Porselen tezgahlar, özellikle yüksek sıcaklıkta pişirilen doğal kil ve mineral karışımlarından üretilir.!!', $content);*/
$content = str_replace('<p id="pp">{{paragraph5}}</p>', '', $content);
$content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);
$content = str_replace('{{ilkresim}}', 'kaplama/kaplama1.jpg', $content);
$content = str_replace('{{ilkacıklama}}','kaplama resmi.', $content);
$content = str_replace('{{basresim}}', 'kaplama/kaplama1.jpg', $content);
$content = str_replace('{{basacıklama}}','kaplama gösterim resmi.', $content);




$galleryImages = [
  "kaplama/kaplama1.jpg",
  "kaplama/kaplama2.jpg"
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {
  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";
}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', '"kaplama/kaplama1.jpg","kaplama/kaplama2.jpg"', $content);
echo $content; 

?>

<?php
$custom_class = "satis-konum-7";
$urun_id =11; // Örnek: Hack Black ürünü
include 'aylik_satis.php';
?>


<!--DENİZLİK ÇALIŞMALARI -->

<?php include 'database/modalandgallerysistemi/modal getir.php';?>


<?php
include 'database/sepeteklesistemi/sepeteklebuton.php';
$id = 3; // Bu kullanımda 1, başka kullanımda 2, sonra 3 vs...
$ad='Denizlik';
$fiyat='2000';
$content1= str_replace('{{topa}}', '-135', $content1);
$content1 = str_replace('{{lefta}}', '30', $content1);
$content1 = str_replace(['{{id}}', '{{ad}}', '{{fiyat}}'],[$id, $ad, $fiyat],$content1);
$content .= $content1;
$content = str_replace('{{id}}', $id, $content);
$content = str_replace('{{ürünid}}', '12', $content);
$content = str_replace('{{sayfaadi}}', 'index4.php', $content);
$content = str_replace('{{paragraphimg}}', 'Resme tıklayarak daha detaylı ve farklı', $content);
$content = str_replace('{{paragraphimgalt}}', 'çalışmalarımızdan fotoğrafları inceleyebilirsiniz.', $content);
$content = str_replace('{{title}}', 'Denizlik Çalışmalarımız', $content);
$content = str_replace('{{açiklama}}', 'Kullanılan Taş(lar).Büyütmek için tıklayınız.', $content);
$content = str_replace('{{topa}}', '30', $content);
$content = str_replace('{{lefta}}', '100', $content);
$content = str_replace('{{topb}}', '75', $content);
$content = str_replace('{{leftb}}', '180', $content);
$content = str_replace('{{küçükresim1}}', '"muğla mermer ana resim.jpg"', $content);
$content = str_replace('{{küçükresim2}}', '""', $content);
$content = str_replace('{{küçükresim3}}', '', $content);
$content = str_replace('{{data.imageUrl}}', 'data.imageUrl', $content);
$content = str_replace('{{paragraph1}}','Denizlik çalışmalarımız;"mermer","granit" taş çeşitleri kullanılarak yapılmıştır.', $content);
$content = str_replace('{{paragraph2}}','İşlem,pencere altına 30-50cm genişliğinde(değişkenlik gösterebilir) mermer veya granit denizlik yerleştirilmesini kapsar. İlk olarak, pencere boşluğu ölçülür ve uygun boyutlarda taş hazırlanır.', $content);
$content = str_replace('{{paragraph3}}',' Mermerin montajı sırasında dikkatlice yerleştirilerek sabitlenir ve su yalıtımı sağlanır.', $content);
$content = str_replace('{{paragraph4}}','Estetik ve dayanıklı bir çözüm sunan denizlik, dış etkenlere karşı uzun süreli koruma sağlar ve pencere estetiğini tamamlar.', $content);
/*$content = str_replace('{{paragraph5}}','Estetik ve dayanıklı bir çözüm sunan mermer veya granit denizlik, dış etkenlere karşı uzun süreli koruma sağlar ve pencere estetiğini tamamlar', $content);*/
$content = str_replace('<p id="pp">{{paragraph5}}</p>', '', $content);
$content = str_replace('<p id="pp">{{paragraph6}}</p>', '', $content);

$content = str_replace('{{ilkresim}}', 'denizlik/denizlik1.JPG', $content);
$content = str_replace('{{ilkacıklama}}','denizlik örnek resmi.', $content);
$content = str_replace('{{basresim}}', 'denizlik/denizlik1.JPG', $content);
$content = str_replace('{{basacıklama}}','denizlik gösterim resmi.', $content);




$galleryImages = [
  "denizlik/denizlik1.JPG",
  "denizlik/denizlik2.jpg"
];

$galleryHtml = "";
foreach ($galleryImages as $index => $img) {
  $galleryHtml .= '<img src="' . $img . '" onclick="openModal'.$id.'(' . $index . ')" alt="Resim ' . ($index + 1) . '">' . "\n";
}

// Şablonda değiştir
$content = str_replace('{{gallery_images}}', $galleryHtml, $content);
$content = str_replace('{{resimler}}', ' "denizlik/denizlik1.JPG","denizlik/denizlik2.jpg"', $content);
echo $content; 

?>

<?php
$custom_class = "satis-konum-5";
$urun_id = 12; // Örnek: Hack Black ürünü
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