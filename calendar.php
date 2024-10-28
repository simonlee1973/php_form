<?php
// 設置時區
date_default_timezone_set('Asia/Taipei');

// 獲取當前月份和年份
if (isset($_GET['month']) && isset($_GET['year'])) {
    $currentMonth = (int)$_GET['month'];
    $currentYear = (int)$_GET['year'];
} else {
    $currentMonth = date('n'); // 當前月份
    $currentYear = date('Y');   // 當前年份
}

// 獲取當前月份的第一天和最後一天
$firstDayOfMonth = mktime(0, 0, 0, $currentMonth, 1, $currentYear);
$lastDayOfMonth = mktime(0, 0, 0, $currentMonth + 1, 0, $currentYear);

// 獲取當前月份的天數
$totalDays = date('t', $firstDayOfMonth);

// 獲取當前月份的第一天是星期幾
$firstWeekday = date('w', $firstDayOfMonth);
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            margin: 20px;
        }
        .day {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
        .today {
            background-color: yellow;
        }
        .weekend {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <h1><?php echo $currentYear . '年' . $currentMonth . '月'; ?></h1>
    <a href="?month=<?php echo $currentMonth - 1; ?>&year=<?php echo $currentYear; ?>">上個月</a>
    <a href="?month=<?php echo $currentMonth + 1; ?>&year=<?php echo $currentYear; ?>">下個月</a>
    
    <div class="calendar">
        <?php
        // 顯示星期標題
        $weekdays = ['日', '一', '二', '三', '四', '五', '六'];
        foreach ($weekdays as $day) {
            echo "<div class='day'>{$day}</div>";
        }

        // 填充空白
        for ($i = 0; $i < $firstWeekday; $i++) {
            echo "<div class='day'></div>";
        }

        // 顯示每一天
        for ($day = 1; $day <= $totalDays; $day++) {
            $currentDate = "$currentYear-$currentMonth-$day";
            $isToday = (date('Y-m-d') === $currentDate);
            $isWeekend = (date('w', strtotime($currentDate)) == 0 || date('w', strtotime($currentDate)) == 6);
            $class = 'day' . ($isToday ? ' today' : '') . ($isWeekend ? ' weekend' : '');
            echo "<div class='{$class}'>{$day}</div>";
        }
        ?>
    </div>
</body>
</html>