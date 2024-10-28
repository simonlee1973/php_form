<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse:collapse;
        }
        td{
            border: 1px solid #333;
            text-align:center;
            padding:5px 10px;
        }
        .holiday{
            background:pink;
            color:#999
        }
        .grey-text{
            color:grey;

        }
        .today{

            color:white;
            background:blue;
        }
    </style>
</head>
<body>
    

<?php

if (isset($_GET['month']) && isset($_GET['year'])) {
    $currentMonth = (int)$_GET['month'];
    $currentYear = (int)$_GET['year'];
    if($currentMonth>12)
    {
        $currentMonth-=12;
        $currentYear++;

    }
    else if($currentMonth<1)
    {
        $currentMonth+=12;
        $currentYear--;

    }
        


    $fday_mon=new Datetime("$currentYear-$currentMonth-1");
    $today=new Datetime();
    
} else {
    $fday_mon=new Datetime('first day of this month');
    $today=new Datetime();
}
    
    date_default_timezone_set('Asia/Taipei');
    echo "<table>";
    echo "<tr>";
    echo "<td> 日 </td><td> 一 </td><td> 二 </td><td> 三 </td><td> 四 </td><td> 五 </td><td> 六 </td>";
    echo "</tr>";

        
   // $fday_mon=new Datetime('first day of this month');
   // $today=new Datetime();


    // 獲取當前月份和年份


    $run_day =clone $fday_mon; 
   

    ?>    
    <h1><?php echo $currentYear . '年' . $currentMonth . '月'; ?></h1>
    <!-- <a href="calendat2.php?month=1">上個月</a>
    <a href="calendat2.php?month=-1">上個月</a> -->
    <a href="calendar2.php?month=<?php echo $currentMonth ; ?>&year=<?php echo $currentYear-1; ?>">前一年 </a>        
    <a href="calendar2.php?month=<?php echo $currentMonth - 1; ?>&year=<?php echo $currentYear; ?>">上個月 </a>
    <a href="calendar2.php?month=<?php echo $currentMonth + 1; ?>&year=<?php echo $currentYear; ?>">下個月 </a>
    <a href="calendar2.php?month=<?php echo $currentMonth ; ?>&year=<?php echo $currentYear+1; ?>">下一年 </a>    

    <?php

    if($currentMonth>$run_day->format('Y'))
        $fday_mon->modify("first day of next month");
    else
        $fday_mon->modify("first day of last month");
    
    $shday=(int)$run_day->format('w');
    if($shday!=0)
        $shday=-$shday;
    else
        $shday=0;

    //$run_day =clone $fday_mon;       
    $run_day->modify("$shday days");



        
    for ($i=0; $i < 6; $i++) { 
        echo "<tr>";
        for ($j=0; $j<7; $j++){ 
            $h_str=($j==0||$j==6)?"holiday ":"";
            $g_str=($run_day->format('n')!=$fday_mon->format('n'))?"grey-text ":"";
            $t_str=($run_day->format("y-m-d")==$today->format('y-m-d'))?"today":"";
            echo "<td class='".$h_str.$g_str.$t_str."'>".$run_day->format('j')."</td>"; 
            $run_day->modify("+1 days");           
                    # code...
        }# code...
        echo "</tr>";

    }
    echo "</table>";
?>


    
</body>
</html>