<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

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


$tipo_moeda_aluguel_imovel = mysqli_real_escape_string($con,$_POST["tipo_moeda_aluguel_imovel"]);
$valor_aluguel_imovel = mysqli_real_escape_string($con,$_POST["valor_aluguel_imovel"]);

$tipo_moeda_venda_imovel = mysqli_real_escape_string($con,$_POST["tipo_moeda_venda_imovel"]);
$valor_venda_imovel = mysqli_real_escape_string($con,$_POST["valor_venda_imovel"]);

$tipo_moeda_garantia_imovel = mysqli_real_escape_string($con,$_POST["tipo_moeda_garantia_imovel"]);
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

$sql = "insert into imoveis 
		(
			imovel_tipo,
			proprietario_imovel,
			captador_imovel,
			referencia_imovel,
			operacao_imovel,
			endereco_imovel,
			bairro_imovel,
			cidade_imovel,
			estado_imovel,
			pais_imovel,
			matricula_imovel,
			conta_corrente_imovel,
			tipo_construcao_imovel,
			centro_custo_imovel,
			tipo_moeda_aluguel_imovel,
			valor_aluguel_imovel,
			tipo_moeda_venda_imovel,
			valor_venda_imovel,
			tipo_moeda_garantia_imovel,
			valor_garantia_imovel,
			destino_garantia_imovel,
			administracao_imovel,
			comissao_aluguel_imovel,
			comissao_venda_imovel,
			descricao_imovel,
			condominio_imovel,
			nome_condominio_imovel,
			administrador_imovel,
			data_nascimento_adm_imovel,
			wpp_adm_imovel,
			email_adm_imovel,
			instagram_adm_imovel,
			cct_cadastral_imovel

		) values(

			'$imovel_tipo',
			'$proprietario_imovel',
			'$captador_imovel',
			'$referencia_imovel',
			'$operacao_imovel',
			'$endereco_imovel',
			'$bairro_imovel',
			'$cidade_imovel',
			'$estado_imovel',
			'$pais_imovel',
			'$matricula_imovel',
			'$conta_corrente_imovel',
			'$tipo_construcao_imovel',
			'$centro_custo_imovel',
			'$tipo_moeda_aluguel_imovel',
			'$valor_aluguel_imovel',
			'$tipo_moeda_venda_imovel',
			'$valor_venda_imovel',
			'$tipo_moeda_garantia_imovel',
			'$valor_garantia_imovel',
			'$destino_garantia_imovel',
			'$administracao_imovel',
			'$comissao_aluguel_imovel',
			'$comissao_venda_imovel',
			'$descricao_imovel',
			'$condominio_imovel',
			'$nome_condominio_imovel',
			'$administrador_imovel',
			'$data_nascimento_adm_imovel',
			'$wpp_adm_imovel',
			'$email_adm_imovel',
			'$instagram_adm_imovel',
			'$cct_cadastral_imovel'

		) ";
	
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
