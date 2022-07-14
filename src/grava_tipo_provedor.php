<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$desc_tipo_provedor = mysqli_real_escape_string($con,$_POST["desc_tipo_provedor"]);

$sql = "insert into tipo_provedor (desc_tipo_provedor) values ('$desc_tipo_provedor') ";
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
