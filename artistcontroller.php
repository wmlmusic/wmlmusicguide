<?php
    //MySQL Database Connect
    include_once('datalogin.php');
    function getartist($management){
        $valid  = false;
        $arr    = array();
        $i      = 0;
        $result = mysql_query("SELECT *  FROM contact_info where Management='".$management."' or company ='".$management."'");
        while($row= mysql_fetch_array($result)){
            for($j=0;$j<44;$j++){
                $arr[$i][$j]=$row[$j];
            }
            $i++;
        }
        // echo "<pre>"; print_r($arr);exit;
        return $arr;
    }

?>