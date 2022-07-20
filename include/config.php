<?php

/*
$host  = "localhost"; 
$db = "age37778_prime_real_state"; 
$user = "root"; 
$pass = "";

*/

// fwlr 08/07 - criado para fazer a conexão
$host  = "localhost"; 
$db = "age37778_prime_real_state"; 
$user = "root"; 
$pass = "";


/*
//mpv 16/07/2022 novo banco de dados
$host  = "prime_real_sta.mysql.dbaas.com.br"; 
$db = "prime_real_sta"; 
$user = "prime_real_sta"; 
$pass = "Prime22@@";
*/

//Conexao com servidor - banco de dados
$con = mysqli_connect("$host","$user","$pass","$db") or die ("Nao foi possivel realizar a conexao com o servidor !!!");

mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,"SET character_set_connection=utf8");
mysqli_query($con,"SET character_set_client=utf8");
mysqli_query($con,"SET character_set_results=utf8");

?>