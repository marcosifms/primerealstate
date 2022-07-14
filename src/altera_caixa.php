<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$idu = mysqli_real_escape_string($con,$_POST["idu"]);
$desc_caixa = mysqli_real_escape_string($con,$_POST["desc_caixa"]);

$sql = "update caixa set desc_caixa='$desc_caixa' where id_caixa = '$idu'";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
	}
  else {
		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	}	

?>
