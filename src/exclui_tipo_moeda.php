<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id_moeda = $_POST['id'];

$query = mysqli_query($con,"select * from lancamentos where moeda_lancamento = '$id_moeda'");

$linhas = mysqli_num_rows($query);

if ($linhas <> 0) {

	
		$qryIncluir = "delete from tipo_moeda where id_moeda = '$id_moeda'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysql_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

		}
	
?>
