<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$idu = mysqli_real_escape_string($con,$_POST["idu"]);
$tipo_lancamento = mysqli_real_escape_string($con,$_POST["tipo_lancamento"]);
$estado_lancamento = mysqli_real_escape_string($con,$_POST["estado_lancamento"]);

$sql = "update tipo_lancamento set desc_lanc='$tipo_lancamento', estado_lanc='$estado_lancamento' where id_lanc = '$idu'";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
	}
  else {
		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	}	

?>
