<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$nome_cliente = mysqli_real_escape_string($con,$_POST["nome_cliente"]);
@$data_nascimento_cliente = mysqli_real_escape_string($con,$_POST["data_nascimento_cliente"]);
@$estado_civil_cliente = mysqli_real_escape_string($con,$_POST["estado_civil_cliente"]);
$tipo_cliente = mysqli_real_escape_string($con,$_POST["tipo_cliente"]);
@$rg_ci_cliente = mysqli_real_escape_string($con,$_POST["rg_ci_cliente"]);
@$cpf_cnpj_cliente = mysqli_real_escape_string($con,$_POST["cpfcnpj"]);
@$endereco_cliente = mysqli_real_escape_string($con,($_POST["endereco_cliente"]));
@$numero_cliente = mysqli_real_escape_string($con,$_POST["numero_cliente"]);
@$bairro_cliente = mysqli_real_escape_string($con,$_POST["bairro_cliente"]);
@$cidade_cliente = mysqli_real_escape_string($con,$_POST["cidade_cliente"]);
@$estado_cliente = mysqli_real_escape_string($con,$_POST["estado_cliente"]);
@$pais_cliente = mysqli_real_escape_string($con,$_POST["pais_cliente"]);
@$contato_cliente = mysqli_real_escape_string($con,$_POST["contato_cliente"]);
@$contato_cliente2 = mysqli_real_escape_string($con,$_POST["contato_cliente2"]);
@$whatsapp_cliente = mysqli_real_escape_string($con,$_POST["whatsapp_cliente"]);
@$instagram_cliente = mysqli_real_escape_string($con,$_POST["instagram_cliente"]);
@$email_cliente = mysqli_real_escape_string($con,$_POST["email_cliente"]);
@$observacoes_cliente = mysqli_real_escape_string($con,$_POST["observacoes_cliente"]);
@$resp_contrato_cliente = mysqli_real_escape_string($con,$_POST["resp_contrato_cliente"]);
@$adm_contrato_cliente = mysqli_real_escape_string($con,$_POST["adm_contrato_cliente"]);
@$data_nascimento_resp_contrato = mysqli_real_escape_string($con,$_POST["data_nascimento_resp_contrato"]);
@$rg_resp_contrato = mysqli_real_escape_string($con,$_POST["rg_resp_contrato"]);
@$whatsapp_resp_contrato = mysqli_real_escape_string($con,$_POST["whatsapp_resp_contrato"]);
@$email_resp_contrato = mysqli_real_escape_string($con,$_POST["email_resp_contrato"]);
@$instagram_resp_contrato = mysqli_real_escape_string($con,$_POST["instagram_resp_contrato"]);
@$enquadramento_cliente = mysqli_real_escape_string($con,$_POST["enquadramento_cliente"]);

$sql = "insert into clientes (
		enquadramento_cliente,
		nome_cliente,
		data_nascimento_cliente,
		estado_civil_cliente,
		cliente_tipo,
		rg_ci_cliente,
		cpf_cnpj_cliente,
		endereco_cliente,
		numero_cliente,
		bairro_cliente,
		cidade_cliente,
		estado_cliente,
		pais_cliente,
		contato_cliente,
		contato_cliente2,
		whatsapp_cliente,
		instagram_cliente,
		email_cliente,
		observacao_cliente,
		resp_contrato_cliente,
		adm_contrato_cliente,
		data_nascimento_resp_contrato,
		rg_resp_contrato,
		whatsapp_resp_contrato,
		email_resp_contrato,
		instagram_resp_contrato
		) values (
		'$enquadramento_cliente',
		'$nome_cliente',
		'$data_nascimento_cliente',
		'$estado_civil_cliente',
		'$tipo_cliente',
		'$rg_ci_cliente',
		'$cpf_cnpj_cliente',
		'$endereco_cliente',
		'$numero_cliente',
		'$bairro_cliente',
		'$cidade_cliente',
		'$estado_cliente',
		'$pais_cliente',
		'$contato_cliente',
		'$contato_cliente2',
		'$whatsapp_cliente',
		'$instagram_cliente',
		'$email_cliente',
		'$observacoes_cliente',
		'$resp_contrato_cliente',
		'$adm_contrato_cliente',
		'$data_nascimento_resp_contrato',
		'$rg_resp_contrato',
		'$whatsapp_resp_contrato',
		'$email_resp_contrato',
		'$instagram_resp_contrato'

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
