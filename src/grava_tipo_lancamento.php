<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$tipo_lancamento = mysqli_real_escape_string($con,$_POST["tipo_lancamento"]);
$estado_lancamento = mysqli_real_escape_string($con,$_POST["estado_lancamento"]);

$sql = "insert into tipo_lancamento (desc_lanc,estado_lanc) values ('$tipo_lancamento','$estado_lancamento') ";
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
				<h4><i class='icon fa fa-check'></i> ¡Datos guardados exitosamente!</h4>
				</div>";
	}	

?>
