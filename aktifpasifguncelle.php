<?php
include('inc/vt.php');
 function siteyiKontrolEt($siteURL)
{
    $curl = curl_init($siteURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_exec($curl);
    $responseCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
    curl_close($curl);
  
    return $responseCode;
}


  
  
  $sorgu = $baglanti->prepare("SELECT * FROM siteler");
$sorgu->execute();

while ($sonuc = $sorgu->fetch()) { 
// Kontrol edilecek site URL'si
$siteURL =  $sonuc['site'];

// Siteyi kontrol et
$responseCode = siteyiKontrolEt($siteURL);

// Duruma göre veritabanında güncelleme yap
if ($responseCode === 200) {
    // Site çalışıyor
    $aktif = 1;
} else {
    // Site çalışmıyor
    $aktif = 0;
}


                $satir = [
                 'site' => $site,
                 'aktif' => $aktif,
             ];

$sql = "UPDATE siteler SET aktif=:aktif WHERE site=:site order by id;";             
$durum = $baglanti->prepare($sql)->execute($satir);


}
?>