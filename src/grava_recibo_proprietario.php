<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$id_contrato = $_POST["id_contrato"];
$data_recibo = $_POST["data_recibo"];
$tipo_recibo = '2';


    	$qryIncluir = "insert into recibo_pagamento_inquilino (tipo_recibo,contrato_pagamento,data_pagamento) values ('$tipo_recibo','$id_contrato','$data_recibo')";
		$execIncluir = mysqli_query($con, $qryIncluir);  
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
				<h4><i class='icon fa fa-check'></i> Dados gravados com sucesso!</h4>
				</div>";
	}	


?>
