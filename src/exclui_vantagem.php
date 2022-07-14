<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];



		$qryIncluir = "delete from vantagens where id_vantagem = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());
	   		
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

	
?>
