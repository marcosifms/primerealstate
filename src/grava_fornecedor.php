<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$nome_fornecedor = mysqli_real_escape_string($con,$_POST["nome_fornecedor"]);
$tipo_fornecedor = mysqli_real_escape_string($con,$_POST["tipo_provedor"]);
$cpf_cnpj_fornecedor = mysqli_real_escape_string($con,$_POST["cpfcnpj"]);
$endereco_fornecedor = mysqli_real_escape_string($con,($_POST["endereco_fornecedor"]));
$numero_fornecedor = mysqli_real_escape_string($con,$_POST["numero_fornecedor"]);
$bairro_fornecedor = mysqli_real_escape_string($con,$_POST["bairro_fornecedor"]);
$cidade_fornecedor = mysqli_real_escape_string($con,$_POST["cidade_fornecedor"]);
$estado_fornecedor = mysqli_real_escape_string($con,$_POST["estado_fornecedor"]);
$pais_fornecedor = mysqli_real_escape_string($con,$_POST["pais_fornecedor"]);
$contato_fornecedor = mysqli_real_escape_string($con,$_POST["contato_fornecedor"]);
$email_fornecedor = mysqli_real_escape_string($con,$_POST["email_fornecedor"]);
$observacoes_fornecedor = mysqli_real_escape_string($con,$_POST["observacoes_fornecedor"]);

$sql = "insert into fornecedores (
		nome_fornecedor,
		tipo_fornecedor,
		cpf_cnpj_fornecedor,
		endereco_fornecedor,
		numero_fornecedor,
		bairro_fornecedor,
		cidade_fornecedor,
		estado_fornecedor,
		pais_fornecedor,
		contato_fornecedor,
		email_fornecedor,
		observacao_fornecedor) values 
		('$nome_fornecedor','$tipo_fornecedor','$cpf_cnpj_fornecedor','$endereco_fornecedor','$numero_fornecedor','$bairro_fornecedor','$cidade_fornecedor','$estado_fornecedor','$pais_fornecedor','$contato_fornecedor','$email_fornecedor','$observacoes_fornecedor') ";
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
