<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = mysqli_real_escape_string($con,$_POST["id"]);

$cliente_contrato = mysqli_real_escape_string($con,$_POST["cliente_contrato"]);
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



$sql = "update contratos set 
		cliente_contrato='$cliente_contrato',
		tipo_contrato='$tipo_contrato',
		cliente_locatario='$cliente_locatario',
		inicio_vigencia_contrato='$inicio_vigencia_contrato',
		fim_vigencia_contrato='$fim_vigencia_contrato',
		tipo_moeda_contrato='$tipo_moeda_contrato',
		valor_total_contrato='$valor_total_contrato',
		qtd_parcelas_contrato='$qtd_parcelas_contrato',
		valor_parcela_contrato='$valor_parcela_contrato',
		garantia_contrato='$garantia_contrato',
		taxa_adm_contrato='$taxa_adm_contrato',
		comissao_contrato = '$comissao_contrato',
		data_contrato = '$data_contrato'


		where id_contrato ='$id'"; 
	
    $execIncluir = mysqli_query($con, $sql);  
    if(!$execIncluir) {
      exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
    }
    else {
      echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
    }	

?>
