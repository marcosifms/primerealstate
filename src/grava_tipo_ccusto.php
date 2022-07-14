<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$cod_ccusto = mysqli_real_escape_string($con,$_POST["cod_ccusto"]);
$tipo_ccusto = mysqli_real_escape_string($con,$_POST["tipo_ccusto"]);

$sql = "insert into centro_custo (cod_ccusto,desc_ccusto) values ('$cod_ccusto','$tipo_ccusto') ";
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
