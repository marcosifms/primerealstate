<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id']; // id do histórico

$qryIncluir = "delete from empresas_add_fluxo where id_add_fluxo = '$id'";
	$execIncluir = mysqli_query($conecta, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysql_error($conecta));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	
?>
