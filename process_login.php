<?php
$api_key = 'YOUR_API_KEY';  // Telegram Bot API anahtarınızı buraya ekleyin
$chat_id = 'YOUR_CHAT_ID';  // Mesajı göndereceğiniz hedef chat ID'sini buraya ekleyin

echo "Mesajınızı girin ve Enter tuşuna basın:\n";
$message = readline();

if (!empty($message)) {
    $telegram_api_url = "https://api.telegram.org/bot$api_key/sendMessage?chat_id=$chat_id&text=" . urlencode($message);
    $response = file_get_contents($telegram_api_url);

    if ($response !== false) {
        echo "Mesaj başarıyla gönderildi.\n";
    } else {
        echo "Mesaj gönderme hatası.\n";
    }
} else {
    echo "Boş bir mesaj gönderilemez.\n";
}
