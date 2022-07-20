<?php
include ('valida_session.php');

$data_atual = $_POST['data_geracao'];

$id_contrato = $_POST['id'];

$resultado = mysqli_query($con,"SELECT * FROM contratos INNER JOIN clientes ON clientes.id_cliente = contratos.cliente_contrato INNER JOIN imoveis ON imoveis.id_imovel = contratos.imovel_contrato INNER JOIN tipo_contrato ON tipo_contrato.id_tipo_contrato = contratos.tipo_contrato INNER JOIN tipo_moeda ON tipo_moeda.id_moeda = contratos.tipo_moeda_contrato where id_contrato = '$id_contrato'");

while($row = mysqli_fetch_array($resultado)){
    $inicio_vigencia_contrato = databr($row['inicio_vigencia_contrato']);
    $fim_vigencia_contrato = databr($row['fim_vigencia_contrato']);

    $sigla_moeda = $row['sigla_moeda'];
    $desc_moeda = $row['desc_moeda'];
    $simbolo_moeda = $row['simbolo_moeda'];
    $valor_parcela_contrato = $row['valor_parcela_contrato'];
    $garantia_contrato = $row['garantia_contrato'];

    $cliente_locatario = $row['cliente_locatario'];
    
    $nome_cliente = $row["nome_cliente"];
    $estado_civil_cliente = $row["estado_civil_cliente"];
    $rg_ci_cliente = $row["rg_ci_cliente"];
    $cpf_cnpj_cliente = $row["cpf_cnpj_cliente"];
    $endereco_cliente = $row["endereco_cliente"];
    $numero_cliente = $row["numero_cliente"];
    $bairro_cliente = $row["bairro_cliente"];
    $cidade_cliente = $row["cidade_cliente"];
    $estado_cliente = $row["estado_cliente"];
    $pais_cliente = $row["pais_cliente"];
    $contato_cliente = $row["contato_cliente"];
    $email_cliente = $row["email_cliente"];
    $observacoes_cliente = $row["observacao_cliente"];

    $imovel_tipo = $row["imovel_tipo"];
    $tipo_construcao_imovel = $row["tipo_construcao_imovel"];
    $endereco_imovel = $row["endereco_imovel"];
    $bairro_imovel = $row["bairro_imovel"];
    $cidade_imovel = $row["cidade_imovel"];
    $estado_imovel = $row["estado_imovel"];
    $pais_imovel = $row["pais_imovel"];
    $matricula_imovel = $row["matricula_imovel"];
    $fracao_imovel = $row["fracao_imovel"];
    $cct_cadastral_imovel = $row["cct_cadastral_imovel"];
    $descricao_imovel = $row["descricao_imovel"];


    }

    $resultado2 = mysqli_query($con,"SELECT * FROM clientes where id_cliente = '$cliente_locatario'");
    while($row = mysqli_fetch_array($resultado2)){
        $nome_cliente_locatario = $row["nome_cliente"];
        $estado_civil_cliente_locatario = $row["estado_civil_cliente"];
        $rg_ci_cliente_locatario = $row["rg_ci_cliente"];
        $cpf_cnpj_cliente_locatario = $row["cpf_cnpj_cliente"];
        $endereco_cliente_locatario = $row["endereco_cliente"];
        $numero_cliente_locatario = $row["numero_cliente"];
        $bairro_cliente_locatario = $row["bairro_cliente"];
        $cidade_cliente_locatario = $row["cidade_cliente"];
        $estado_cliente_locatario = $row["estado_cliente"];
        $pais_cliente_locatario = $row["pais_cliente"];
        $contato_cliente_locatario = $row["contato_cliente"];
        $email_cliente_locatario = $row["email_cliente"];
        $observacoes_cliente_locatario = $row["observacao_cliente"];
    }

        $datafinal = explode("-", $data_atual);
            $mes = $datafinal[1];
            switch ($mes){
              case 1:
                $nomemes = "enero";
              break;
              case 2:
                $nomemes = "febrero";
              break;
              case 3:
                $nomemes = "marcha";
              break;
              case 4:
                $nomemes = "abril";
              break;
              case 5:
                $nomemes = "mayo";
              break;
              case 6:
                $nomemes = "junio";
              break;
              case 7:
                $nomemes = "julio";
              break;
              case 8:
                $nomemes = "agosto";
              break;
              case 9:
                $nomemes = "septiembre";
              break;
              case 10:
                $nomemes = "octubre";
              break;
              case 11:
                $nomemes = "noviembre";
              break;
              case 12:
                $nomemes = "diciembre";
              break;
              }
              
              $dia =  $datafinal[2];
              $ano = $datafinal[0];


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
   
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- CK Editor -->
  <script src="bower_components/ckeditor/ckeditor.js"></script>
  <!-- Pace style -->
  <link rel="stylesheet" href="plugins/pace/pace.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
	<?php include ('_header.php'); ?>
