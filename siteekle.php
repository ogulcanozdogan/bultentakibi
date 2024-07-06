<?php
ob_start();
$sayfa='Site Ekle';
include('inc/vt.php');
include('inc/head.php'); ?>
  <script src="assets/js/sweetalert.min.js"></script>
<?php
include('inc/nav.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



 if ($_POST) { // Post olup olmadığını kontrol ediyoruz.

	$site = $_POST['site'];
				$sira = $_POST['sira'];
               $hata = '';
			   
			   
include('inc/simple_html_dom.php');
function getWebsiteLogo($site) {
	ini_set('default_socket_timeout', 1800); // 30 dakika (1800 saniye)
    $html = file_get_html($site);

    // Logo etiketlerini veya sınıflarını hedefleyerek HTML içerisindeki logoyu bulun
    // Örneğin, <img> etiketlerini veya belirli bir sınıfa sahip <div> etiketlerini arayabilirsiniz

    $logoUrl = '';

    // Örnek olarak <img> etiketlerini arayalım
    $imgTags = $html->find('img');

    foreach ($imgTags as $img) {
        // Logo için uygun bir filtreleme yaparak doğru <img> etiketini bulun
        // Örneğin, genişlik veya yükseklik değerlerine bakabilirsiniz

        $logoUrl = $img->src;
        break; // İlk uygun <img> etiketini bulduğunuzda döngüden çıkın
    }

    $html->clear();

    return $logoUrl;
}


			
$logo_url = getWebsiteLogo($site);


			

            if ($site <> "" && $sira <> "") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
                //Değişecek veriler
				
                $satir = [
                 'site' => $site,
                 'sira' => $sira,
				 'logo_url' => $logo_url
				 
             ];
			 
			 
			   $sql = "INSERT INTO siteler (site, sira, logo_url)
VALUES ('$site', '$sira', '$logo_url')";
			$durum = $baglanti->prepare($sql)->execute();
               

             if ($durum)
             {
                echo '<script>swal("Başarılı","Site eklendi.","success").then((value)=>{ window.location.href = "index.php"});

                </script>';     // Eğer güncelleme sorgusu çalıştıysa urunler.php sayfasına yönlendiriyoruz.
            } else {
                    echo 'Düzenleme hatası oluştu: '; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
                }
            } else {
                echo 'Hata oluştu: ' . $hata; // dosya hatası ve form elemanlarının boş olma durumunua göre hata döndürüyoruz.
            }
            if ($hata != "") {
        echo '<script>swal("Hata","' . $hata . '","error");</script>';
    }
        }








?>
 <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Site Ekle</h6>
            </div>
			<form  method="post" action="" enctype="multipart/form-data">
   <div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-1">
    <div class="row">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Site Detayları</div>
                <div class="card-body">
                   
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1 font-weight-bold" for="inputUsername">Site Url</label>
                            <input class="form-control" name="site" id="site" type="text" placeholder="https://example.com" >
                        </div>
                        
						<div class="mb-3">
                            <label class="small mb-1 font-weight-bold" >Sıra</label>
                            <input class="form-control" name="sira" id="sira" type="number" min="0" placeholder="Sıra" >
                        </div>	
						
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Değişiklikleri Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
	  </div>
	  </div>
	  </div>
	  </div>
	  
	  
	  
	  
	  
	  
     

  <?php include('inc/footer.php'); ?>