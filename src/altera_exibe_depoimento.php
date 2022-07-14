<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";


$id = $_GET["id"];

$qry1=mysqli_query($con,"select exibe_site from depoimentos where id_depoimento='$id'");
while($row = mysqli_fetch_array($qry1)){
    $exibe_site=$row['exibe_site'];
}
if ($exibe_site == 'Não')
	$x = "Sim";
elseif ($exibe_site == 'Sim') {
	$x = 'Não';
}


    	$qryIncluir = "update depoimentos set exibe_site='$x' where id_depoimento='$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());	
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


?>
