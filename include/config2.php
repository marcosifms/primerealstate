<?php
/*
$host  = "localhost"; 
$db = "triady_site"; 
$user = "root"; 
$pass = "";
*/

$host  = "db_triady_dev.mysql.dbaas.com.br"; 
$db = "db_triady_dev"; 
$user = "db_triady_dev"; 
$pass = "innov@r2020";


//Conex�o com servidor - banco de dados
   $con = mysqli_connect("$host","$user","$pass","$db") or die ("N�o foi poss�vel realizar a conex�o com o servidor !!!");
   
    mysqli_query($con,"SET NAMES 'utf8'");
	mysqli_query($con,"SET character_set_connection=utf8");
	mysqli_query($con,"SET character_set_client=utf8");
	mysqli_query($con,"SET character_set_results=utf8");
	
   //seleciona a banco de dados contas
   //$db = mysqli_select_db("$db",$con) or die ("N�o foi poss�vel selecionar o banco de dados !!!");
?>