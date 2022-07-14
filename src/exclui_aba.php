<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];

$query = mysqli_query($con,"select * from docs_cliente where aba_doc = '$id'");

@$linhas = mysqli_num_rows($query);

if ($linhas <> 0) {

	print"<script>alert('Esta aba contem documentos associados. Exclusão não permitida!')</script>";
	echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	exit();

} else {

		$qryIncluir = "delete from aba_documentos where id_aba = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
	   		
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

		}
	
?>
