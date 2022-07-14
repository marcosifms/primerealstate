<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id_tipo_contrato = $_POST['id'];

$query = mysqli_query($con,"select * from contratos where tipo_contrato = '$id_tipo_contrato'");

$linhas = mysqli_num_rows($query);

if ($linhas <> 0) {

	print"<script>alert('¡Exclusión no permitida! Información vinculada.')</script>";
	echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	exit();

} else {

	
		$qryIncluir = "delete from tipo_contrato where id_tipo_contrato = '$id_tipo_contrato'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysql_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
		}
	
?>
