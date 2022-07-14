<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = $_POST['id'];

$query = mysqli_query($con,"select * from imoveis where cc_imovel = '$id'");

$linhas = mysqli_num_rows($query);

if ($linhas <> 0) {

	
		$qryIncluir = "delete from centro_custo where id_ccusto = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysql_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

	}
	
?>
