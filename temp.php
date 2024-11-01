<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    

    $html = '<html><body><h1>這是標題</h1><p>這是一段文字。</p></body></html>';

    $dom = new DOMDocument;
    libxml_use_internal_errors(true); // 避免解析錯誤的警告
    $dom->loadHTML($html);
    libxml_clear_errors();
    
    $xpath = new DOMXPath($dom);
    
    // 提取 <h1> 標籤的內容
    $title = $xpath->query('//h1')->item(0)->nodeValue;
    
    echo "標題: " . $title; // 輸出: 標題: 這是標題
?>    
</body>
</html>
