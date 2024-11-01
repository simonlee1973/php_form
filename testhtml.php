<?php
$url =
// "https://mis.twse.com.tw/stock/api/getStockInfo.jsp?ex_ch=tse_2330.tw"; //單股資訊
//"https://www.twse.com.tw/exchangeReport/MI_INDEX?response=json&date={20231030}&type=IND"; //NG
//"https://www.twse.com.tw/exchangeReport/MI_INDEX?response=json&date=20190618&type=IND"; //每日收盤價
//"https://www.twse.com.tw/rwd/zh/ETF/etfDiv?stkNo=&startDate=20050101&endDate=20231028&response=json&_=1698477064915"; //ETF股利
"https://www.twse.com.tw/exchangeReport/TWT49U?response=html&strDate=20241011&endDate=20241130";//歷史股利



$test =file_get_html($url);

$data = file_get_contents($url);
$html = mb_convert_encoding($data, 'HTML-ENTITIES', 'UTF-8');

echo '<pre> 111';
print_r ($data)."<br>";
echo '</pre>';

$dom = new DOMDocument;
libxml_use_internal_errors(true); // 避免解析錯誤的警告
$dom->loadHTML($data);
libxml_clear_errors();

$xdata = new DOMXPath($dom);

// 提取 <h1> 標籤的內容
$title = $xdata->query('//td')->item(0)->nodeValue;

echo "標題: " . $title; // 輸出: 標題: 這是標題


$data = json_decode($data,true);
// echo '<pre>222';
// print_r ($data)."<br>";
// echo '</pre>';
// echo $data['msgArray'][0]['c'];    


?>




