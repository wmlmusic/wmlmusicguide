<?php
    //MySQL Database Connect
    include_once('datalogin.php');
    
    function getcategories(){
        $valid  = false;
        $arr    = array();

        $result = mysql_query("SELECT DISTINCT category FROM contact_info WHERE category != ''");
        $i = 0;
        while($row = mysql_fetch_array($result)){
            $arr[$i] = $row['category'];
            $i++;
        }
        return $arr;
    }

    function getcategorydata($catarr){
        $valid = false;
        $arr = array();

        for ($i = 0; $i < count($catarr); $i++){
            $result = mysql_query("SELECT * FROM contact_info where category = '".$catarr[$i]."' Limit 1");

            while($row = mysql_fetch_array($result)){
                for($j = 0;$j < 44; $j++){
                    $arr[$i][$j] = $row[$j];
                }
            }
        }
        // echo "<pre>";
        // print_r($arr);exit;
        return $arr;
    }