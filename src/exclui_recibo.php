<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id_recibo_pagamento = $_POST['id'];

$qryIncluir = "delete from pagamento_aluguel_inquilino where recibo_pagamento = '$id_recibo_pagamento'";
$execIncluir = mysqli_query($con, $qryIncluir);  
	if(!$execIncluir)
	   	exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));

$qryIncluir = "delete from recibo_pagamento_inquilino where id_recibo_pagamento = '$id_recibo_pagamento'";
$execIncluir = mysqli_query($con, $qryIncluir);  
	if(!$execIncluir)
	   	exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
	   		
		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';



	
?>