</header>
  
  <!-- menu lado esquerdo -->
  
  <?php include ('_aside.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
  
  <!-- CONTEÚDO DA PÁGINA --->
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Contrato</h3>
            </div>
			

            

         
            <form name="cadastro" id="cadastro" role="form" method="post" action="relatorio_contrato.php" enctype="multipart/form-data">

              <div class="box-body">

                <div class="form-group col-xs-12">
                  <label for="noticia">Texto</label>
                  
                  <textarea class="ckeditor" name="texto_contrato" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                      <p class="lead">Por medio de la presente, en mi carácter de propietario, Yo:</p>
                    
                    <p class="lead">

                      <strong>Nombre: </strong><?php echo $nome_cliente; ?>, <strong>RG/C.I.: </strong><?php echo $rg_ci_cliente;?>, <strong>CPF/RUC: </strong><?php if (empty($cpf_cnpj_cliente)) { $var = "******"; } else { $var = $cpf_cnpj_cliente; } echo $var;?>, <strong>Domicilio: </strong><?php echo $endereco_cliente;?>, <strong>Barrío: </strong><?php echo $bairro_cliente; ?>, <strong>Ciudad: </strong><?php echo $cidade_cliente; ?>, <strong>Departamento: </strong><?php echo $estado_cliente; ?>, <strong>Estado Civil: </strong><?php echo $estado_civil_cliente;?>

                    </p class="lead">

                    <p>En adelante <strong>EL PROPIETARIO</strong>, otorgo autorización irrevocable y en forma exclusiva a partir de la fecha al <strong>COMPAÑÍA FORTUNA S.A.</strong>, sociedad anónima, establecida en la calle Teniente Herrero casi Jorge Casaccia, inscripta en el <strong>RUC nº 80105541-5</strong>, representada por su Presidente en adelante, <strong>EL MANDATARIO</strong>, para que por mi cuenta y orden publique, alquile, administra y contrate en forma irrestricta un inmueble de mi exclusivo dominio, sito en la:</p>

                    <p>

                      <strong>Calle: </strong><?php echo $endereco_imovel;?>, <?php echo $imovel_tipo; ?><br>
                      <strong>Barrio: </strong><?php echo $bairro_imovel;?> <br>
                      <strong>Fracción: </strong><?php if (empty($fracao_imovel)) { $var1 = "******"; } else { $var1 = $fracao_imovel; } echo $var1;?><br>
                      <strong>Matricula: </strong><?php echo $matricula_imovel;?><br>
                      <strong>CCT. Cadastral: </strong><?php if (empty($cct_cadastral_imovel)) { $var2 = "******"; } else { $var2 = $cct_cadastral_imovel; } echo $var2;?> <br>
                      <strong>Ciudad: </strong><?php echo $cidade_imovel;?> - <strong>Departamento: </strong><?php echo $estado_imovel; ?> 

                    </p>

                    <p>Cuyas características son:</p>

                    <div style="border: 2px solid; padding: 20px 20px 20px 20px;">
                    <p><strong><?php echo $imovel_tipo; ?></strong> en <?php echo $tipo_construcao_imovel; ?>, sobre <?php echo $endereco_imovel;?>, que contiene:</p>

                    <p>
                      <strong><?php echo $descricao_imovel;?></strong>
                    </p>
                    </div>

                    <p>Atesta por ese contrato El firmante que referiedo inmueble contiene pintura nueva y está en perfecto estado, debendo ser entregue en la fechada aplazada, en igual estado.</p>

                    <p><strong>PRIMERA:</strong> La empresa <strong>COMPAÑÍA FORTUNA S.A.</strong>, por sus propios derechos y por la representación invocada, a quien adelante será denominada <strong>LOCADORA</strong>, concede en locación al:</p>

                    <p>Sr./Sra./Razón Social</p>

                    <strong>Nombre: </strong><?php echo $nome_cliente_locatario; ?>, <strong>RG/C.I.: </strong><?php echo $rg_ci_cliente_locatario;?>, <strong>CPF/RUC: </strong><?php if (empty($cpf_cnpj_cliente_locatario)) { $var_locatario = "******"; } else { $var_locatario = $cpf_cnpj_cliente_locatario; } echo $var_locatario;?>, <strong>Domicilio: </strong><?php echo $endereco_cliente_locatario;?>, <strong>Barrío: </strong><?php echo $bairro_cliente_locatario; ?>, <strong>Ciudad: </strong><?php echo $cidade_cliente_locatario; ?>, <strong>Departamento: </strong><?php echo $estado_cliente_locatario; ?>, <strong>Estado Civil: </strong><?php echo $estado_civil_cliente_locatario;?>


                    <p><strong>PLAZO:</strong><p>

                    <p><strong>SEGUNDA</strong>: El plazo de duración del presente contrato será desde la fecha: <strong><?php echo $inicio_vigencia_contrato;?></strong> hasta el día <strong><?php echo $fim_vigencia_contrato;?></strong>, si hubiere acuerdo entre las partes pudiendo ser renovado en un periodo similar o distinto, a cuyo efecto suscribirán un nuevo contrato antes de los (30) días del término del presente contrato.</p>

                    <p><strong>PRECIO:</strong><p>

                    <p><strong>TERCERA</strong>: 1Queda establecido entre las partes, el precio de locación fija la suma de: <strong><?php echo $sigla_moeda;?></strong> <strong><?php echo $valor_parcela_contrato;?></strong> (<?php echo valorPorExtenso($valor_parcela_contrato);?> <?php echo $desc_moeda;?> (<?php echo $sigla_moeda;?>), los cuales serán abonados en forma mensual día 12 de cada mes, siendo que por cada pago realizado la LOCADORA suscribirá recibo a favor del LOCATARIO, sirviendo de suficiente instrumento para justificar el pago.</p>


                    <p><strong>GARANTÍA</strong><p>

                    <p><strong>CUARTA</strong>: El LOCATARIO entrega a la LOCADORA la suma de <strong><?php echo $sigla_moeda;?></strong> <strong><?php echo $garantia_contrato;?></strong> (<?php echo valorPorExtenso($garantia_contrato);?>) <?php echo $desc_moeda;?> (<?php echo $simbolo_moeda;?>) que servirán para la refacción del inmueble al termino del contrato.</p>

                    <p><strong>QUINTA</strong>: El atraso de dos cuotas en forma consecutiva facultará a la LOCADORA a rescindir en forma inmediata el presente contrato, sin obligación de notificación de ninguna clase o naturaleza, donde el LOCATARIO deberá abonar sobre las cuotas en atraso, el 10% (diez por ciento) mensual, en concepto de multa por mora, pudiendo recurrir a las vías legales para el cobro de lo adeudado.</p>

                    <p><strong>SEXTA</strong>: Manifiesta el LOCATARIO que ha recibido el bien inmueble con las dependencias y carácter descriptas en la PÁGINA UNO de ese, obligándose a consérvalos y mantenerlos en las mismas condiciones recibidas.</p>

                    <p><strong>PÁRRAFO UNICO</strong>: Todo gasto que deba hacerse para la conservación y mantenimiento del inmueble durante la vigencia de este contrato serán soportados exclusivamente por el LOCATARIO.</p>

                    <p><strong>SETIMA</strong>: El LOCATARIO no podrá ceder, subalquilar, ni transferir a terceros los derechos de obligaciones que por este contrato le corresponden, sin la previa y expresa conformidad de la LOCADORA por escrito.</p>

                    <p><strong>OCTAVA</strong>: El LOCATARIO no podrá introducir mejoras que podrán alterar sustancialmente la estructura original del inmueble.</p>

                    <p><strong>PÁRRAFO UNICO</strong>: En caso de necesarios arreglos en la cañería, instalaciones eléctricas y otros artefactos del inmueble durante la vigencia del presente instrumento, correrá a cargo del LOCATARIO los gastos.</p>

                    <p><strong>NOVENA</strong>: El LOCATARIO se obliga el pago del consumo de energía eléctrica (ANDE) y otros servicios que el mismo desee, siendo que esto no podrá imputarse al precio de la locación. El LOCATARIO debe suministrar a la LOCADORA los comprobantes de pago efectuados por los conceptos enunciados en forma mensual.</p>

                    <p><strong>DÉCIMA</strong>: El LOCATARIO se compromete terminantemente a:</p>

                    <p>a) No dar otro destino más que el especificado en la cláusula primera;</p>

                    <p>b) El orden, la moral y la higiene serán estrictamente exigidos dentro del bien cuando ubicado en edificios y las exigidas de acuerdo a las ordenanzas municipales;</p>

                    <p>c) No introducir ningún tipo de estupefacientes, material bélico, o alguna otra cosa ilícita dentro del inmueble;</p>

                    <p>d) Deberá cumplir con el reglamento interno cuando haya uno.</p>

                    <p><strong>UNDÉCIMA</strong>: El LOCATARIO toma sobre sí la responsabilidad derivada del riesgo de la utilización o manejo de cualquier artefacto, instalación o aparato de electricidad, refrigeración o similares en el bien alquilado o que fuera puesto en lo sucesivo, así como los derivados de extravíos de cosas o pertenencias, y los accidentes personales que en inmueble pudieran suceder. La LOCADORA queda expresamente liberada de todo ello.</p>

                    <p><strong>DUODÉCIMA</strong>: Queda expresamente determinado que solamente a partir de la recepción del bien inmueble y los bienes muebles de forma escrita, cesan las obligaciones del presente contrato, y no la mera desocupación de la unidad por parte del LOCATARIO.</p>

                    <p><strong>DÉCIMA TERCERA</strong>: En caso de incumplimiento del presente contrato generará una multa de R$ 2.600,00 (dos mil seiscientos) reales (BRL) y el incumplimiento en cualquiera de sus cláusulas o condiciones correrán por cuenta y cargo exclusivo del LOCATARIO, los gastos que ocasionen, como así también los honorarios profesionales de abogados, tanto en los arreglos judiciales como en los extrajudiciales.</p>

                    <p><strong>DÉCIMA CUARTA</strong>: Si cualquiera de las partes deseare rescindir el contrato, queda establecido de la siguiente manera: Si la LOCADORA deseare rescindir el contrato deberá comunicar por escrito a la otra parte, con una anticipación de 60 (sesenta) días al LOCATARIO. En caso que el LOCATARIO deseare rescindir antes de la fecha de vencimiento, deberá comunicar por escrito con una anticipación de 60 (sesenta) días o abonar por dos meses de alquiler para su retiro inmediato.</p>

                    <p><strong>DÉCIMA QUINTA</strong>: Toda cuestión que suscitare entre las partes, en virtud de este contrato, será dirimida por los Jueces y Tribunales de la Circunscripción Judicial de Pedro Juan Caballero, Departamento de Amambay.</p>

                    <p><strong>DÉCIMA SEXTA</strong>: Para todo lo no previsto en este contrato se aplicarán las leyes vigentes en la materia.</p>


                    <p>Bajo las bases que preceden, las partes dan por formalizado el presente contrato cuyo fiel cumplimiento se obligan. De acuerdo y conforme a derecho, suscribiéndole en dos ejemplares de un mismo tenor y a un solo efecto, en esa ciudad en la fecha indicada.</p>
                    <br><br><br>
                    <div style="text-align: right;">
                      <p class="lead">Pedro Juan Caballero – PY, <?php echo $dia;?> de <?php echo $nomemes;?> de <?php echo $ano;?>. </p>
                    </div>

                     <p class="lead">
                      <br><br><br><br>

                      --------------------------------------------------------------<br><strong>Deudor,<br><?php echo $nome_cliente_locatario;echo "<br>";echo $rg_ci_cliente; ?></strong>
                      <br><br><br><br>
                      --------------------------------------------------------------<br><strong>CONTRATADO<br><?php echo $nome_cliente; ?></strong>

                  </p>






                          </textarea>
                </div>              
                
			       </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Gerar</button>
                <button type="button" class="btn btn-warning" onClick="window.location = 'gerenciar_contratos.php'">Voltar</button>
              </div>
            </form>
    
          </div>
       </div>
      </div>
     </section>
          <!-- /.box -->
  
  
  <!-- FINAL DO CONTEÚDO -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
    include ('_footer.php');
  ?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- scripts -->
<?php  include ('_script.php'); ?>

</body>
</html>
