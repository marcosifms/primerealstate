<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$idu = mysqli_real_escape_string($con,$_POST["idu"]);
$sigla_moeda = mysqli_real_escape_string($con,$_POST["sigla_moeda"]);
$desc_moeda = mysqli_real_escape_string($con,$_POST["desc_moeda"]);

$sql = "update tipo_moeda set sigla_moeda='$sigla_moeda', desc_moeda='$desc_moeda' where id_moeda = '$idu'";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
	}
  else {
		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	}	

?>
