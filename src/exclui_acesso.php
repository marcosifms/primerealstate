<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$cod_usuario_banco = $_POST['id'];

if($cod_usuario == $cod_usuario_banco){
	print"<script>alert('Usuário logado no sistema, operação não permitida.')</script>";
	echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
}
else
{
	
		$qryIncluir = "delete from login where cod_usuario = '$cod_usuario_banco'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysql_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	
}
?>
