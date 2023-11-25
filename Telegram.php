<?php
// Kullanıcıdan girişleri al
$token = readline("Bot Token'ınızı girin: ");
$chat_id = readline("Chat ID'yi girin: ");
$message = readline("Gönderilecek Mesajı girin: ");

// Telegram API için isteği hazırla
$url = "https://api.telegram.org/bot$token/sendMessage";
$data = array('chat_id' => $chat_id, 'text' => $message);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ),
);

// API'ye isteği gönder ve sonucu kontrol et
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo "Mesaj gönderme başarısız. Hata: " . print_r(error_get_last(), true);
} else {
    echo "Mesaj başarıyla gönderildi.";
}
?>
