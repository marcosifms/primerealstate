<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];

//$query = mysql_query("select * from recebimentos where id_recebimento = '$id' and status_pagamento = '1' ");

//$linhas = mysql_num_rows($query);

//if ($linhas <> 0) {

	//print"<script>alert('Este recebimento já foi contabilizado. Exclusão não permitida!')</script>";
	//echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	//exit();

//} else {

		$qryIncluir = "delete from agenda where id_agenda = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());
	   		
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


		//}
	
?>
