<?php
session_start();

// 初始化記事
if (!isset($_SESSION['events'])) {
    $_SESSION['events'] = [];
}

// 處理表單提交
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'], $_POST['event'])) {
    $date = $_POST['date'];
    $event = $_POST['event'];
    $_SESSION['events'][$date][] = $event;
}

// 取得當前年份和月份
$year = date('Y');
$month = date('m');

// 生成萬年曆
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
$firstDay = date('w', strtotime("$year-$month-01"));

?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>萬年曆</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            position: relative; /* 讓子元素定位 */
        }
        .event-tooltip {
            display: none;
            position: absolute;
            background: #f9f9f9;
            border: 1px solid #ccc;
            padding: 5px;
            z-index: 10;
            width: 150px;
            left: 0;
            top: 100%;
        }
    </style>
    <script>
        function showTooltip(element) {
            const tooltip = element.querySelector('.event-tooltip');
            if (tooltip) {
                tooltip.style.display = 'block';
            }
        }

        function hideTooltip(element) {
            const tooltip = element.querySelector('.event-tooltip');
            if (tooltip) {
                tooltip.style.display = 'none';
            }
        }
    </script>
</head>
<body>

<h1><?php echo $year . '年 ' . $month . '月'; ?></h1>
<table>
    <tr>
        <th>日</th>
        <th>一</th>
        <th>二</th>
        <th>三</th>
        <th>四</th>
        <th>五</th>
        <th>六</th>
    </tr>
    <tr>
        <?php
        // 繪製空格
        for ($i = 0; $i < $firstDay; $i++) {
            echo "<td></td>";
        }

        // 繪製日期
        for ($day = 1; $day <= $daysInMonth; $day++) {
            if (($day + $firstDay - 1) % 7 === 0 && $day > 1) {
                echo "</tr><tr>";
            }
            $date = "$year-$month-$day";
            echo "<td onmouseover='showTooltip(this)' onmouseout='hideTooltip(this)'>$day";

            // 顯示記事
            if (isset($_SESSION['events'][$date])) {
                echo "<div class='event-tooltip'>";
                foreach ($_SESSION['events'][$date] as $event) {
                    echo "<div>$event</div>";
                }
                echo "</div>";
            }

            echo "</td>";
        }
        ?>
    </tr>
</table>

<h2>新增記事</h2>
<form method="POST">
    <label for="date">日期 (YYYY-MM-DD): </label>
    <input type="date" name="date" required>
    <br>
    <label for="event">記事: </label>
    <input type="text" name="event" required>
    <br>
    <input type="submit" value="新增">
</form>

</body>
</html>