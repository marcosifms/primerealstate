<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$tipo_provedor = mysqli_real_escape_string($con,$_POST["tipo_provedor"]);
$classe_provedor = mysqli_real_escape_string($con,$_POST["classe_provedor"]);
$produto_servico_fornecedor = mysqli_real_escape_string($con,$_POST["produto_servico_fornecedor"]);
$nome_razao_social_fornecedor = mysqli_real_escape_string($con,($_POST["nome_razao_social_fornecedor"]));
$rg_fornecedor = mysqli_real_escape_string($con,$_POST["rg_fornecedor"]);
$cpf_fornecedor = mysqli_real_escape_string($con,$_POST["cpf_fornecedor"]);
$data_nascimento_fornecedor = mysqli_real_escape_string($con,$_POST["data_nascimento_fornecedor"]);
$estado_civil_fornecedor = mysqli_real_escape_string($con,$_POST["estado_civil_fornecedor"]);
$endereco_fornecedor = mysqli_real_escape_string($con,$_POST["endereco_fornecedor"]);
$bairro_fornecedor = mysqli_real_escape_string($con,$_POST["bairro_fornecedor"]);
$cidade_fornecedor = mysqli_real_escape_string($con,$_POST["cidade_fornecedor"]);
$estado_fornecedor = mysqli_real_escape_string($con,$_POST["estado_fornecedor"]);
$pais_fornecedor = mysqli_real_escape_string($con,$_POST["pais_fornecedor"]);
$telefone_fornecedor = mysqli_real_escape_string($con,$_POST["telefone_fornecedor"]);
$whatsapp_fornecedor = mysqli_real_escape_string($con,$_POST["whatsapp_fornecedor"]);
$email_fornecedor = mysqli_real_escape_string($con,$_POST["email_fornecedor"]);
$instagram_fornecedor = mysqli_real_escape_string($con,$_POST["instagram_fornecedor"]);
$observacoes_fornecedor = mysqli_real_escape_string($con,$_POST["observacoes_fornecedor"]);

$sql = "insert into fornecedores (
		tipo_fornecedor,
		classe_fornecedor,
		produto_servico_fornecedor,
		nome_razao_social_fornecedor,
		rg_fornecedor,
		cpf_fornecedor,
		data_nascimento_fornecedor,
		estado_civil_fornecedor,
		endereco_fornecedor,
		bairro_fornecedor,
		cidade_fornecedor,
		estado_fornecedor,
		pais_fornecedor,
		telefone_fornecedor,
		whatsapp_fornecedor,
		email_fornecedor,
		instagram_fornecedor,
		observacoes_fornecedor

		) values (

		'$tipo_provedor',
		'$classe_provedor',
		'$produto_servico_fornecedor',
		'$nome_razao_social_fornecedor',
		'$rg_fornecedor',
		'$cpf_fornecedor',
		'$data_nascimento_fornecedor',
		'$estado_civil_fornecedor',
		'$endereco_fornecedor',
		'$bairro_fornecedor',
		'$cidade_fornecedor',
		'$estado_fornecedor',
		'$pais_fornecedor',
		'$telefone_fornecedor',
		'$whatsapp_fornecedor',
		'$email_fornecedor',
		'$instagram_fornecedor',
		'$observacoes_fornecedor'

	) ";
	

	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
		echo "
				<div class='alert alert-danger alert-dismissible'> 
				<h4><i class='icon fa fa-check'></i> ATEN????O</h4>
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
