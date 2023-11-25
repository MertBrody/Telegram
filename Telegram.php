<?php
$token = "6519976251:AAFYccpWtDs5p-lMJKteyquiEEPFtN1ouak";
$chat_id = "6225633981";
$message = "Merhaba, bu bir test mesajıdır.";

$api_url = "https://api.telegram.org/bot{$token}/sendMessage";
$params = [
    'chat_id' => $chat_id,
    'text' => $message,
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    echo "Bağlantı hatası! Şeytanın gücü belki de zayıfladı...";
} else {
    echo "Başarıyla kaos ekildi!";
}
?>
