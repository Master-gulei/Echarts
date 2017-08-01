<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
include "jsondy.php";
$id = $_GET['id'];


$server_name="localhost:3306"; 

$username="root";

$password=""; 

$mysql_database="bridge"; 


$link=mysql_connect($server_name, $username, $password); 

mysql_query("set names latin1");


$psql="SELECT DISTINCT p_starttime from t_realtime
where Data_Type=3 ORDER BY p_starttime DESC limit 1,1";
$j=mysql_db_query($mysql_database, $psql, $link); 
$count=mysql_fetch_assoc($j);
$p=$count['p_starttime'];

$left;$right;

$c1=count($an);
$c2=count($bn);


for($i=0;$i<$c1;$i++){
	$leftsql="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=".$sa[$i]." and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result1=mysql_db_query($mysql_database, $leftsql, $link);
	$infor1=mysql_fetch_array($result1);
      $left[$i]=$infor1['Data'];
	
}

for($i=0;$i<$c2;$i++){
	$rightsql="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=".$sb[$i]." and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result2=mysql_db_query($mysql_database, $rightsql, $link);
	$infor2=mysql_fetch_array($result2);
      $right[$i]=$infor2['Data'];
	
}


/* $leftsql1="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=57 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result1=mysql_db_query($mysql_database, $leftsql1, $link);

$leftsql2="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=58 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result2=mysql_db_query($mysql_database, $leftsql2, $link);

$leftsql3="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=59 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result3=mysql_db_query($mysql_database, $leftsql3, $link); 

$leftsql4="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=60 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result4=mysql_db_query($mysql_database, $leftsql4, $link);

$leftsql5="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=61 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result5=mysql_db_query($mysql_database, $leftsql5, $link);


$infor1=mysql_fetch_array($result1);
      $left["C5"]=$infor1['Data'];
$infor2=mysql_fetch_array($result2);
      $left["B9"]=$infor2['Data'];    
$infor3=mysql_fetch_array($result3);
      $left["BA"]=$infor3['Data'];
$infor4=mysql_fetch_array($result4);
      $left["A6"]=$infor4['Data'];
$infor5=mysql_fetch_array($result5);
      $left["D2"]=$infor5['Data']; */



/* $rightsql1="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=62 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result6=mysql_db_query($mysql_database, $rightsql1, $link);

$rightsql2="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=63 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result7=mysql_db_query($mysql_database, $rightsql2, $link);

$rightsql3="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=64 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result8=mysql_db_query($mysql_database, $rightsql3, $link); 

$rightsql4="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=65 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result9=mysql_db_query($mysql_database, $rightsql4, $link);

$rightsql5="select Mesure_Time,Data from T_Realtime_State where  p_starttime<='".$p."' and T_Realtime_State.Sensor_ID=66 and T_Realtime_State.Data_type=3 order by Mesure_Time desc limit 0, 1" ;
$result0=mysql_db_query($mysql_database, $rightsql5, $link);


$infor6=mysql_fetch_array($result6);
      $right["B6"]=$infor6['Data'];
$infor7=mysql_fetch_array($result7);
      $right["F0"]=$infor7['Data'];    
$infor8=mysql_fetch_array($result8);
      $right["B1"]=$infor8['Data'];
$infor9=mysql_fetch_array($result9);
      $right["C6"]=$infor9['Data'];
$infor0=mysql_fetch_array($result0);
      $right["E8"]=$infor0['Data'];
 */



$data['left']=$left;
$data['right']=$right;


//print_r($data);

echo json_encode ($data);


mysql_free_result($result1);
mysql_free_result($result2);

mysql_close($link);  

?> 
