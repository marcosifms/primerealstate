<?php
include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];
$dir="../../img/clinica/";
		
		$resultado1 = mysqli_query($con, "select img_inst from institucional_imagens where id_inst_img = '$id'");
			while($row = mysqli_fetch_array($resultado1)){
     			 $img=$row['img_inst'];
	 		 }

				unlink($dir.$img);
				
		$qryIncluir = "delete from institucional_imagens where id_inst_img = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));	
	   		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

	
?>