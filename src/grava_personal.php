<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$cargo_funcao_personal = mysqli_real_escape_string($con,$_POST["cargo_funcao_personal"]);
$sucursal_personal = mysqli_real_escape_string($con,$_POST["sucursal_personal"]);
$nome_personal = mysqli_real_escape_string($con,$_POST["nome_personal"]);
$rg_personal = mysqli_real_escape_string($con,$_POST["rg_personal"]);
$cpf_personal = mysqli_real_escape_string($con,$_POST["cpf_personal"]);
$estado_civil_personal = mysqli_real_escape_string($con,$_POST["estado_civil_personal"]);
$data_nascimento_personal = mysqli_real_escape_string($con,$_POST["data_nascimento_personal"]);
$endereco_personal = mysqli_real_escape_string($con,($_POST["endereco_personal"]));
$bairro_personal = mysqli_real_escape_string($con,$_POST["bairro_personal"]);
$cidade_personal = mysqli_real_escape_string($con,$_POST["cidade_personal"]);
$estado_personal = mysqli_real_escape_string($con,$_POST["estado_personal"]);
$pais_personal = mysqli_real_escape_string($con,$_POST["pais_personal"]);
$telefone_personal = mysqli_real_escape_string($con,$_POST["telefone_personal"]);
$email_personal = mysqli_real_escape_string($con,$_POST["email_personal"]);
$whatsapp_personal = mysqli_real_escape_string($con,$_POST["whatsapp_personal"]);
$banco_personal = mysqli_real_escape_string($con,$_POST["banco_personal"]);
$sucursal_agencia_personal = mysqli_real_escape_string($con,$_POST["sucursal_agencia_personal"]);
$cc_ca_personal = mysqli_real_escape_string($con,$_POST["cc_ca_personal"]);
$cnh_personal = mysqli_real_escape_string($con,$_POST["cnh_personal"]);
$data_validade_cnh_personal = mysqli_real_escape_string($con,$_POST["data_validade_cnh_personal"]);
$instagram_personal = mysqli_real_escape_string($con,$_POST["instagram_personal"]);
$observacoes_personal = mysqli_real_escape_string($con,$_POST["observacoes_personal"]);


$sql = "insert into personal (
		cargo_funcao_personal,
		sucursal_personal,
		nome_personal,
		rg_personal,
		cpf_personal,
		estado_civil_personal,
		data_nascimento_personal,
		endereco_personal,
		bairro_personal,
		cidade_personal,
		estado_personal,
		pais_personal,
		telefone_personal,
		email_personal,
		whatsapp_personal,
		banco_personal,
		sucursal_agencia_personal,
		cc_ca_personal,
		email_sucursal_personal,
		cnh_personal,
		data_validade_cnh_personal,
		instagram_personal,
		observacoes_personal
		) values (
		'$cargo_funcao_personal',
		'$sucursal_personal',
		'$nome_personal',
		'$rg_personal',
		'$cpf_personal',
		'$estado_civil_personal',
		'$data_nascimento_personal',
		'$endereco_personal',
		'$bairro_personal',
		'$cidade_personal',
		'$estado_personal',
		'$pais_personal',
		'$telefone_personal',
		'$email_personal',
		'$whatsapp_personal',
		'$banco_personal',
		'$sucursal_agencia_personal',
		'$cc_ca_personal',
		'$email_sucursal_personal',
		'$cnh_personal',
		'$data_validade_cnh_personal',
		'$instagram_personal',
		'$observacoes_personal'

	)";
	
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
