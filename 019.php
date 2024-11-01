<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>視頻和滾動文字示範</title>
    <style>
        form {
            text-align: center;
        }

        table {
            width: 80%;
            /* 調整表格寬度 */
            margin: auto;
            border-collapse: collapse;
            /* 合併邊框 */
        }

        td {
            //border: 1px solid #000; /* 單元格邊框 */
            height: 450px;
            /* 調整單元格高度 */
            position: relative;
            /* 使單元格內部的元素相對定位 */
            overflow: hidden;
            /* 隱藏超出單元格的內容 */
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            /* 漸變背景 */
        }

        iframe {
            width: 100%;
            /* 寬度自適應 */
            height: 90vh;
            /* 高度為視口高度的80% */
            border: none;
            /* 去掉邊框 */
        }

        #photo {
            display: block;
            /* 顯示照片 */
            margin: auto;
            max-width: 100%;
            /* 使照片自適應 */
            height: auto;
        }

        #content {
            display: none;
            /* 初始隱藏內容 */
        }

        iframe {
            width: 100%;
            /* 使視頻自適應單元格寬度 */
            height: 100%;
            /* 使視頻自適應單元格高度 */
        }

        .scrolling-text {
            position: absolute;
            bottom: 0;
            /* 從底部開始 */
            width: 100%;
            color: blue;
            /* 文字顏色 */
            text-align: center;
            /* 文字居中 */
            font-size: 24px;
            /* 文字大小 */
            animation: scroll 200s linear infinite;
            /* 動畫設定 */
        }

        @keyframes scroll {
            0% {
                transform: translateY(100%);
                /* 從單元格底部開始 */
            }

            100% {
                transform: translateY(-100%);
                /* 滾動到單元格頂部 */
            }
        }

        h2 {
            text-align: center;
            /* 置中顯示 */
        }
    </style>
</head>


<body>

    <?php

    if (isset($_GET['Songnumber']) ) {
        $songidx = (int)$_GET['Songnumber'];
          if($songidx>1)
        {
            $songidx=0;

    
        }
        else if($songidx<0)
        {
            $songidx+=1;
            
    
        }
            
    
        
    } else {
        $songidx=0;
    }
           
    $Singer=["程响-可能",
            "程响-人间烟火"
    
    ];
    $web=[ "https://www.bilibili.com/video/BV1AM4y1Y77v/",
           "https://www.bilibili.com/video/BV1ws4y117Ex/"
           ];
    ?>



    <!-- <img id="photo" src="https://i.ytimg.com/vi/aFMBAQi55DU/maxresdefault.jpg" alt="展示照片" /> 替換為你的圖片網址 -->
    <h2>宁缺作词、作曲， 主唱:程响</h2>
    <!-- <div id="content"> -->
    <div>

        <table>
            <tr>
                <td>
                <iframe width="800" height="700" src="<?=$web[$songidx]; ?>"
                        title="YouTube video player" frameborder="0" allowfullscreen="true"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <!-- <iframe width="800" height="700" src="https://www.bilibili.com/video/BV1AM4y1Y77v/"
                        title="YouTube video player" frameborder="0" allowfullscreen="true"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->

                </td>
                <td style="height: 450px; width: 400px;"> <!-- 調整文字單元格的寬度 -->
                    <div class="scrolling-text">
                        可能<br> 主唱"程响 <br> <br> <br>
                        可能南方的陽光 照著北方的風<br> <br>
                        可能時光被吹走 從此無影無踪<br> <br>
                        可能故事只剩下 一個難忘的人<br> <br>
                        可能在昨夜夢裡 依然笑得純真<br> <br>
                        可能北京的後海 許多漂泊的魂<br> <br>
                        可能成都小酒館 有群孤獨的人<br> <br>
                        可能枕邊有微笑 才能暖你清晨<br> <br>
                        可能夜空有流星 才能照你前行<br> <br>
                        可能西安城牆上 有人誓言不分<br> <br>
                        可能要去到大理 才算愛得認真<br> <br>
                        可能誰說要陪你 牽手走完一生<br> <br>
                        可能笑著流出淚 某天在某時辰<br> <br>

                        可能桂林有漁船 為你迷茫點燈<br> <br>
                        可能在呼倫草原 牛羊流成風景<br> <br>
                        可能再也找不到 願意相信的人<br> <br>
                        可能穿越了徬徨 腳步才能堅定<br> <br>
                        可能武當山道上 有人虔誠攀登<br> <br>
                        可能周莊小巷裡 忽然忘掉年輪<br> <br>
                        可能要多年以後 才能看清曾經<br> <br>
                        可能在當時身邊 有雙溫柔眼晴<br> <br>
                        可能西安城牆上 有人誓言不分<br> <br>
                        可能要去到大理 才算愛得認真<br> <br>
                        可能誰說要陪你 牽手走完一生<br> <br>
                        可能笑著流出淚<br> <br>
                        可能終於有一天 剛好遇見愛情<br> <br>
                        可能永遠在路上 有人奮鬥前行<br> <br>
                        可能一切的可能 相信才有可能<br> <br>
                        可能擁有過夢想 才能叫做青春<br> <br>

                    </div>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>

            </tr>
        </table>
    </div>
    <!-- <script>
        3秒後切換顯示內容
        setTimeout(() => {
            document.getElementById('photo').style.display = 'none'; // 隱藏照片
            document.getElementById('content').style.display = 'block'; // 顯示內容
        }, 500);
    </script> -->


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">


        <a href="./可能.txt" download="可能.txt">點擊這裡下載歌詞檔案</a>
        <h2>價格:300</h2>

        <a href="019.html?songs=<?php echo $currentsong ; ?>&Songnumber=<?php echo $songidx-1; ?>">上一張 </a>
        <input type="hidden" name="value" value="300">
        <input type="submit" value=" 訂購 ">
        <a href="019.html?songs=<?php echo $currentsong ; ?>&Songnumber=<?php echo $songidx+1; ?>">下一張 </a>

    </form>

</body>

</html>