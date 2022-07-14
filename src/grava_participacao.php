<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$tipo_participacao = $_POST["tipo_participacao"];
$nome_participacao = $_POST["nome_participacao"];


    $qryIncluir = "insert into participacoes (tipo_participacao,nome_participacao) values ('$tipo_participacao','$nome_participacao')";
		$execIncluir = mysql_query($qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysql_error());	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


?>
