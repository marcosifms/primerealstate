<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$id = $_POST["id"];
$nome_atividade = $_POST["nome_atividade"];


    $qryIncluir = "insert into solucoes_areas_atividades (area,atividade) values ('$id','$nome_atividade')";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


?>
