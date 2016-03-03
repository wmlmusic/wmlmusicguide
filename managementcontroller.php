<?php
    //MySQL Database Connect
    include_once('datalogin.php');

    function getmanagement($genre){
        $valid  = false;
        $arr    = array();
        $i      = 0;

        $result = mysql_query("SELECT *  FROM contact_info where genre='".$genre."'");
        while($row = mysql_fetch_array($result)){
            for($j=0;$j<44;$j++){
                $arr[$i][$j]=$row[$j];
            }
            $i++;
        }
        return $arr;
    }

?>