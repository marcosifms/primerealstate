<?php
header("Content-type: text/html; charset=utf-8");

//include "../valida_session.php";
include "../include/config.php";
$hoje = date('Y/m/d');

$sqlcx = mysqli_query($con, "SELECT * FROM msg_cliente WHERE expira_msg < '$hoje'");

while($row=mysqli_fetch_array($sqlcx)){
	$id_msg = $row['id_msg'];

	$query2 = mysqli_query($con,"delete from msg_cliente where id_msg='$id_msg'");
}



	
?>
