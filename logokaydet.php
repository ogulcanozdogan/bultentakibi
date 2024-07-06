<?php
include('inc/vt.php');
include('inc/simple_html_dom.php');
function getWebsiteLogo($url) {
	ini_set('default_socket_timeout', 1800); // 30 dakika (1800 saniye)
    $html = file_get_html($url);

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

$sorgu = $baglanti->prepare("SELECT * FROM siteler order by id");
$sorgu->execute();

while ($sonuc = $sorgu->fetch()) { 
$site = $sonuc['site'];
$logo_url = getWebsiteLogo($site);


                $satir = [
                 'site' => $site,
                 'logo_url' => $logo_url,
             ];

$sql = "UPDATE siteler SET logo_url=:logo_url WHERE site=:site order by id;";             
$durum = $baglanti->prepare($sql)->execute($satir);


}

?>