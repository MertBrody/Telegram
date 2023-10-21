<?php
require 'vendor/autoload.php'; // Composer ile yüklenen kütüphaneyi dahil edin

$api_key = '6593217730:AAHLNvmAkfTWiE441L8s2ES-ubU0-bJbnEE'; // Telegram Bot API anahtarınızı buraya ekleyin
$chat_id = 'YOUR_CHAT_ID'; // Mesajı göndereceğiniz hedef chat ID'sini buraya ekleyin

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı girişi doğrulama işlemini burada gerçekleştirin.

    // Örnek bir kullanıcı adı ve şifresi
    $correctUsername = "kullanici";
    $correctPassword = "sifre";

    if ($username == $correctUsername && $password == $correctPassword) {
        // Kullanıcı girişi başarılı

        // Telegram mesajını gönderme işlemini başlatın
        $telegram = new Longman\TelegramBot\Telegram($api_key);

        $text = "Başarılı giriş! Kullanıcı: " . $username; // Mesaj metni
        $content = ['chat_id' => $chat_id, 'text' => $text];

        $result = Request::sendMessage($content);

        if ($result->isOk()) {
            // Mesaj başarıyla gönderildi.
            echo "Giriş başarılı. Telegram'a mesaj gönderildi.";
        } else {
            // Mesaj gönderme hatası
            echo "Mesaj gönderme hatası: " . $result->getDescription();
        }
    } else {
        echo "Kullanıcı adı veya şifre hatalı.";
    }
}
?>