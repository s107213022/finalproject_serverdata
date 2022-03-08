<?php
    function rssi($rssi){
        $s = 29;
        $plusR = (abs($rssi) - 59)/$s;
        $d = pow(10,$plusR);
        $dist = round($d*100) /100;
        return $dist;
    }
    require("dbconnect.php"); 
    $account = $_GET['a'];
    $password = $_GET['p'];
    htmlspecialchars($password);
    htmlspecialchars($account);
    $rssia = $_GET['rssia'];
    $rssib = $_GET['rssib'];
    $dista = rssi($rssia);
    $distb = rssi($rssib);
    $BT = round($dista,1);
    $BT = $BT * 10;
    $CT = round($distb,1);
    $CT = $CT * 10;
    $size = 7.8*10;
    $data = array();
    $data[0][$size/2] = 1;
    $data[$size][0] = 1;
    $data[$size][$size] = 1;
    $size2 = 7.8 * 10;
    if(($BT + $CT) >= $size) {
        $Ty = round((($BT * $BT)-($CT * $CT)+($size * $size))/(2 * $size));
        $Tx = $size2 - round(pow(($BT * $BT)-($Ty * $Ty),0.5));
        echo $Tx;
        echo $Ty;
        if (($Tx <= $size) and ($Tx > 0) and ($Ty <= $size) and ($Ty > 0)){
            if($data[$Tx][$Ty] != 0){
                $T = $data[$Tx][$Ty] + 1;
                $data[$Tx][$Ty] = $T;
            }else{
                $data[$Tx][$Ty] = 1;
            }
            $sql = "update `programming` set x = $Tx, y = $Ty, status = 1 where `password` = '$password' and `account` = '$account';";
            mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
            echo "成功定位完成";
            //System.out.println("目標:("+Tx+","+Ty+")");
        }
    }
?>