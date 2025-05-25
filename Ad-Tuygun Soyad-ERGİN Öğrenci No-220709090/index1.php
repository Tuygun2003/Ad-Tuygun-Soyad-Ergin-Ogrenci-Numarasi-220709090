<?php
session_start();
$baglanti = new mysqli("localhost", "root", "", "erginler");
if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

// GİRİŞ İŞLEMİ
if (isset($_POST['giris'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id,sifre,onay,adminmi,ilk_cikis,sifre_guncellendi_mi FROM kaydol_ekranı WHERE email = ?";
    $stmt = $baglanti->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id,$hashlenmisSifre,$onay,$is_admin,$ilk_cikis,$sifre_guncellendi_mi);
        $stmt->fetch();

 if (password_verify($password, $hashlenmisSifre)) {
         
          /*$_SESSION['user_id'] = $user_id;*/
          $_SESSION['user_id'] = $user_id;
           $_SESSION['is_admin'] = ($is_admin == 1);



        if ($onay!=1 && $is_admin!=1) {
    header("Location: index1.php?durum=onay_bekliyor");

    exit();
}
if ($ilk_cikis == 1 && $sifre_guncellendi_mi==0 && $is_admin != 1) {
    $_SESSION['user_id'] = $user_id;
    header("Location: ilk_giriste_sifre_degistir.php");
   exit();
}
       
           /*var_dump($_SESSION['user_id']);*/
           if ($is_admin == 1) {
                header("Location: admin.php");
            } 
           else{
            header("Location: index1.php?modal=1");// Başarılı girişte yönlendirme
           }
            exit();
        } else {
          $password = "admin123";
          $hash = '$2y$10$K8Jq7nE8m.Z0FjKXNHY7gO2mCEoZ9wqTLz6cTRiOqBfPfqVRiZqma';

if (password_verify($password, $hash)) {
    echo "Şifre doğru";
} else {
    echo "Şifre yanlış";
    echo password_hash("admin123", PASSWORD_DEFAULT);
}
          var_dump("Girilen şifre:", $password);
    var_dump("Veritabanındaki hash:", $hashlenmisSifre);
    echo "Şifre doğrulama başarısız!";
    exit();
            /*header("Location: index1.php?durum=yanlis_sifre");
            exit();*/
        }
    } else {
        header("Location: index1.php?durum=kullanici_yok");
        exit();
    }
    $stmt->close();
}

// KAYIT İŞLEMİ
if (isset($_POST['kaydol'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['sifre'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO kaydol_ekranı (email, sifre) VALUES (?, ?)";
    $stmt = $baglanti->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        header("Location: index1.php?durum=kayit_ok");
        exit();
    } else {
        header("Location: index1.php?durum=email_var");
        exit();
    }
    $stmt->close();
}
$baglanti->close();
?>


<?php
if (isset($_GET['durum'])) {
    switch ($_GET['durum']) {
        case 'kayit_ok':
            echo "<script>document.addEventListener('DOMContentLoaded', function() {
        var kutu = document.getElementById('uyariKutusu');
        kutu.style.display = 'block';
        kutu.textContent = 'Kayıt oluşturuldu.Admin onayı bekleniyor';
        setTimeout(function() {
            kutu.style.display = 'none';
        }, 5000);
    });</script>";
            break;
        case 'email_var':
            echo "<script> document.addEventListener('DOMContentLoaded', function() {
        var kutu = document.getElementById('uyariKutusu');
        kutu.style.display = 'block';
        kutu.textContent = 'Bu e-posta ile kayıtlı kullanıcı var.';
        setTimeout(function() {
            kutu.style.display = 'none';
        }, 5000);
    });</script>";
            break;
        case 'yanlis_sifre':
            echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        var kutu = document.getElementById('uyariKutusu');
        kutu.style.display = 'block';
        kutu.textContent = 'Şifre yanlış! Lütfen tekrar deneyin.';
        setTimeout(function() {
            kutu.style.display = 'none';
        }, 5000);
    });
   </script>";
            break;
        case 'kullanici_yok':
            echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        var kutu = document.getElementById('uyariKutusu');
        kutu.style.display = 'block';
        kutu.textContent = 'Bu e-posta ile kayıtlı kullanıcı bulunamadı.';
        setTimeout(function() {
            kutu.style.display = 'none';
        }, 5000);
    });
