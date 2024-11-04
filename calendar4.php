<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;

        }
        td{
                       
            border: 1px solid #333;            
            padding: 1px 1x;
            vertical-align: top;            

        }
        
        .week_holiday{
            background:blue;
            color:red;
            font-weight: bold;
            text-align:center;
            font-size: 24px;
             
            


        }
        .week_workday{

            background:blue;
            color:white;
            font-weight: bold;
            text-align:center;
            font-size: 24px;
             
        }        
                    


        .holi_day{
            

            width: 150px; /* 固定宽度 */
            height: 100px; /* 固定高度 */
            color:red;

            

        }
        .wrork_day{
            
            width: 150px; /* 固定宽度 */
            height: 100px; /* 固定高度 */
            color:black;
            vertical-align: bottom; 
            

        }        

        .stock{
            text-align: left;
            font-weight: bold; /* 设置为粗体 */
            font-size: 12px; /* 设置字体大小为16像素 */
            color:black;
             
        }
        .taiwan_day{
            text-align: left;
            font-weight: bold; /* 设置为粗体 */
            font-size: 12px; /* 设置字体大小为16像素 */
            color:black;
            vertical-align: bottom; 

             
        }    
        .taiwan_holiday{
            text-align: left;
            font-weight: bold; /* 设置为粗体 */
            font-size: 12px; /* 设置字体大小为16像素 */
            color:red;
            vertical-align: bottom; 

             
        }              
        

        .holiday  {
            text-align: right;
//            background: pink;
            color:red;
            font-size: 20px;
            


        }

        .gray {
            text-align: right;
            color:gray;
            font-size: 20px;
            
            
        }

        .today {
            text-align: right;
            background: blue;
            color: white
            font-size: 20px;
 
        }
        .normal {
            text-align: right;
        }
    </style>
</head>

<body>

    <?php

    $spDate=[

    // '2024-11-07'=>"立冬",
    // '2024-06-10' => "端午節",
    // '2024-09-17' => "中秋節",
    // '2025-06-20' => "端午節",
    // '2025-09-27' => "中秋節",
    // '2026-06-30' => "端午節",
    // '2026-10-07' => "中秋節",
    // '2024-11-22'=>'小雪'
    ];
    $holidays = [
    // '01-01' => "元旦",
    // '02-10' => "農曆新年",
    // '04-04' => "兒童節",
    // '04-05' => "清明節",
    // '05-01' => "勞動節",
    // '10-10' => "國慶日"
    ];

    if(isset($_GET['month'])&&isset($_GET['year']))
    {
        $cumon=(int)$_GET['month'];
        $cuyear=(int)$_GET['year'];
        if($cumon>12) 
        {
            $cumon=$cumon-12;
            $cuyear++;
        }
        else if($cumon<1)
        {
            $cumon=$cumon+12;
            $cuyear--;  
        }
        $fday=new datetime("$cuyear-$cumon-1");
        $today=new datetime();
        
    }
    else
    {
        $fday=new datetime("First day of this month");
        $today=new datetime();
        $cuyear=$fday->format("Y");
        $cumon=$fday->format("m");        

    }

