<?php   
$db_ad ="localhost";
$db_user ="root";
$db_pass="";
$db_name="www";
$con = @mysqli_connect($db_ad,$db_user,$db_pass)or die ("Can not connect MySQL");
mysqli_select_db($con,$db_name)or die ("Can not connect database");
 mysql_query("set name utf8");   
 

	 

?>


