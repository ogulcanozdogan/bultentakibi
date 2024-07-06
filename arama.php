  <?php
  $sarchQuery = $_POST['ara'];
  
use GuzzleHttp\Client;

function searchInWordPressSite($siteURL, $searchTerm)
{
    $client = new Client();
    
    $response = $client->get($siteURL . '/wp-json/wp/v2/posts', [
        'query' => [
            'search' => $searchTerm,
            'per_page' => 10 // İstenilen sonuç sayısı
        ]
    ]);
    
    $body = $response->getBody();
    $data = json_decode($body, true);
    
    if (!empty($data)) {
        foreach ($data as $post) {
            echo $post['link'] . "\n";
        }
    } else {
        echo "Sonuç bulunamadı.\n";
    }
}

// Arama yapılacak WordPress sitesinin URL'si
$siteURL = 'https://example.com';

// Aranacak terim
$searchTerm = 'example';

// WordPress sitesinde arama yap
searchInWordPressSite($siteURL, $searchTerm);
?>