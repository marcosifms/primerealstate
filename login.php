<?php

//echo sha1("123"); 40bd001563085fc35165329ea1ff5c5ecbdbbeef
//return 0;
include "include/config.php";

//obtem os valores digitador
$login = $_POST["login"];
$senha = sha1($_POST["senha"]);
 
	   		session_start();//nunca esque�a de por isso antes de usar session
		    $_SESSION["login_usuario"] = $login;
		    $_SESSION["senha_usuario"] = $senha;
			$_SESSION[] = ''; 
            // redireciona par a pagina principal
			header("Location: principal.php");
 

if (empty($login) || empty($senha))
{
	print"<script>alert('Usuario no encontrado.')</script>";
	print "<script> this.document.close();window.location = 'index.php';</script>";
		exit();
}
$ativo = '';
//Conex�o com servidor - banco de dados
$resultado = mysqli_query($con,"select * from login where login_acesso = '$login'");
while($row = mysqli_fetch_array($resultado)){
      $nome_usuario = $row['nome_usuario'];
	  $perfil_acesso = $row['perfil_acesso'];
	  $ativo = $row['ativo'];
	  $senha_banco = $row['senha_acesso'];
	  }
$linhas = mysqli_num_rows($resultado);

if ($ativo == "A" || empty($ativo))
{
	if ($linhas ==0)//testa se a consulta retornou algum registro
	{
		print"<script>alert('Usuario incorrecto o no registrado en el sistema.')</script>";
	    print "<script> this.document.close();window.location = 'index.php';</script>";
		exit();
	} 	
	else 
	{
       if ($senha != $senha_banco)//confere a senha
       {
          print"<script>alert('¡Las contraseñas no coinciden! Por favor revisa e intenta de nuevo.')</script>";
		  print "<script> this.document.close();window.location = 'index.php';</script>";
		  exit();
       }
       else
	   {
	   		session_start();//nunca esque�a de por isso antes de usar session
		    $_SESSION["login_usuario"] = $login;
		    $_SESSION["senha_usuario"] = $senha;
            // redireciona par a pagina principal
			header("Location: principal.php");
	   }	
    }
}else
	{
		print"<script>alert('Su acceso ha sido inhabilitado por medidas de seguridad. Comuníquese con su administrador del sistema.')</script>";
		print "<script> this.document.close();window.location = 'index.php';</script>";
		exit();
	}
?>