?>
    <h1>
        <?=$cuyear;?>年
        <?=$cumon;?>月
    </h1>
    <a href="calendar4.php?month=<?=$cumon;?>&year=<?=$cuyear-1;?>">前一年 </a>
    <a href="calendar4.php?month=<?=$cumon-1;?>&year=<?=$cuyear;?>">前一月 </a>
    <a href="calendar4.php?month=<?=$cumon+1;?>&year=<?=$cuyear;?>">後一月 </a>
    <a href="calendar4.php?month=<?=$cumon;?>&year=<?=$cuyear+1;?>">後一年</a>



    <table>
        <tr>
            <td class='week_holiday'>SUN</td>
            <td class='week_workday'>MON</td>
            <td class='week_workday'>TUS</td>
            <td class='week_workday'>WED</td>
            <td class='week_workday'>THU</td>
            <td class='week_workday'>FRI</td>
            <td class='week_holiday'>SAT </td>
        </tr>



    <?php
   

    $stock_run=0;
    $taiwan_calendar=1;
    $lunar_calenadar=2;

    $run_day= clone $fday;
    $shday= $run_day->format("w");        

    if($lunar_calenadar==2)
    {
          require 'lunar2.php';

    }

        use com\nlf\calendar\LunarYear;
        use com\nlf\calendar\util\HolidayUtil;
        use com\nlf\calendar\Lunar;
        use com\nlf\calendar\Solar;
        use com\nlf\calendar\Foto;
    
        // 其他代码，确保使用类前已加载

      
         
        //$Lunar2 = new Lunar();
        


    if($shday!=0)
    {
        $run_day->modify("-$shday days");
    }
 
    if($lunar_calenadar==1)
    {
        include "lunar.php";    
        $Lunar = new Lunar();
        
    }

    

    if($taiwan_calendar==1)
    {
        $urlstart=$run_day->format("Y");
        $httpstr='https://cdn.jsdelivr.net/gh/ruyut/TaiwanCalendar/data/'.$urlstart.'.json';
        //echo "str:".$httpstr;
        

        // 初始化 cURL
        $crul_data = curl_init($httpstr);
    
        // 設置 cURL 選項
        curl_setopt($crul_data, CURLOPT_RETURNTRANSFER, true); // 返回內容而非輸出
        curl_setopt($crul_data, CURLOPT_FOLLOWLOCATION, true); // 跟隨重定向
    
        // 執行請求
        $jsonString = curl_exec($crul_data);
        $data_day = json_decode($jsonString, true);
        
      
        // for ($i=0; $i < 50; $i++) { 
        //     echo $data_day[$i]['description']."<br>";
        // }

        // echo "<pre>";
        // print_r($data_day);
        // echo "</pre>";
            

    }

       // https://cdn.jsdelivr.net/gh/ruyut/TaiwanCalendar/data/ 


        if($stock_run==1)
        {
            $urlstart=$run_day->format("Ymd");
            $the_monthend_day =clone $run_day;
            $the_monthend_day->modify("42 days");
            $urlend=$the_monthend_day->format("Ymd");
            $httpstr='https://www.twse.com.tw/exchangeReport/TWT49U?response=html&strDate='.$urlstart.'&endDate='.$urlend;
            //echo "str:".$httpstr;
            
            // 初始化 cURL
            $twse_data = curl_init($httpstr);
        
            // 設置 cURL 選項
            curl_setopt($twse_data, CURLOPT_RETURNTRANSFER, true); // 返回內容而非輸出
            curl_setopt($twse_data, CURLOPT_FOLLOWLOCATION, true); // 跟隨重定向
        
            // 執行請求
            $response = curl_exec($twse_data);
            $dom = new DOMDocument;
            libxml_use_internal_errors(true);
            $dom->loadHTML($response);
            libxml_clear_errors();
            
            $datadom= new DOMXPath($dom);
        
            $rows = $datadom->query('//tr');            

        }

        
     //to do
     For ($i=0; $i < 6; $i++) { 
        echo"<tr>";
        for ($wday=0; $wday < 7; $wday++) { 
            $hday=($wday==0 || $wday==6)?"holiday ":"";
            $tdhday=($wday==0 || $wday==6)?"holi_day ":"wrork_day ";

            $tday=($run_day->format("Y-m-d")===$today->format("Y-m-d"))?"today ":"";
            $normalday="normal ";
            
            //echo "<td>";


            if($taiwan_calendar==1)        
                {
                    if(!$hday)
                    {
                        $dayOfYear = (int)$run_day->format('z');    

                        $hday=(($data_day[$dayOfYear]['isHoliday']===true)&&($data_day[$dayOfYear]['description']))?"holiday ":"";
                    } 
                }
                if(!$hday)
                $gday=($run_day->format("Y-m")!=$fday->format("Y-m"))?"gray ":"";
            else
                $gday="";                
            echo "<td class='".$tdhday."'>";            
            echo "<div class='".$normalday.$gday.$hday.$tday."'>".$run_day->Format('j')."</div>";

            if(isset($spDate[$run_day->format("Y-m-d")]))
                echo $spDate[$run_day->format("Y-m-d")];
            if(isset($spDate[$run_day->format("m-d")]))
                echo $spDate[$run_day->format("m-d")];

                if($lunar_calenadar==1)
                {
                    $ly=$run_day->format("Y");
                    $lm=$run_day->format("m");
                    $ld=$run_day->format("d");
                    $lunar_data = $Lunar->convertSolarToLunar($ly,$lm,$ld);
                    echo "<div class='"."taiwan_day"."'>";
                    echo $lunar_data[1].$lunar_data[2];
                    echo "<div>";                    
                    
                } 
                else if($lunar_calenadar==2)
                {
                    $ly=$run_day->format("Y");
                    $lm=$run_day->format("m");
                    $ld=$run_day->format("d");
                    $solar = Solar::fromYmd("$ly", "$lm", "$ld");

                    $lunar = Lunar::fromYmd("$ly", "$lm", "$ld");

                    $jieQi = $lunar->getJieQi();
                    
                    //$Lunar2 ::fromDate($run_day);
                    // $solar = Solar::fromDate($run_day);
                    // echo $solar->getLunar()->toString() . "\n";
                    $lm=$solar->getLunar()->getMonthInChinese() ;
                    $ld=$solar->getLunar()->getDayInChinese();

                    // echo $solar->getLunar()->getMonthInChinese() . "\n";
                    // echo $solar->getLunar()->getDayInChinese() . "\n";
                    echo "<div class='"."taiwan_day"."'>";
                    if($ld=='初一')
                    {
                        echo $lm.'月'.$ld.$jieQi;
                    }
                    else{
                        echo $ld.$jieQi;
                    }
                    echo "<div>";          
                    
                    
                                       
                    
                }                                

                if($taiwan_calendar==1)
                {
                    $dayOfYear = (int)$run_day->format('z');    
                    if((($data_day[$dayOfYear]['isHoliday']===true)&&($data_day[$dayOfYear]['description'])))   
                        echo "<div class='"."taiwan_holiday"."'>";
                    else
                        echo "<div class='"."taiwan_day"."'>";


                    echo $data_day[$dayOfYear]['description'];
                    echo "<div>";
                }

                if($stock_run==1)
                {
                $t_year=(int)$run_day->format("Y")-1911;
                $taiwan_date=$t_year."年".$run_day->format("m")."月".$run_day->format("d")."日";
                //echo $taiwan_date;

                    
        
                echo "<div class='"."stock"."'>";
                foreach ($rows as $row) {
                    // 獲取該行的所有 <td> 標籤
                    $cells = $row->getElementsByTagName('td');
                    
                    // 檢查該行是否有至少兩個 <td>
                    
                    if ($cells->length >= 5) {
                        
                        // 如果第一個 <td> 是 "name"，則獲取第二個 <td>
                        if ($cells->item(0)->nodeValue === $taiwan_date) {
                            $idValue = $cells->item(1)->nodeValue;
                            if(strlen($idValue)==4)
                            echo $cells->item(2)->nodeValue.",";
                        }
                        
                    }
                    
                }  
                     
                echo "</div>";
            }  
            echo "</td>";
 
            $run_day->modify("+1 days");

        }

        echo"</tr>";
        
     }

    ?>
    </table>
</body>

</html>