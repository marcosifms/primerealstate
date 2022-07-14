<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$idu = mysqli_real_escape_string($con,$_POST["idu"]);
$cod_ccusto = mysqli_real_escape_string($con,$_POST["cod_ccusto"]);
$tipo_ccusto = mysqli_real_escape_string($con,$_POST["tipo_ccusto"]);

$sql = "update centro_custo set cod_ccusto='$cod_ccusto', desc_ccusto='$tipo_ccusto' where id_ccusto = '$idu'";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
	}
  else {
		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	}	

?>
