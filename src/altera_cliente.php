<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = mysqli_real_escape_string($con,$_POST["id"]);
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

$sql = "update clientes set 
		nome_cliente='$nome_cliente',
		data_nascimento_cliente = '$data_nascimento_cliente',
		estado_civil_cliente = '$estado_civil_cliente',
		cliente_tipo = '$tipo_cliente',
		rg_ci_cliente = '$rg_ci_cliente',
		cpf_cnpj_cliente='$cpf_cnpj_cliente',
		endereco_cliente='$endereco_cliente',
		numero_cliente='$numero_cliente',
		bairro_cliente='$bairro_cliente',
		cidade_cliente='$cidade_cliente',
		estado_cliente='$estado_cliente',
		pais_cliente='$pais_cliente',
		contato_cliente='$contato_cliente',
		contato_cliente2='$contato_cliente2',
		whatsapp_cliente = '$whatsapp_cliente',
		instagram_cliente = '$instagram_cliente',
		email_cliente='$email_cliente',
		resp_contrato_cliente='$resp_contrato_cliente',
		adm_contrato_cliente='$adm_contrato_cliente',
		observacao_cliente='$observacoes_cliente',
		data_nascimento_resp_contrato = '$data_nascimento_resp_contrato',
		rg_resp_contrato = '$rg_resp_contrato',
		whatsapp_resp_contrato = '$whatsapp_resp_contrato',
		email_resp_contrato = '$email_resp_contrato',
		instagram_resp_contrato = '$instagram_resp_contrato' where id_cliente ='$id'"; 
	
    $execIncluir = mysqli_query($con, $sql);  
    if(!$execIncluir) {
      exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
    }
    else {
      echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
    }	

?>
