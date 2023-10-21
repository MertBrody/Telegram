<?php
$api_key = '6593217730:AAHLNvmAkfTWiE441L8s2ES-ubU0-bJbnEE';  // Telegram Bot API anahtarınızı buraya ekleyin
$chat_id = '6669631502';  // Mesajı göndereceğiniz hedef chat ID'sini buraya ekleyin

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
