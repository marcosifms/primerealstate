<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$idu = mysqli_real_escape_string($con,$_POST["idu"]);


if($cod_usuario == $idu){
	print"<script>alert('Usuário logado no sistema, operação não permitida.')</script>";
	echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
}
else
{

$nome_usuario = mysqli_real_escape_string($con,$_POST["nome_usuario"]);
$login_usuario = mysqli_real_escape_string($con,$_POST["login_usuario"]);
$email_usuario = mysqli_real_escape_string($con,$_POST["email_usuario"]);
$perfil_usuario = mysqli_real_escape_string($con,$_POST["perfil_usuario"]);
$ativo_usuario = mysqli_real_escape_string($con,$_POST["ativo_usuario"]);

$sql = "update login set nome_usuario='$nome_usuario', email_usuario='$email_usuario', login_acesso='$login_usuario', perfil_acesso='$perfil_usuario', ativo='$ativo_usuario' where cod_usuario = '$idu'";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
	}
	else {
		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
	}	
}
?>
