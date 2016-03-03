
<?php


$vtype=$_POST['type'];
$vfunction=$_POST['function'];

$vsorttype=$_POST['sorttype'];
//$vtype='Dancehall, Pop, R&B';

$arr=array();


if($vfunction=="contact_info")
$arr=getcontactinfo($vtype,$vsorttype);
else
$arr=getsociallinks($vtype);

echo json_encode($arr);

function getcontactinfo($type,$sorttype){
 $con = mysql_connect("localhost","root","");
    $valid=false;
     $arr=array();
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("wmldatabase", $con);

    if($type=="RnB")
    $type="R&B";

    if($type=="wms")
    {
        $result = mysql_query("SELECT * FROM contact_info  order by ".$sorttype." ASC");

    }
    else
    if($type=="Music" || $type=="Entertainment" || $type=="Music/Entertainment")
    {

      $result = mysql_query("SELECT * FROM contact_info where Category like '%".$type."%'  order by ".$sorttype." ASC");



    }
    else
    {
    $result = mysql_query("SELECT * FROM contact_info where tabname like '%".$type."%' order by ".$sorttype." ASC");
    }
    $i=0;
  while($row= mysql_fetch_array($result))
    {

        for($j=0;$j<44;$j++)
        {
        $arr[$i][$j]=$row[$j];


        }
    $i++;
    }

    mysql_close($con);
    return $arr;
}

     function getsociallinks($type){
$con = mysql_connect("localhost","wmldatabase","Worlddata14!");
    $valid=false;
     $arr=array();
    if (!$con)
        die('Could not connect: ' . mysql_error());

    mysql_select_db("wmldatabase", $con);


    if($type=="wms")
    {
        $result = mysql_query("SELECT * FROM social_links ");

    }
    else
    {



    $result = mysql_query("SELECT * FROM social_links where tabname like '%".$type."%'");
    }
    $i=0;
  while($row= mysql_fetch_array($result))
    {

        for($j=0;$j<30;$j++)
        {
        $arr[$i][$j]=$row[$j];


        }
    $i++;
    }

    mysql_close($con);
    return $arr;
}

?>