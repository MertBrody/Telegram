<?php
$api_key = '6593217730:AAHLNvmAkfTWiE441L8s2ES-ubU0-bJbnEE';  // Telegram Bot API anahtarınızı buraya ekleyin
$chat_id = '6669631502';  // Mesajı göndereceğiniz hedef chat ID'sini buraya ekleyin

// Kullanıcıdan mesajı komut satırından alın
if (isset($argv[1])) {
    $message = $argv[1];
} else {
    echo "Lütfen bir mesaj girin.\n";
    exit(1);
}

$telegram_api_url = "https://api.telegram.org/bot$api_key/sendMessage?chat_id=$chat_id&text=" . urlencode($message);

$response = file_get_contents($telegram_api_url);

if ($response !== false) {
    echo "Mesaj başarıyla gönderildi.\n";
} else {
    echo "Mesaj gönderme hatası.\n";
}
