<?php
// Kullanıcıdan girişleri al
$token = readline("Bot Token'ınızı girin: ");
$chat_id = readline("Chat ID'yi girin: ");
$message = readline("Gönderilecek Mesajı girin: ");

// İstenilen hızda mesaj göndermek için dakikada kaç mesaj gönderileceğini belirle
$messages_per_minute = 1;
$delay_between_messages = 60 / $messages_per_minute;

// Telegram API için isteği hazırla ve gönder
$url = "https://api.telegram.org/bot$token/sendMessage";
$data = array('chat_id' => $chat_id, 'text' => $message);

for ($i = 0; $i < $messages_per_minute; $i++) {
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ),
    );

    // API'ye isteği gönder
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "Mesaj gönderme başarısız. Hata: " . print_r(error_get_last(), true);
    } else {
        echo "Mesaj başarıyla gönderildi. Bekleniyor...\n";
        sleep($delay_between_messages);
    }
}

echo "İşlem tamamlandı.\n";
?>
