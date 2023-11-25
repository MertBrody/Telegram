<?php
$token = "6519976251:AAFYccpWtDs5p-lMJKteyquiEEPFtN1ouak";
$chat_id = "6225633981";
$message = "Merhaba, bu bir test mesajıdır.";

$url = "https://api.telegram.org/bot$token/sendMessage";
$data = array('chat_id' => $chat_id, 'text' => $message);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => json_encode($data), // Değişiklik burada
    ),
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo "Mesaj gönderme başarısız. Hata: " . print_r(error_get_last(), true);
} else {
    echo "Mesaj başarıyla gönderildi.";
}
?
