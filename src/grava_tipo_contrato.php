<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$tipo_contrato = mysqli_real_escape_string($con,$_POST["tipo_contrato"]);

$sql = "insert into tipo_contrato (desc_tipo_contrato) values ('$tipo_contrato') ";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		echo "
				<div class='alert alert-danger alert-dismissible'> 
				<h4><i class='icon fa fa-check'></i> ATENÇÃO</h4>
				ERRO! ". mysqli_error($con)."
				</div>";
	}
	else {
		echo "
				<div class='alert alert-success alert-dismissible'> 
				<h4><i class='icon fa fa-check'></i> ¡Datos guardados exitosamente! </h4>
				</div>";
	}	

?>
