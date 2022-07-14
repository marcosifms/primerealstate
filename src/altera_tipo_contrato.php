<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$idu = mysqli_real_escape_string($con,$_POST["idu"]);
$desc_tipo_contrato = mysqli_real_escape_string($con,$_POST["desc_tipo_contrato"]);

$sql = "update tipo_contrato set desc_tipo_contrato='$desc_tipo_contrato' where id_tipo_contrato = '$idu'";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
	}
  else {
		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	}	

?>
