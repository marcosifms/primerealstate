<?php
include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];
$dir="../../img/exames/";
		
		$resultado1 = mysqli_query($con, "select img_exame from exames_img where id_img_exame = '$id'");
			while($row = mysqli_fetch_array($resultado1)){
     			 $img=$row['img_exame'];
	 		 }

				unlink($dir.$img);
				
		$qryIncluir = "delete from exames_img where id_img_exame = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));	
	   		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

	
?>