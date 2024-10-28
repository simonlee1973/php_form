
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// 假設的正確帳號和密碼
$correct_username = 'admin';
$correct_password = '1234';

// 初始化變數
$message = '';

// 檢查是否有提交表單
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 獲取表單資料
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // 驗證帳號和密碼
    if ($username === $correct_username && $password === $correct_password) {
        //$message = "登入成功！帳號：$username";
        echo "帳密正確:登入成功";
        
    } else {
       // $message = "登入失敗！帳號或密碼錯誤。";
       echo "帳密錯誤:登入失敗";

    }


}
?>
<div><?$message;?></div>
<div>帳號:<?=$username;?></div>
<div>密碼:<?=$password;?></div>
</body>
</html>

