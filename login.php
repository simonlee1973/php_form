<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入帳號</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }      
        .longin_container{
            background-color:white;
            padding: 20px;
            border-radius:10px;
            box-shadow: 0 0 10px rgba(0,0,0,1);
            width: 300px;
        }  
        input[type="text"],
        input[type="password"] {
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }        


    </style>
</head>
<body>

<?php 
session_start();
if(!isset($_SESSION['login'])){
    ?>


<div class="login_container">    
    <h2>登入</h2>   

    <!-- <form action="account.php" method="post"> -->
        <form action="acc_check.php" method="post">
 
        <input type="text" id="username" name="username" placeholder="使用者名稱" required>
         <input type="password" id="password" name="password"placeholder="密碼" required>
         <input  type="submit" value='登入'>
         </form>
</div>

<?php
    }else{
?>

    <div>
        你已登入
    </div>

<?php
 }   
?>

</body>
</html>