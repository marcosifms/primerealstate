<?php
include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];
$dir="../../img/convenios/";
		
		$resultado1 = mysqli_query($con, "select img_convenio from convenios where id_convenio = '$id'");
			while($row = mysqli_fetch_array($resultado1)){
     			 $img=$row['img_convenio'];
	 		 }

				unlink($dir.$img);
				
		$qryIncluir = "delete from convenios where id_convenio= '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));	
	   		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';

	
?>