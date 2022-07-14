<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$id = $_POST["id-tipo-exame"];
$detalhe_tipo = $_POST["detalhe_tipo"];


    $qryIncluir = "update exame_tipos set detalhes_tipo='$detalhe_tipo' where id_tipo_exame='$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


?>