</script>";
            break;
            case 'onay_bekliyor':
            echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        var kutu = document.getElementById('uyariKutusu');
        kutu.style.display = 'block';
        kutu.textContent = 'Admin onayı bekleniyor.';
        setTimeout(function() {
            kutu.style.display = 'none';
        }, 5000);
    });
</script>";
break;
case 'sifre_degisti':
            echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        var kutu = document.getElementById('uyariKutusu');
        kutu.style.display = 'block';
        kutu.textContent = 'Şifre değiştirilmiştir.';
        setTimeout(function() {
            kutu.style.display = 'none';
        }, 5000);
    });
</script>";
break;
    }
}
?>


<!DOCTYPE html>
<!--action="sifre_guncelle.php"-->
<html>


<head>

    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="ERGİN, ERGİNLER, YAPI">
    <meta name="author" content="Tuygun ERGİN">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> ERGİNLER YAPI MALZEMELERİ </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <style>
       
    </style>

</head>

<body>

<div id="uyariKutusu" class="uyarikutusu"></div>

    <div id="hero">
        <video autoplay muted loop>
            <source src="arka plan video11.mp4" type="video/mp4">
        </video>
        <div class="content">
            <div class="container">
               <h1></h1>
                <form class="login-form" method="post">
                    <p style="border-style: solid; border-color:antiquewhite;color:bisque;font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><i>Giriş Yapın Veya Kaydolmadan <br> Fiyat Analizi Yapabilirsiniz.</i></p>
                    <img src="logo-3.png" alt="Logo">
                    <p style="border-style: solid;border-color:antiquewhite;color:bisque;font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"><i>ERGİNLER YAPI OLARAK <br> HİZMETİNİZDEYİZ</i></p>
                    <input type="text" placeholder="E Posta Adresi" name="email" required>
                    <input type="password" placeholder="Şifre" name="password" required>
                    <button type="submit" name="giris">Giriş</button>
                    <button style= "transform:translateY(7px)" class="formiçibutton" type="button" onclick='modal1Ac()'>Giriş Yapmadan Devam Et</button><br>
                <button style= "transform:translateY(-10px)" class= "formiçibutton" type="button" onclick='modal3Ac()'>Kaydol</button>
                </form>
                


            </div>

        </div>
    </div>
    <div class="modall" id="myModall">
        <div class="modall-icerikk">
          <h2><i> Ne Yaptırmak İstiyorsunuz?</i></h2>
          <button class="seçenek-a" onclick="sec('A')"><i>Mezar</i></button>
          <button class="seçenek-b" onclick="sec('B')"><i>Mutfak Tezgahı</i></button>
          <button class="seçenek-c" onclick="sec('C')"><i>Basamak,Kaplama ve Denizlik</i></button>
        </div>
      </div>
      <script>
    // Sayfa yüklendiğinde URL'de modal parametresi varsa, modalı aç
    window.addEventListener("DOMContentLoaded", function() {
        const params = new URLSearchParams(window.location.search);
        if (params.get("modal") === "1") {
        modal1Ac();
            // modal1Ac fonksiyonun varsa çalışır
        }
    });
</script>

      <script>
        function modal1Ac() {
                 document.getElementById("myModall").style.display = "flex";
            }
    
        function sec(secilen) {
          if (secilen === 'A') {
            window.location.href = 'http://localhost/ERG%C4%B0NLER%20YAPI%20WEB%20S%C4%B0TES%C4%B0/index2.php'; // A seçilince bu sayfaya gittik.
          } else if (secilen === 'B') {
            window.location.href = 'http://localhost/ERG%C4%B0NLER%20YAPI%20WEB%20S%C4%B0TES%C4%B0/index3.php'; // B seçilince bu sayfaya gittik.
          }
          else{
            window.location.href ='http://localhost/ERG%C4%B0NLER%20YAPI%20WEB%20S%C4%B0TES%C4%B0/index4.php';//C seçilince de bu sayfaya gittik.
          }
        }
    
       window.addEventListener("click", function (event) {
  const modalElement = document.getElementById("myModall");
  if (event.target.id === "myModall") {
    window.location.href = 'http://localhost/ERG%C4%B0NLER%20YAPI%20WEB%20S%C4%B0TES%C4%B0/index1.php';
  }
});
      </script>



