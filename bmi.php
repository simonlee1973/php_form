<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>計算BMI</title>
</head>
<body>
    <h1>計算BMI</h1>
    <a href="index1.html">回首頁</a>
    <?php 
    if(isset($_GET['bmi'])){
        echo "你上一次量測的BMI為{$_GET['bmi']}";
    }

    ?>

    <form action="result.php" method="get">
    <div>   
        <label for="height">身高</label>    
        <input type="number" name="height" id="height" step="0.1">
    </div> 
    <div>
        <label for="height">體重</label>
        <input type="text" name="weight" id="weight" step="0.1">
    </div>
    <div>
        

        <input type="submit" value="計算">
        <input type="reset" value="重置">
    </div>
    </form>

    <form action="result.php" method="post">
    <div>   
        <label for="height">身高</label>    
        <input type="number" name="height" id="height" step="0.1">
    </div> 
    <div>
        <label for="height">體重</label>
        <input type="text" name="weight" id="weight" step="0.1">
    </div>
    <div>
        

        <input type="submit" value="計算">
        <input type="reset" value="重置">
    </div>
    </form>    
</body>
</html>