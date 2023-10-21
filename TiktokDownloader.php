<?php
// TikTok video indirme aracı
// Termux'ta çalıştırılabilir
// chipslays/tiktok-downloader kütüphanesini kullanır

// tiktok-downloader.php dosyasını indirin
// [3](https://github.com/chipslays/tiktok-downloader) adresinden indirebilirsiniz
require 'tiktok-downloader.php';

// TikTok video URL'sini alın
// Kısa veya uzun URL olabilir
$url = readline("TikTok video URL'sini girin: ");

// TikTok nesnesi oluşturun
$tiktok = new TikTok();

// URL'yi ayarlayın
$tiktok->url($url);

// Video verilerini alın
$data = $tiktok->getData();

// Video verilerini yazdırın
print_r($data);

// Videoyu indirmek için seçenek sunun
echo "Videoyu indirmek ister misiniz? (E/H): ";
$choice = readline();

// Seçime göre işlem yapın
if ($choice == "E" || $choice == "e") {
    // Filigranlı veya filigransız seçeneği sunun
    echo "Filigranlı mı filigransız mı indirmek istersiniz? (F/N): ";
    $type = readline();

    // Tipine göre video URL'sini alın
    if ($type == "F" || $type == "f") {
        // Filigranlı video URL'sini alın
        $video_url = $data["video"]["downloadAddr"];
    } else if ($type == "N" || $type == "n") {
        // Filigransız video URL'sini alın
        $video_url = $data["video"]["playAddr"];
    } else {
        // Geçersiz seçim durumunda hata mesajı verin
        echo "Geçersiz seçim. Lütfen F veya N girin.\n";
        exit();
    }

    // Video dosya adını alın
    $filename = basename($video_url);

    // Videoyu indirin ve kaydedin
    echo "Videoyu indiriyorum...\n";
    file_put_contents($filename, file_get_contents($video_url));
    echo "Videoyu başarıyla indirdim: $filename\n";
} else if ($choice == "H" || $choice == "h") {
    // İndirmek istemiyorsa çıkış yapın
    echo "Tamam, iyi günler.\n";
    exit();
} else {
    // Geçersiz seçim durumunda hata mesajı verin
    echo "Geçersiz seçim. Lütfen E veya H girin.\n";
    exit();
}
?>
