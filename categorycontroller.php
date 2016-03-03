<?php
    //MySQL Database Connect
    include_once('datalogin.php');
    
    function getgenres($cat){
        $valid  = false;
        $arr    = array();
        $i      = 0;

        $result = mysql_query("SELECT distinct genre FROM contact_info where category='".$cat."'");
        while($row = mysql_fetch_array($result)){
            $arr[$i] = $row['genre'];
            $i++;
        }
        return $arr;
    }

?>