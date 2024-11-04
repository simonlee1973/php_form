<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表格示例</title>
    <style>
        table {
            width: 100%; /* 表格寬度 */
            border-collapse: collapse; /* 合併邊框 */
        }
        td {
            border: 1px solid #ccc; /* 單元格邊框 */
            padding: 10px; /* 增加內邊距 */
            vertical-align: top; /* 內容靠上對齊 */
            position: relative; /* 使子元素可以使用絕對定位 */
        }
        .top-right {
            position: absolute;
            top: 0; /* 靠上 */
            right: 0; /* 靠右 */
            padding: 5px; /* 增加內邊距 */
            background-color: rgba(255, 255, 255, 0.8); /* 背景顏色 */
        }
        .bottom-left {
            position: absolute;
            bottom: 0; /* 靠下 */
            left: 0; /* 靠左 */
            padding: 5px; /* 增加內邊距 */
            background-color: rgba(255, 255, 255, 0.8); /* 背景顏色 */
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <td>
                <div class="top-right">右上角文字</div>
                <div class="bottom-left">左下角文字</div>
            </td>
            <td>
                <div class="top-right">右上角文字</div>
                <div class="bottom-left">左下角文字</div>
            </td>
            <td>
                <div class="top-right">右上角文字</div>
                <div class="bottom-left">左下角文字</div>
            </td>
            <td>
                <div class="top-right">右上角文字</div>
                <div class="bottom-left">左下角文字</div>
            </td>
            <td>
                <div class="top-right">右上角文字</div>
                <div class="bottom-left">左下角文字</div>
            </td>
            <td>
                <div class="top-right">右上角文字</div>
                <div class="bottom-left">左下角文字</div>
            </td>
            <td>
                <div class="top-right">右上角文字</div>
                <div class="bottom-left">左下角文字</div>
            </td>
        </tr>
        <tr>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
        </tr>
        <!-- 重複添加更多行 -->
        <tr>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
        </tr>
        <tr>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
        </tr>
        <tr>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
        </tr>
        <tr>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
            <td>其他內容</td>
        </tr>
    </table>

</body>
</html>