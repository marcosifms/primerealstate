<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = mysqli_real_escape_string($con,$_POST["id"]);

@$tipo_provedor = mysqli_real_escape_string($con,$_POST["tipo_provedor"]);
@$classe_provedor = mysqli_real_escape_string($con,$_POST["classe_provedor"]);
@$produto_servico_fornecedor = mysqli_real_escape_string($con,$_POST["produto_servico_fornecedor"]);
@$nome_razao_social_fornecedor = mysqli_real_escape_string($con,$_POST["nome_razao_social_fornecedor"]);
@$rg_fornecedor = mysqli_real_escape_string($con,$_POST["rg_fornecedor"]);
@$cpf_fornecedor = mysqli_real_escape_string($con,$_POST["cpf_fornecedor"]);
@$data_nascimento_fornecedor = mysqli_real_escape_string($con,$_POST["data_nascimento_fornecedor"]);
@$estado_civil_fornecedor = mysqli_real_escape_string($con,$_POST["estado_civil_fornecedor"]);
@$endereco_fornecedor = mysqli_real_escape_string($con,$_POST["endereco_fornecedor"]);
@$bairro_fornecedor = mysqli_real_escape_string($con,$_POST["bairro_fornecedor"]);
@$cidade_fornecedor = mysqli_real_escape_string($con,$_POST["cidade_fornecedor"]);
@$estado_fornecedor = mysqli_real_escape_string($con,$_POST["estado_fornecedor"]);
@$pais_fornecedor = mysqli_real_escape_string($con,$_POST["pais_fornecedor"]);
@$telefone_fornecedor = mysqli_real_escape_string($con,$_POST["telefone_fornecedor"]);
@$whatsapp_fornecedor = mysqli_real_escape_string($con,$_POST["whatsapp_fornecedor"]);
@$email_fornecedor = mysqli_real_escape_string($con,$_POST["email_fornecedor"]);
@$instagram_fornecedor = mysqli_real_escape_string($con,$_POST["instagram_fornecedor"]);

@$cnpj_fornecedor = mysqli_real_escape_string($con,$_POST["cnpj_fornecedor"]);
@$representande_legal_fornecedor = mysqli_real_escape_string($con,$_POST["representande_legal_fornecedor"]);
@$rg_representande_legal_fornecedor = mysqli_real_escape_string($con,$_POST["rg_representande_legal_fornecedor"]);
@$data_nascimento_representande_legal_fornecedor = mysqli_real_escape_string($con,$_POST["data_nascimento_representande_legal_fornecedor"]);
@$whatsapp_representande_legal_fornecedor = mysqli_real_escape_string($con,$_POST["whatsapp_representande_legal_fornecedor"]);
@$email_representande_legal_fornecedor = mysqli_real_escape_string($con,$_POST["email_representande_legal_fornecedor"]);
@$instagram_representande_legal_fornecedor = mysqli_real_escape_string($con,$_POST["instagram_representande_legal_fornecedor"]);

@$observacoes_fornecedor = mysqli_real_escape_string($con,$_POST["observacoes_fornecedor"]);

$sql = "update fornecedores set
		
		tipo_fornecedor= '$tipo_provedor',
		classe_fornecedor = '$classe_provedor',
		produto_servico_fornecedor = '$produto_servico_fornecedor',
		nome_razao_social_fornecedor = '$nome_razao_social_fornecedor',
		rg_fornecedor = '$rg_fornecedor',
		cpf_fornecedor = '$cpf_fornecedor',
		data_nascimento_fornecedor = '$data_nascimento_fornecedor',
		estado_civil_fornecedor = '$estado_civil_fornecedor',
		endereco_fornecedor = '$endereco_fornecedor',
		bairro_fornecedor = '$bairro_fornecedor',
		cidade_fornecedor = '$cidade_fornecedor',
		estado_fornecedor = '$estado_fornecedor',
		pais_fornecedor = '$pais_fornecedor',
		telefone_fornecedor = '$telefone_fornecedor',
		whatsapp_fornecedor = '$whatsapp_fornecedor',
		email_fornecedor = '$email_fornecedor',
		instagram_fornecedor = '$instagram_fornecedor',
		observacoes_fornecedor = '$observacoes_fornecedor',
		cnpj_fornecedor = '$cnpj_fornecedor',
		representande_legal_fornecedor = '$representande_legal_fornecedor',
		rg_representande_legal_fornecedor = '$rg_representande_legal_fornecedor',
		data_nascimento_representande_legal_fornecedor = '$data_nascimento_representande_legal_fornecedor',
		whatsapp_representande_legal_fornecedor = '$whatsapp_representande_legal_fornecedor',
		email_representande_legal_fornecedor = '$email_representande_legal_fornecedor',
		instagram_representande_legal_fornecedor = '$instagram_representande_legal_fornecedor',
		observacoes_fornecedor  = '$observacoes_fornecedor' 



		where id_fornecedor = '$id'";
	$execIncluir = mysqli_query($con, $sql);  
	if(!$execIncluir) {
      exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
    }
    else {
      echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
    }	

?>
