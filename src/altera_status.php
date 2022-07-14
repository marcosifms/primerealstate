<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];

$query = mysqli_query($con, "select * from menu_cliente where id_menu = '$id'");

while ($row = mysqli_fetch_array($query)){
	$status = $row['status'];
}
echo $status;
if ($status == 0) {

	$qryIncluir = "update menu_cliente set status ='1' where id_menu = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());
	   		
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

} else {

		$qryIncluir = "update menu_cliente set status ='0' where id_menu = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());
	   		
			echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';


	}
	
?>
