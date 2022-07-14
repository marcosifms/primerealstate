<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$id_lanc = $_POST["id_lanc"];
$desc_lanc = $_POST["desc_lanc"];
$valor_lanc = $_POST["valor_lanc"];

$pontos = '.';
$valor_lanc1 = str_replace($pontos, "", $valor_lanc);

$virgula=',';
$valor_lanc_final = str_replace($virgula, ".", $valor_lanc1);

$qryIncluir = "update dashboard_lancamentos set desc_lanc='$desc_lanc', valor_lanc='$valor_lanc_final' where id_lanc='$id_lanc'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-2);</script>';


?>
