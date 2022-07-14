<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$nome_aba = $_POST["nome_aba"];


    	$qryIncluir = "insert into aba_documentos (desc_aba) values ('$nome_aba')";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


?>
