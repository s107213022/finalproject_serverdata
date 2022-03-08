<?php
    $t1 = microtime(true);
    require("./model/dbconnect.php");
    $sql = "select * from programming";
    $result = mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    
    $sql = "update programming set grouping = 0 , group_leader = 0";
    $result = mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    
    $sql = "select * from programming where status = 1";
    $result = mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
    
    $size = 100;
    $Groupnum = $_GET['Groupnum']; //分幾組
    $data = array(); //size+1 , size+1
    for ($i= 0 ; $i < $size+1; $i++) {
        for ($j = 0; $j < $size+1; $j++){
            $data[$i][$j] = 0;
        }
    }
    $db = array();
    $w = 0;
    while ($row = mysqli_fetch_assoc($result)){
        $data[$row['x']][$row['y']] = 1;
        $db[$w][0] = $row['id'];
        $db[$w][1] = $row['x'];
        $db[$w][2] = $row['y'];
        $w++;
    }
    
    //echo "---------------------",'</br>';

    function run ($count, $Groupnum, $num, $sequence, $leadersave, $newleader, $idnumber, $recordnum, $Answer, $best){
        $checking = 0;
        while (array_diff($leadersave, $newleader) || array_diff($newleader, $leadersave)){ //如果兩個array元素不同時
            $leader = array();
            $member = array();
            $lea = 0;
            $mem = 0;
            for ($i = 0; $i < $count; $i++){
                if ($num[$i][3] == 7){
                    $leader[$lea][0] = $num[$i][0];//id
                    $leader[$lea][1] = $num[$i][1];//x
                    $leader[$lea][2] = $num[$i][2];//y
                    $leadersave[$lea] = $leader[$lea][0];
                    $lea++;
                }else{
                    $member[$mem][0] = $num[$i][0];//id
                    $member[$mem][1] = $num[$i][1];//x
                    $member[$mem][2] = $num[$i][2];//y
                    $mem++;
                }
            }
            
            $dis = array();
            for ($i = 0; $i < count($member); $i++){
                $dis[$i][0] = $member[$i][0];
                for ($j = 0; $j < count($leader); $j++){
                    $dis[$i][$j+1] = finddis($member[$i][1],$member[$i][2],$leader[$j][1],$leader[$j][2]);
                }
            }
            $Groupresult = array();
            for ($i = 0; $i < count($sequence); $i++){
                for ($j = 0; $j < $count-1; $j++){
                    $Groupresult[$i][$j] = 0;
                }
                $Groupresult[$i][0] = $leader[$i][0];
            }
            $Groupresult = findleader($Groupresult,$dis);
            $dismin = array();
            for ($i = 0; $i < count($Groupresult); $i++){
                for ($j = 0; $j < count($Groupresult[0]); $j++){
                    $dismin[$i][$j] = 0.0;
                }
            }
            for ($i = 0; $i < count($Groupresult); $i++){
                $numx = 0;
                $numy = 0;
                $tmp = 0;
                $avgx = 1.0;
                $avgy = 1.0;
                for ($j = 0; $j < count($Groupresult[0]); $j++){
                    if ($Groupresult[$i][$j] != 0){
                        $tmp = $tmp + 1;
                        $numx = $numx + $num[$Groupresult[$i][$j]-1][1];
                        $numy = $numy + $num[$Groupresult[$i][$j]-1][2];
                    }
                }
                $avgx = $numx/$tmp;
                $avgy = $numy/$tmp;
                
                for ($j = 0; $j < count($Groupresult[0]); $j++){
                    if ($Groupresult[$i][$j] != 0){
                        $dismin[$i][$j] = finddisfloat($num[$Groupresult[$i][$j]-1][1],$num[$Groupresult[$i][$j]-1][2],$avgx,$avgy);
                    }
                }
            }
            for ($h = 0; $h < count($dismin); $h++){
                for ($i = count($dismin[0])-1; $i >= 1; $i--){
                    $f = 0;
                    for ($j = 0; $j < $i; $j++){
                        if ($dismin[$h][$j] > $dismin[$h][$j+1]){
                            $temp = $dismin[$h][$j];
                            $dismin[$h][$j] = $dismin[$h][$j+1];
                            $dismin[$h][$j+1] = $temp;
                            $temp1 = $Groupresult[$h][$j];
                            $Groupresult[$h][$j] = $Groupresult[$h][$j+1];
                            $Groupresult[$h][$j+1] = $temp1;
                            $f = 1;
                        }
                    }
                    if ($f == 0)
                        break;
                }
            }
            for ($i = 0; $i < count($Groupresult); $i++){
                for ($j = 0; $j < count($Groupresult[$i]); $j++){
                    if ($Groupresult[$i][$j] != 0){
                        $num[$Groupresult[$i][$j]-1][3] = 8;
                        break;
                    }
                }
            }
            $a = 0;
            for ($i = 0; $i < $count; $i++) {
                if ($num[$i][3] == 7)
                    $num[$i][3] = 1;
                else if ($num[$i][3] == 8){
                    $num[$i][3] = 7;
                    $newleader[$a] = $num[$i][0];
                    $a++;
                }
                else
                    $num[$i][3] = 1;
            }
            //算各組人數
            $idnum = 0;
            for ($i =0 ; $i <count($Groupresult); $i++){
                $idnum = 0;
                for ($j =0 ; $j <count($Groupresult[$i]); $j++){
                    if($Groupresult[$i][$j] != 0){
                        $idnum++;
                    }
                }
                $idnumber[$i] = $idnum;
            }
            
            $maxcheck = 0;
            $mincheck = $count;
            for($i = 0; $i < count($idnumber); $i++){
                if($idnumber[$i] > $maxcheck)   // 判斷最大值
                    $maxcheck = $idnumber[$i];
                if($idnumber[$i] < $mincheck)   // 判斷最小值
                    $mincheck = $idnumber[$i];
            }
            $checking = $maxcheck - $mincheck;
            
            for ($i = 0; $i < count($Answer); $i++){//先清掉
                for ($j = 0; $j < count($Answer[$i]); $j++){
                    $Answer[$i][$j] = 0;
                }
            }
            for ($i = 0; $i < count($Groupresult); $i++){//在填入更新的結果
                for ($j = 0; $j < count($Groupresult[0]); $j++){
                    if ($Groupresult[$i][$j] != 0){
                        $Answer[$i][$j] = $Groupresult[$i][$j];
                    }
                }
            }
        }
        if ($checking < $recordnum){
            $recordnum = $checking;
            for ($i = 0; $i < count($Answer); $i++){
                for ($j = 0; $j < count($Answer[$i]); $j++){
                    $best[$i][$j] = $Answer[$i][$j];
                }
            }
        }
        return array($recordnum,$best);
    }
    /*function  printit($data,$size){
        $abc = 1;
        for ($i= 0 ; $i < $size+1; $i++) {
            for ($j = 0; $j < $size+1; $j++){
                echo $data[$i][$j]," ";
            }
            echo '</br>';
        }
    }*/
    function finddis($mx, $my, $lx, $ly){
        $dis = ($mx-$lx)*($mx-$lx)+($my-$ly)*($my-$ly);
        return $dis;
    }
    function finddisfloat($mx, $my, $lx, $ly){
        $dis = ($mx - $lx)*($mx - $lx)+($my - $ly)*($my - $ly);
        return $dis;
    }

    function findleader($Groupresult, $dis){
        for ($i = 0; $i < count($dis); $i++){
            $min = 100000;
            $t = -1;
            for ($j = 1; $j < count($dis[0]); $j++){
                if ($dis[$i][$j] <= $min){
                    $min = $dis[$i][$j];
                    $t = $j - 1;
                }
            }
            $Groupresult[$t][$i+1] = $dis[$i][0];
        }
        return $Groupresult;
    }
    
    $count = 0; //總人數
    //echo "people location",'</br>';
    //printit($data,$size);
    //計算總人數
    for ($i= 1 ; $i < count($data); $i++) {
        for ($j = 1; $j < count($data[0])-1; $j++){
            if ($data[$i][$j] != 0)
                $count = $count + 1;
        }
    }
    //echo'in classroom ',$count,'</br>';
    //echo '----------------------','</br>';
    $best = array(); //Groupnum , count
    for ($i = 0; $i < $Groupnum; $i++){
        for ($j = 0; $j < $count; $j++){
            $best[$i][$j] = 0;
        }
    }
    
    //------------------------------------------
    $loop = 100; //跑100次求較佳解
    //------------------------------------------
    
    $recordnum = $count - $Groupnum+1; //最大組別差值 = 總人數-組長數
    for ($a= 0 ; $a < $loop; $a++) {
        for ($i = 0; $i < count($data); $i++) {
            for ($j = 0; $j < count($data[$i]); $j++) {
                if ($data[$i][$j] != 0)
                    $data[$i][$j] = 1;
            }
        }
        $num = array(); //count , 4
        $t = 0;
        for ($i = 1; $i < count($data); $i++) {
            for ($j = 1; $j < count($data[$i]); $j++) {
                if ($data[$i][$j] != 0){
                    $num[$t][0] = $t+1;
                    $num[$t][1] = $i;
                    $num[$t][2] = $j;
                    $num[$t][3] = 1;
                    for ($k = 0; $k <count($db); $k++){
                        if ($i == $db[$k][1] && $j == $db[$k][2]){
                            $num[$t][4] = $db[$k][0];
                        }
                    }
                    $t++;
                }
            }
        }
        
        $sequence = array();
        $test = false;
        for ($i = 0; $i < $Groupnum; $i++){
            do{
                $sequence[$i] = rand(1, $count);
                $test = false;
                for ($j = 0; $j < $i; $j++){
                    if ($sequence[$i] == $sequence[$j]){
                        $test = true;
                        break;
                    }
                }
            }while ($test == true);
        }
        for ($i = 0; $i < count($sequence); $i++) {
            for ($j = 0; $j < $count; $j++){
                if ($sequence[$i] == $num[$j][0]){
                    $data[$num[$j][1]][$num[$j][2]] = 7;
                    $num[$j][3] = 7;
                }
            }
        }
        
        
        $leadersave = array();//舊組長
        $newleader = array();//新組長
        $idnumber = array();//當前每組人數
        for ($i = 0; $i < count($sequence); $i++){
            $leadersave[$i] = 0;
            $newleader[$i] = 1;
            $idnumber[$i] = 0;
        }
        
        
        $Answer = array();//分組
        for ($i = 0; $i < count($sequence); $i++){
            for ($j = 0; $j < $count-1; $j++){
                $Answer[$i][$j] = 0;
            }
        }
        list($recordnum , $best) = run($count, $Groupnum, $num, $sequence, $leadersave, $newleader, $idnumber, $recordnum, $Answer, $best);
        //echo "Min difference ",$recordnum,'</br>';
    }
    for ($i = 0; $i < count($best); $i++){
        for ($j = 0; $j < count($best[$i]); $j++){
            if ($best[$i][$j] != 0){
                //echo $best[$i][$j]," ";
            }
        }
        //echo '</br>';
    }
    //echo '----------------------','</br>';
    /*
    for ($i = 0; $i < count($num); $i++) {
        for ($j = 0; $j < count($num[$i]); $j++) {
            echo $num[$i][$j]," ";
        }
        echo '</br>';
    }
    echo '----------------------','</br>';
    */
    for ($i = 0; $i < count($best); $i++){
        //echo "Group",($i+1),": ";
        for ($j = 0; $j < count($best[$i]); $j++){
            for ($k = 0; $k < count($num); $k++){
                if ($best[$i][$j] == $num[$k][0]){
                    //echo $num[$k][4]," ";
                    $tmp = $num[$k][4];
                    $sql = "update programming set grouping = ($i+1) where id = $tmp";
                    mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
                }
            }
        }
        //echo '</br>';
    }
    
    for ($i = 0; $i < count($best); $i++){
        //echo "Group leader",($i+1),": ";
        $count = 0;
        for ($j = 0; $j < count($best[$i]); $j++){
            if ($best[$i][$j] != 0){
                $count++;
                if ($count == 1){
                    for ($k = 0; $k < count($num); $k++){
                        if ($best[$i][$j] == $num[$k][0]){
                            //echo $num[$k][4]," ";
                            $tmp = $num[$k][4];
                            $sql = "update programming set group_leader = 1 where id = $tmp";
                            mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
                        }
                    }
                }
            }
        }
        //echo '</br>';
    }
    $t2 = microtime(true);
    //echo ($t2-$t1);
