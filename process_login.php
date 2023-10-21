<?php
$api_key = 'YOUR_API_KEY';  // Telegram Bot API anahtarınızı buraya ekleyin
$chat_id = 'YOUR_CHAT_ID';  // Mesajı göndereceğiniz hedef chat ID'sini buraya ekleyin

$username = 'kullanici';
$password = 'sifre';

if ($username == 'kullanici' && $password == 'sifre') {
    $text = "Başarılı giriş! Kullanıcı: " . $username;
} else {
    $text = "Kullanıcı adı veya şifre hatalı.";
}

$telegram_api_url = "https://api.telegram.org/bot$api_key/sendMessage?chat_id=$chat_id&text=" . urlencode($text);

$response = file_get_contents($telegram_api_url);

if ($response !== false) {
    echo "Mesaj başarıyla gönderildi.";
} else {
    echo "Mesaj gönderme hatası.";
}
?>
