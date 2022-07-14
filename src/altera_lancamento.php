<?php

include "../valida_session.php";

$id = mysqli_real_escape_string($con,$_POST["id"]);

$tipo_lancamento = mysqli_real_escape_string($con,$_POST["tipo_lancamento"]);

$data_lancamento = mysqli_real_escape_string($con,$_POST["data_lancamento"]);
$moeda_lancamento = mysqli_real_escape_string($con,$_POST["moeda_lancamento"]);

$valor = mysqli_real_escape_string($con,$_POST["valor_lancamento"]);
$pontos = '.';
$valor_lancamento = str_replace($pontos, "", $valor);

$fornecedor_lancamento = mysqli_real_escape_string($con,($_POST["fornecedor_lancamento"]));
$cc_custo_lancamento = mysqli_real_escape_string($con,$_POST["cc_custo_lancamento"]);
$caixa_lancamento = mysqli_real_escape_string($con,$_POST["caixa_lancamento"]);
$num_doc_lancamento = mysqli_real_escape_string($con,$_POST["num_doc_lancamento"]);
$descricao_lancamento = mysqli_real_escape_string($con,$_POST["descricao_lancamento"]);

$sql = "update lancamentos set 
		
		lancamento_tipo='$tipo_lancamento',
		data_lancamento='$data_lancamento',
		moeda_lancamento='$moeda_lancamento',
		valor_lancamento='$valor_lancamento',
		fornecedor_lancamento='$fornecedor_lancamento',
		cc_custo_conta_lancamento='$cc_custo_lancamento',
		caixa_lancamento='$caixa_lancamento',
		num_doc_lancamento='$num_doc_lancamento',
		descricao_lancamento='$descricao_lancamento'
		

		where id_lancamento ='$id'"; 
	
    $execIncluir = mysqli_query($con, $sql);  
    if(!$execIncluir) {
      exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
    }
    else {
      echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
    }	

?>
