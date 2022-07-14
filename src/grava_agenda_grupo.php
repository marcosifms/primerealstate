<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$nome_grupo_agenda = $_POST["nome_grupo_agenda"];

$qryIncluir = "insert into grupo_agenda (nome_grupo_agenda) values ('$nome_grupo_agenda')";
$execIncluir = mysqli_query($con, $qryIncluir);  
if(!$execIncluir) {
	exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());	
}
echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

?>
