<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入表單</title>
</head>
<body>
    <h2>登入</h2>
    <form action="account.php" method="post">
        <label for="username">帳號：</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">密碼：</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">登入</button>
    </form>
    <!-- <div>
        <?php
        // 顯示訊息
        if ($message) {
            echo $message;
        }
        ?>
    </div> -->
</body>
</html>