<?php
    



$url = "https://www.twse.com.tw/exchangeReport/TWT49U?response=html&strDate=20241011&endDate=20241130"; // 要請求的 URL

// 初始化 cURL
$ch = curl_init($url);

// 設置 cURL 選項
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 返回內容而非輸出
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // 跟隨重定向

// 執行請求
$response = curl_exec($ch);

// 檢查錯誤
if (curl_errno($ch)) {
    echo 'cURL 錯誤: ' . curl_error($ch);
} else {
    // 處理回應
    echo '回應內容: ' . $response;

    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML($response);
    libxml_clear_errors();
    
    $datadom= new DOMXPath($dom);

    $rows = $datadom->query('//tr');

    foreach ($rows as $row) {
        // 獲取該行的所有 <td> 標籤
        $cells = $row->getElementsByTagName('td');
        
        // 檢查該行是否有至少兩個 <td>
        if ($cells->length >= 3) {
            // 如果第一個 <td> 是 "name"，則獲取第二個 <td>
            if ($cells->item(0)->nodeValue === '113年10月11日') {
                $nameValue = $cells->item(1)->nodeValue;
                echo 'ID: ' . $cells->item(1)->nodeValue."<br>";
                echo '姓名: ' . $cells->item(2)->nodeValue."<br>";
            }
        }
    }    

    // 提取 <h1> 標籤的內容
 
        // $title = $td->query('//td')->item($i)->nodeValue;
    
        // echo '標題: ' . $title;   # code...

 

}

// 關閉 cURL
curl_close($ch);
?>