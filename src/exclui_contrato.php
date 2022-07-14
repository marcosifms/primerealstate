<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = $_POST['id'];

	
		$qryIncluir = "delete from contratos where id_contrato = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysql_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	
?>
