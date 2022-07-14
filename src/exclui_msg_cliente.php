<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$token = $_GET['id'];

$qryIncluir = "delete from msg_cliente where token = '$token'";
	$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysql_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	
?>
