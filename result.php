<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI結果</title>
</head>
<body>
    <h1>BMI 結果</h1>




<?php


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $H=$_POST['height'];
    $W=$_POST['weight'];
        
}
else if ($_SERVER["REQUEST_METHOD"] == "GET")
{

    
    $H=$_GET['height'];
    $W=$_GET['weight'];

    

}
else
{
    echo"資料有問題";
    exit();
}

$BMI=round($W*10000/($W*$W));    
?>

<div>你的身高:<?=$H;?> 公分</div>
<div>你的體重:<?=$W;?> 公斤</div>

<div>你BMI 為:<?=$BMI; ?> </div>
<?php
        
        if($BMI<18.5)
            $result=" 太輕";
        else if($BMI<24)
            $result="正常";
        else if($BMI<27)
            $result="過重";    
        else if($BMI<30)
            $result="中度肥胖";
        else if($BMI<35)
            $result="中度肥胖";                           
        else 
        $result="重度肥胖";
    ?>
<div>你的體位判定:<?=$result?>

    
    
</div>

<div> 
    <a href="bmi.php?bmi=<?=$BMI;?>">重首頁/重新量測</a>
       <!-- <a href="index1.php ">重首頁/重新輸入</a>  -->
      </div>
</body>

</html>