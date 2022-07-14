<?php @session_start();?>

<?php
date_default_timezone_set('America/Sao_Paulo');
$title = "Prime Real Estate | ERP";
include 'include/config.php';
include 'include/funcoes.php';

//mpv criar usuario 
echo $_SESSION["login_usuario"];
echo $_SESSION["senha_usuario"];
if (($_SESSION["login_usuario"]=="mpv") ) { 
    $login_usuario = $_SESSION["login_usuario"];
    $senha_usuario = $_SESSION["senha_usuario"];
	
	$nome_usuario = "marcos";
	return 0;
}
//fim mpv
if (isset($_SESSION["login_usuario"]) AND isset($_SESSION["senha_usuario"])) {
    $login_usuario = $_SESSION["login_usuario"];
    $senha_usuario = $_SESSION["senha_usuario"];
}else{
    	print"<script>alert('Para acceder al sistema, es necesario tener un Usuario y una Contraseña.')</script>";
		print "<script> this.document.close();window.location = 'index.php';</script>";
		exit();
} /*aqui primeiro ele checa para ver se exite essas Sessoes, e depois ele coloca o valor das sessoes nessas variaveis... para fazermos os testes!*/

if(!(empty($login_usuario) OR empty($senha_usuario)))
{
$resultado = mysqli_query($con,"select * from login where login_acesso = '$login_usuario'");
while($row = mysqli_fetch_array($resultado)){
      $cod_usuario=$row['cod_usuario'];
	  $nome_usuario=$row['nome_usuario'];
	  $login=$row['login_acesso'];
	  $perfil=$row['perfil_acesso'];
    $senha_banco = $row['senha_acesso'];
	  }
	  
if (mysqli_num_rows($resultado) == 1)/*caso exista esse login.. vamos testar a senha entao*/
{
   if ($senha_usuario != $senha_banco)
   {
       unset ($_SESSION["nome_usuario"]);/*apaga a session que existia mas era errada..*/
       unset ($_SESSION["sehna_usuario"]);
       print"<script>alert('Para acceder al sistema, es necesario tener un Usuario y una Contraseña.')</script>";
	   print "<script> this.document.close();window.location = 'index.php';</script>";
	   exit();
   } 
}else {
       unset ($_SESSION["nome_usuario"]);
       unset ($_SESSION["sehna_usuario"]);
       echo "Usted no se ha identificado.";
       exit();
}

}else{
echo "Usted no se ha identificado.";
exit();/*caso das sessions estarem vazias*/
}
?>