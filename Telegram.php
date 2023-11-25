<?php
$token = "6519976251:AAFYccpWtDs5p-lMJKteyquiEEPFtN1ouak";
$chat_id = "6225633981";
$message = "Merhaba, bu bir test mesajıdır.";

$url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text={$message}";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

echo "Başarıyla kaos ekildi!";
?>
