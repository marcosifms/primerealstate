<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];

$query = mysqli_query($con, "select * from clientes_grupo_agenda where grupo_cliente = '$id'");
$linhas = mysqli_num_rows($query);

if ($linhas <> 0) {

	print"<script>alert('Este grupo possui clientes cadastrados, exclusão não permitida.')</script>";
	echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	exit();

} else {

	$qryIncluir = "delete from grupo_agenda where id_grupo_agenda = '$id'";
	$execIncluir = mysqli_query($con, $qryIncluir);  
	if(!$execIncluir) {
		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());
	}

	echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

}
		//}

?>
