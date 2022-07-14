<?php
include "../valida_session.php";
include "../include/config.php";

$id = $_GET['id'];
$dir="../../img/ensino/";

$qryfotosensino = mysqli_query($con, "select * from ensino_fotos where cod_ensino = '$id'");

$linhas = mysqli_num_rows($qryfotosensino);

for ($i = 0; $i < $linhas; $i++) {
	
	while($row = mysqli_fetch_array($qryfotosensino)){
     	   $id_foto=$row['id_foto'];
     	   $execIncluir = mysqli_query($con, "delete from ensino_fotos where id_foto = '$id_foto'");
	 	}
	}
				
		$qryIncluir = "delete from ensino where id_ensino = '$id'";
		$execIncluir = mysqli_query($con, $qryIncluir);  
		if(!$execIncluir)
	   		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error());	
	   		echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
?>
