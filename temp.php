<?php
$url = 'https://www.dcn.com.tw/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3');

$content = curl_exec($ch);
curl_close($ch);

if ($content !== false) {
    echo $content;
} else {
    echo "無法抓取內容";
}
?>