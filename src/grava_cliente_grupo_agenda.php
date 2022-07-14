<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$grupo = $_POST["grupo"];
$cliente = $_POST["cliente"];

$query = mysqli_query($con, "select * from clientes_grupo_agenda where cliente_grupo = '$cliente'");
$linhas = mysqli_num_rows($query);

if ($linhas <> 0) {

	print"<script>alert('Este cliente já pertence a outro grupo.')</script>";
	echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	exit();

} else {


    	$qryIncluir = "insert into clientes_grupo_agenda (grupo_cliente,cliente_grupo) values ('$grupo','$cliente')";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

}
?>
