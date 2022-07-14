<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = mysqli_real_escape_string($con,$_POST["id"]);
$imovel_tipo = mysqli_real_escape_string($con,$_POST["imovel_tipo"]);
$proprietario_imovel = mysqli_real_escape_string($con,$_POST["proprietario_imovel"]);
$captador_imovel = mysqli_real_escape_string($con,$_POST["captador_imovel"]);
$referencia_imovel = mysqli_real_escape_string($con,$_POST["referencia_imovel"]);
$operacao_imovel = mysqli_real_escape_string($con,$_POST["operacao_imovel"]);
$endereco_imovel = mysqli_real_escape_string($con,($_POST["endereco_imovel"]));
$bairro_imovel = mysqli_real_escape_string($con,$_POST["bairro_imovel"]);
$cidade_imovel = mysqli_real_escape_string($con,$_POST["cidade_imovel"]);
$estado_imovel = mysqli_real_escape_string($con,$_POST["estado_imovel"]);
$pais_imovel = mysqli_real_escape_string($con,$_POST["pais_imovel"]);
$matricula_imovel = mysqli_real_escape_string($con,($_POST["matricula_imovel"]));
$conta_corrente_imovel = mysqli_real_escape_string($con,$_POST["conta_corrente_imovel"]);
$tipo_construcao_imovel = mysqli_real_escape_string($con,$_POST["tipo_construcao_imovel"]);
$centro_custo_imovel = mysqli_real_escape_string($con,$_POST["centro_custo_imovel"]);
$valor_aluguel_imovel = mysqli_real_escape_string($con,$_POST["valor_aluguel_imovel"]);
$valor_venda_imovel = mysqli_real_escape_string($con,$_POST["valor_venda_imovel"]);
$valor_garantia_imovel = mysqli_real_escape_string($con,$_POST["valor_garantia_imovel"]);
$destino_garantia_imovel = mysqli_real_escape_string($con,$_POST["destino_garantia_imovel"]);
$administracao_imovel = mysqli_real_escape_string($con,$_POST["administracao_imovel"]);
$comissao_aluguel_imovel = mysqli_real_escape_string($con,$_POST["comissao_aluguel_imovel"]);
$comissao_venda_imovel = mysqli_real_escape_string($con,$_POST["comissao_venda_imovel"]);
$descricao_imovel = mysqli_real_escape_string($con,$_POST["descricao_imovel"]);
$condominio_imovel = mysqli_real_escape_string($con,$_POST["condominio_imovel"]);
$nome_condominio_imovel = mysqli_real_escape_string($con,$_POST["nome_condominio_imovel"]);
$administrador_imovel = mysqli_real_escape_string($con,$_POST["administrador_imovel"]);
$data_nascimento_adm_imovel = mysqli_real_escape_string($con,$_POST["data_nascimento_adm_imovel"]);
$wpp_adm_imovel = mysqli_real_escape_string($con,$_POST["wpp_adm_imovel"]);
$email_adm_imovel = mysqli_real_escape_string($con,$_POST["email_adm_imovel"]);
$instagram_adm_imovel = mysqli_real_escape_string($con,$_POST["instagram_adm_imovel"]);
$cct_cadastral_imovel = mysqli_real_escape_string($con,$_POST["cct_cadastral_imovel"]);

$sql = "update imoveis set 

			imovel_tipo = '$imovel_tipo',
			proprietario_imovel = '$proprietario_imovel',
			captador_imovel = '$captador_imovel',
			referencia_imovel = '$referencia_imovel',
			operacao_imovel = '$operacao_imovel',
			endereco_imovel = '$endereco_imovel',
			bairro_imovel = '$bairro_imovel',
			cidade_imovel = '$cidade_imovel',
			estado_imovel = '$estado_imovel',
			pais_imovel = '$pais_imovel',
			matricula_imovel = '$matricula_imovel',
			conta_corrente_imovel = '$conta_corrente_imovel',
			tipo_construcao_imovel = '$tipo_construcao_imovel',
			centro_custo_imovel = '$centro_custo_imovel',
			valor_aluguel_imovel = '$valor_aluguel_imovel',
			valor_venda_imovel = '$valor_venda_imovel',
			valor_garantia_imovel = '$valor_garantia_imovel',
			destino_garantia_imovel = '$destino_garantia_imovel',
			administracao_imovel = '$administracao_imovel',
			comissao_aluguel_imovel = '$comissao_aluguel_imovel',
			comissao_venda_imovel = '$comissao_venda_imovel',
			descricao_imovel = '$descricao_imovel',
			condominio_imovel = '$condominio_imovel',
			nome_condominio_imovel = '$nome_condominio_imovel',
			administrador_imovel = '$administrador_imovel',
			data_nascimento_adm_imovel = '$data_nascimento_adm_imovel',
			wpp_adm_imovel = '$wpp_adm_imovel',
			email_adm_imovel = '$email_adm_imovel',
			instagram_adm_imovel = '$instagram_adm_imovel',
			cct_cadastral_imovel = '$cct_cadastral_imovel'

			where id_imovel = '$id'";
	
    $execIncluir = mysqli_query($con, $sql);  
    if(!$execIncluir) {
      exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
    }
    else {
      echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
    }	

?>
