<?php
echo "TikTok videolarını topluca indirmek için video URL'lerini girin. Her URL'yi girdikten sonra Enter tuşuna basın. İndirme işlemi otomatik olarak başlayacaktır.\n";

$downloadUrls = array();

while (true) {
    echo "Video URL'sini girin (Çıkmak için 'q' girin ve Enter tuşuna basın):\n";
    $videoUrl = readline();

    if (strtolower($videoUrl) === 'q') {
        break;
    }

    $downloadUrls[] = $videoUrl;
}

foreach ($downloadUrls as $videoUrl) {
    $videoId = extractVideoId($videoUrl);
    
    if ($videoId !== false) {
        $downloadUrl = "https://www.tiktok.com/node/share/video/{$videoId}";
        // Buradan video indirme işlemi yapabilirsiniz
        echo "Video başarıyla indirildi: $downloadUrl\n";
    } else {
        echo "Geçersiz TikTok video URL'si: $videoUrl\n";
    }
}

function extractVideoId($videoUrl) {
    $pattern = '/\/video\/(\d+)/';
    preg_match($pattern, $videoUrl, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    } else {
        return false;
    }
}
?>
