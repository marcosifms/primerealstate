<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$exame = $_POST['exame'];
$tipo_exame = $_POST["tipo_exame"];

    $qryIncluir = "insert into exame_tipos (exame,nome_tipo) values ('$exame','$tipo_exame')";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


?>
