<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$id_recibo = $_POST["id_recibo"];
$cota_pagamento = $_POST["cota_pagamento"];
$desc_pagamento = $_POST["desc_pagamento"];
$tipo_moeda_pagamento = $_POST['moeda_pagamento'];

$tipo_lancamento = $_POST['tipo_lancamento'];

$valor = $_POST["valor_pagamento"];
$pontos = '.';
$valor_pagamento = str_replace($pontos, "", $valor);


    	$qryIncluir = "insert into pagamento_aluguel_inquilino (recibo_pagamento,cota_pagamento,desc_pagamento,tipo_moeda_pagamento,tipo_lancamento_pagamento,valor_pagamento) 
    	values ('$id_recibo','$cota_pagamento','$desc_pagamento','$tipo_moeda_pagamento','$tipo_lancamento','$valor_pagamento')";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


?>
