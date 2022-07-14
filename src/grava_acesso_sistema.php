<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$nome_usuario = mysqli_real_escape_string($con,$_POST["nome_usuario"]);
$login_usuario = mysqli_real_escape_string($con,$_POST["login_usuario"]);
$senha_usuario = mysqli_real_escape_string($con,sha1($_POST["senha_usuario"]));
$email_usuario = mysqli_real_escape_string($con,$_POST["email_usuario"]);
$perfil_usuario = mysqli_real_escape_string($con,$_POST["perfil_usuario"]);
$ativo_usuario = mysqli_real_escape_string($con,$_POST["ativo_usuario"]);

$sql = "insert into login (nome_usuario, login_acesso, email_usuario, senha_acesso, perfil_acesso, ativo) values ('$nome_usuario','$login_usuario','$email_usuario','$senha_usuario','$perfil_usuario','$ativo_usuario') ";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		echo "
				<div class='alert alert-danger alert-dismissible'> 
				<h4><i class='icon fa fa-check'></i> ATENÇÃO</h4>
				ERRO! ". mysqli_error($con)."
				</div>";
	}
	else {
		echo "
				<div class='alert alert-success alert-dismissible'> 
				<h4><i class='icon fa fa-check'></i> Dados gravados com sucesso!</h4>
				</div>";
	}	

?>