<form class="düzen" method="GET">
  <h3 style="transform:translateY(+10px);text-align:center;margin-top:-4px"><i>Hava Durumu</i></h3>
    <select class="formiçibuttonselect" name="sehir">
        <option value="Beşikdüzü">Beşikdüzü</option>
        <option value="Şalpazarı">Şalpazarı</option>
        <option value="Tonya">Tonya</option>
        <option value="Vakfıkebir">Vakfıkebir</option>
        <option value="Trabzon">Trabzon</option>
    </select>
    <button  class="formiçibuttonselect" type="submit">Göster</button>
    <button  class="formiçibuttonselect" type="button" onclick="modal2Ac()">Önemi(Tıklayınız!!)</button>
</form>



<div class="modal" id="bilgiModalı">
    <div class="modal-icerik">
      <h2>Açıklama!</h2>
      <p><strong>Hava durumuna ihtiyaç duyulmasının sebebi,dış mekan işlerimizin çoğunun yapılabilmesi için hava durumunun yağmurlu olup olmamasına bakılmasıdır.Yağmurlu havada
        mezar,kaplama ve dahi birçok dış mekan işlerimiz yapılamamaktadır.O yüzden yağmurun yağmadığı birgün tercih edilmelidir.</strong>
      </p>
      <button class="kapat" onclick="modal2Kapat()">Kapat</button>
    </div>
  </div>

  <script>
    function modal2Ac() {
      document.getElementById("bilgiModalı").style.display = "block";
    }

    function modal2Kapat() {
      document.getElementById("bilgiModalı").style.display = "none";
    }
  </script>









<?php
if (isset($_GET['sehir'])) {
    $sehir = $_GET['sehir'];
    $apiKey = "565413b1b3c9e8cb13468b574219eb08"; 
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$sehir&appid=$apiKey&units=metric&lang=tr";

    $veri = file_get_contents($url);
    $hava = json_decode($veri, true);

    if ($hava && $hava['cod'] == 200) {
        echo "<div class='hava-kutusu'id='havaKutusu'>";
        echo "<h3 style='margin-top:0px'><i>{$hava['name']} için Hava Durumu</i></h3>";
        echo "<p><strong>Sıcaklık:</strong> {$hava['main']['temp']}°C</p>";
        echo "<p><strong>Durum:</strong> {$hava['weather'][0]['description']}</p>";
        echo "<p><strong>Nem:</strong> {$hava['main']['humidity']}%</p>";
        echo "<p><strong>Rüzgar:</strong> {$hava['wind']['speed']} m/s</p>";
       
  

     if (isset($hava['rain']['1h'])) {
            echo "<p><strong>Yağmur:</strong> {$hava['rain']['1h']} mm</p>";
        }
        else{
          echo "<p style='margin-bottom:0px'><strong>Yağmur:</strong> Şu an yağmıyor</p>";
        }
 echo "</div>";

echo "<script>
            setTimeout(function() {
                var kutu = document.getElementById('havaKutusu');
                if (kutu) {
                    kutu.style.transition = 'opacity 1s';
                    kutu.style.opacity = '0';
                    setTimeout(function()  {kutu.style.display = 'none';
                    } , 1000);

                }
            }, 8000);
        </script>";

}
}
?>

<div class="modal" id="kaydolModal">
  <button class="kapat2" onclick="modal3Kapat()">&times;</button>
  <div style="width:350px" class="modal-icerik">
    <h3>Kayıt Ol</h3>
    <form method="POST">
      <input style="width:250px;height:20px" type="email" name="email" placeholder="E-posta" required><br>
      <input style="width:250px;height:20px;trabsform:translateY(5px)" type="password" name="sifre" placeholder="Şifre" required><br>
      <button style="transform:translateY(8px)" type="submit" name="kaydol">Kaydol</button>
    </form>
  </div>
</div>

<script>
  function modal3Ac() {
    document.getElementById("kaydolModal").style.display = "block";
  }

  function modal3Kapat() {
    document.getElementById("kaydolModal").style.display = "none";
  }

  // Sayfa dışında bir yere tıklanınca modal kapansın
  window.onclick = function(event) {
    var modal = document.getElementById("kaydolModal");
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>


</body>

</html>