?>

<?php
    require("./model/userModel.php");
    $data = get_group_leader();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap">

    </head>
    <body class="#c8e6c9 green lighten-4">
        <div class="container">
            <div class="row">
              <nav class="nav-wrapper black" style="height:150px">
                <div class="col s12" style="text-align:center">
                  <h3 style= "font-size:50px; font-family:Noto Sans TC,sans-serif;">組長名單</h3>
                </div>
              </nav>
            </div>
            <div class="row"> 
                <table class="striped">
                    <tr>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">系級</th>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">學號</th>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">姓名</th>
                        <th style="text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;">組別</th>
                    </tr>
                    <?php
                        foreach($data as $row){
                            echo"<tr>";
                            foreach($row as $key => $value){
                                echo "<td style='text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;'>" . $value . "</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col s3">
                        <a style="width: 90%;height:50px; text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;"  class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text" href="./group.php"><h6>上一步</h6></a>
                    </div>
                    <div class="col s3">
                        <a style="width: 90%;height:50px; text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif;border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;"  class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text" href="./teacher.php"><h6>回到主畫面</h6></a>
                    </div>

                    <div class="col s3">
                        <a style="width: 90%;height:50px; text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text " href="./get_student_group.php"><h6>查看分組名單</h6></a>
                    </div>

                    <div class="col s3">
                        <a style="width: 90%;height:50px; text-align:center; font-size:20px;font-family:Noto Sans TC,sans-serif; border-radius:25px; box-shadow: 0px 10px 5px -2px rgba(0,0,0,0.3), 0px 1px 2px 3px rgba(0,0,0,0.3) inset;" class="btn waves-effect col s6 offset-m4 m4 blue-grey lighten-4 black-text" href="http://3.229.31.138/chatroom/index02.php?n=teacher" target="_blank"><h6>聊天室</h6></a>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>