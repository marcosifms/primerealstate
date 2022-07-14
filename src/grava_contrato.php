<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$cliente_contrato = mysqli_real_escape_string($con,$_POST["cliente_contrato"]);
$imovel_contrato = mysqli_real_escape_string($con,$_POST["imovel_contrato"]);
$tipo_contrato = mysqli_real_escape_string($con,$_POST["tipo_contrato"]);
$cliente_locatario = mysqli_real_escape_string($con,$_POST["cliente_locatario"]);
$inicio_vigencia_contrato = mysqli_real_escape_string($con,($_POST["inicio_vigencia_contrato"]));
$fim_vigencia_contrato = mysqli_real_escape_string($con,$_POST["fim_vigencia_contrato"]);

$tipo_moeda_contrato = mysqli_real_escape_string($con,$_POST["tipo_moeda_contrato"]);

$valor_total= mysqli_real_escape_string($con,$_POST["valor_total_contrato"]);
$pontos = '.';
$valor_total_contrato = str_replace($pontos, "", $valor_total);

$qtd_parcelas_contrato = mysqli_real_escape_string($con,$_POST["qtd_parcelas_contrato"]);

$valor_parcela= mysqli_real_escape_string($con,$_POST["valor_parcela_contrato"]);
$pontos = '.';
$valor_parcela_contrato = str_replace($pontos, "", $valor_parcela);

$garantia= mysqli_real_escape_string($con,$_POST["garantia_contrato"]);
$pontos = '.';
$garantia_contrato = str_replace($pontos, "", $garantia);

$taxa= mysqli_real_escape_string($con,$_POST["taxa_adm_contrato"]);
$pontos = '.';
$taxa_adm_contrato = str_replace($pontos, "", $taxa);

$comissao= mysqli_real_escape_string($con,$_POST["comissao_contrato"]);
$pontos = '.';
$comissao_contrato = str_replace($pontos, "", $comissao);

$data_contrato = mysqli_real_escape_string($con,$_POST["data_contrato"]);


$sql = "insert into contratos (
		cliente_contrato,
		imovel_contrato,
		tipo_contrato,
		cliente_locatario,
		inicio_vigencia_contrato,
		fim_vigencia_contrato,
		tipo_moeda_contrato,
		valor_total_contrato,
		qtd_parcelas_contrato,
		valor_parcela_contrato,
		garantia_contrato,
		taxa_adm_contrato,
		comissao_contrato,
		data_contrato
		) 
		values 
		(
		'$cliente_contrato',
		'$imovel_contrato',
		'$tipo_contrato',
		'$cliente_locatario',
		'$inicio_vigencia_contrato',
		'$fim_vigencia_contrato',
		'$tipo_moeda_contrato',
		'$valor_total_contrato',
		'$qtd_parcelas_contrato',
		'$valor_parcela_contrato',
		'$garantia_contrato',
		'$taxa_adm_contrato',
		'$comissao_contrato',
		'$data_contrato'
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
