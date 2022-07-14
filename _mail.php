<?php
include "include/config.php";
require_once('php/class.phpmailer.php');

$msg = "";
$tamanho=6;
$email_db="";
$nome_usuario="";
            
if ( $_SERVER['REQUEST_METHOD']  == 'POST' ) {
                
  $email = $_POST['email'];

  $alfabeto = '0123456789';
  $minimo = 0;
  $maximo = strlen($alfabeto) - 1;

  // Gerando a sequencia
  $sequencia = '';
  for ($i = $tamanho; $i > 0; --$i) {

    // Sorteando uma posicao do alfabeto
    $posicao_sorteada = mt_rand($minimo, $maximo);

    // Obtendo o simbolo correspondente do alfabeto
    $caractere_sorteado = $alfabeto[$posicao_sorteada];

    // Incluindo o simbolo na sequencia
    $sequencia .= $caractere_sorteado;
  }

  $nova_senha = sha1($sequencia);

  $query = mysqli_query($con,"select * from login where email_usuario='$email'");

  while($array = mysqli_fetch_array($query)){
    @$email_db = $array['email_usuario'];
    @$nome_usuario = $array['nome_usuario'];
  }

  if($email_db == $email){

    $query_senha = mysqli_query($con,"update login set senha_acesso='$nova_senha' where email_usuario='$email'");

    $corpoMSG = "
    <strong>SISTEMA DE GESTIÓN - Recuperación de contraseña</strong>
    <br><br>
    Hola <strong>$nome_usuario</strong>, todo bien?
    <br><br>
    En respuesta a su solicitud, se generó la contraseña <strong>$sequencia</strong>  para su acceso al Sistema de Gestión.
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    -------------------------------------
    <br>
    Este correo electrónico fue generado automáticamente por el sistema, no responda.
    ";
                       
    // chamada da classe     
    $assunto = "Recuperación de contraseña - Sistema de Gestión";
    // instanciando a classe
    $mail   = new PHPMailer();

    //*************************************************************************
    // VARIÁVEIS EXCLUSIVAS PARA LOCAWEB
    $mail->IsSMTP();
    $mail->SMTPDebug = 1;
    $mail->Port = 587; //porta
    $mail->Host = 'email-ssl.com.br';// host
    $mail->SMTPAuth = true; //Define se haverá autenticação no SMTP
    $mail->Username = 'no-replay@agenciainnovar.com.br'; //Informe o e-mai o completo
    $mail->Password = '9Bleoh@28'; //Senha da caixa postal 
    //**************************************************************************
    // Habilita as saídas de erro em Português
    $mail->setLanguage('br'); 
    // Habilita o envio do email como 'UTF-8'                         
    $mail->CharSet='UTF-8';                              
    // email do remetente
    $mail->SetFrom('no-replay@agenciainnovar.com.br', 'Recuperación de contraseña - Sistema de Gestión');
    // email do destinatario
    $address = $email;
    $mail->AddAddress($address, "Teste");
    //$mail->AddCC('contato@agenciainnovar.com.br', 'Copia'); // Copia
    // assunto da mensagem
    $mail->Subject = $assunto;
    // corpo da mensagem
    $mail->MsgHTML($corpoMSG);
    // anexar arquivo
    //$mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );

    if(!$mail->Send()) {
      echo "<div style='height:60px;'><span style='color: red; border: 3px solid red; width: 100%; padding: 10px; display: inline-block;'>ERROR! ". $mail->ErrorInfo."</span></div>";  
                        
      } else {
        echo "<div style='height:60px;'><span style='color: #093; border: 1px solid #093; width: 100%; padding: 5px; display: inline-block;'>La nueva contraseña ha sido enviada al correo electrónico de registro.</span></div>";
      }
  }
  else {
    
    echo "<div style='height:60px;'><span style='color: red; border: 1px solid red; width: 100%; padding: 5px; display: inline-block;'>Correo electrónico no registrado en el sistema. Cheque!</span></div>";
  }
}
?>