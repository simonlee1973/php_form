<?php
$url =
// "https://mis.twse.com.tw/stock/api/getStockInfo.jsp?ex_ch=tse_2330.tw";
//"https://www.twse.com.tw/exchangeReport/MI_INDEX?response=json&date={20231030}&type=IND"; //NG
"https://www.twse.com.tw/exchangeReport/MI_INDEX?response=json&date=20190618&type=IND";

$data = file_get_contents($url);
echo '<pre>';
print_r ($data)."<br>";
echo '</pre>';
$data = json_decode($data,true);
echo '<pre>';
print_r ($data)."<br>";
echo '</pre>';
echo $data['msgArray'][0]['c'];    

?>


