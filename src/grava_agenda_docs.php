<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$tipo_agenda = $_POST["tipo_agenda"];
$cliente = $_POST["cliente"];
$prazo_entrega = $_POST["prazo_entrega"];
$documento = $_POST["documento"];


    	$qryIncluir = "insert into agenda (tipo_agenda,cliente_agenda,data_agenda,descricao_agenda) values ('$tipo_agenda','$cliente','$prazo_entrega','$documento')";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


?>
