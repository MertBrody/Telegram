<?php

function getTelegramMessage($api_key, $chat_id) {
    echo "Lütfen göndermek istediğiniz mesajı girin ve Enter tuşuna basın:\n";
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
}

echo "Lütfen Telegram Bot API anahtarınızı girin ve Enter tuşuna basın:\n";
$api_key = readline();

echo "Lütfen hedef chat ID'sini girin ve Enter tuşuna basın:\n";
$chat_id = readline();

if (empty($api_key) || empty($chat_id)) {
    echo "Geçerli bir API anahtarı ve chat ID girmelisiniz.\n";
    exit(1);
}

echo "API anahtarınız: $api_key\n";
echo "Chat ID'niz: $chat_id\n";

while (true) {
    echo "Yeni bir mesaj göndermek ister misiniz? (E/H)\n";
    $response = readline();
    
    if (strtolower($response) != 'e') {
        break;
    }

    getTelegramMessage($api_key, $chat_id);
}

?>
