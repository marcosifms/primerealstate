<?php

$host  = "localhost"; 
$db = "age37778_prime_real_state"; 
$user = "root"; 
$pass = "";

/*
$host  = "162.241.62.76"; 
$db = "age37778_dev_prime_real_estate"; 
$user = "age37778_devinnovar"; 
$pass = "qqWrVNtkz]p5";
*/

//Conexao com servidor - banco de dados
$con = mysqli_connect("$host","$user","$pass","$db") or die ("Nao foi possivel realizar a conexao com o servidor !!!");

mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,"SET character_set_connection=utf8");
mysqli_query($con,"SET character_set_client=utf8");
mysqli_query($con,"SET character_set_results=utf8");

?>