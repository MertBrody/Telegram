<?php
function download_video($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSLVERSION,CURL_SSLVERSION_DEFAULT);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537');
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$video_url = 'https://www.tiktok.com/@username/video/videoID'; // TikTok video URL
$video_data = download_video($video_url);

file_put_contents('video.mp4', $video_data);
?>
