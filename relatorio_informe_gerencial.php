<?php

include ('valida_session.php');

$id_centro_custo = $_POST['centro_custo'];
$competencia = $_POST['competencia'];

$partes = explode("/", $competencia);
$mes_comp = $partes[0];
$ano_comp = $partes[1];

$resultado2 = mysqli_query($con,"SELECT * from lancamentos WHERE mes_lancamento='$mes_comp' AND ano_lancamento='$ano_comp'");
$linhas = mysqli_num_rows($resultado2);

if ($linhas == '0') {
  print"<script>alert('No hay entradas para esta habilidad.')</script>";
  echo '<script language="javascript" type="text/javascript">history.go(-1);</script>';
}



$resultado1 = mysqli_query($con,"SELECT * from imoveis WHERE centro_custo_imovel = '$id_centro_custo'");
while($row = mysqli_fetch_array($resultado1)){
    $id_imovel = $row['id_imovel'];
    }

$resultado = mysqli_query($con,"SELECT * FROM contratos INNER JOIN clientes ON clientes.id_cliente = contratos.cliente_contrato INNER JOIN imoveis ON imoveis.id_imovel = contratos.imovel_contrato INNER JOIN tipo_contrato ON tipo_contrato.id_tipo_contrato = contratos.tipo_contrato INNER JOIN tipo_moeda ON tipo_moeda.id_moeda = contratos.tipo_moeda_contrato where imovel_contrato = '$id_imovel'");

while($row = mysqli_fetch_array($resultado)){
    $id_contrato = $row['id_contrato'];
    $inicio_vigencia_contrato = databr($row['inicio_vigencia_contrato']);
    $fim_vigencia_contrato = databr($row['fim_vigencia_contrato']);
    $data_contrato = $row['data_contrato'];

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

        $datafinal = explode("-", $data_contrato);
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      
    </section>

    

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      
      

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <div align="center"><img src="img/logo_prime_real_state.png" width="200px"><h3><strong>PRIME REAL STATE</strong></h3></div>
          <div align="center"><h3><small>INFORME GERENCIAL</small></h3></div>

          <div align="left"><h3><strong>CENTRO DE COSTOS</strong></h3></div>
          <br>
           
          
          <div style="text-align: justify;">

          <p class="lead">
              <div class="col-lg-6 lead"><strong>PROPRIETÁRIO: </strong><?php echo $nome_cliente; ?></div>
              <div class="col-lg-6 lead"> <strong>CLIENTE: </strong><?php echo $nome_cliente_locatario; ?></div>
              <div class="col-lg-4 lead"><strong>CONTRATO Nº: </strong><?php echo $id_contrato;?>/<?php echo $ano; ?></div>
              <div class="col-lg-4 lead"><strong>ENTRADA:</strong> <?php echo $inicio_vigencia_contrato; ?></div>
              <div class="col-lg-4 lead"><strong>SAÍDA:</strong> <?php echo $fim_vigencia_contrato; ?></div>
              <div class="col-lg-4 lead"><strong>COMPETÊNCIA:</strong> <?php echo $competencia;?></div>
        
         <!--  <p class="lead"><strong>Nombre: </strong><?php echo $nome_cliente_locatario; ?>, <strong>RG/C.I.: </strong><?php echo $rg_ci_cliente_locatario;?>, <strong>CPF/RUC: </strong><?php if (empty($cpf_cnpj_cliente_locatario)) { $var_locatario = "******"; } else { $var_locatario = $cpf_cnpj_cliente_locatario; } echo $var_locatario;?>, <strong>Domicilio: </strong><?php echo $endereco_cliente_locatario;?>, <strong>Barrío: </strong><?php echo $bairro_cliente_locatario; ?>, <strong>Ciudad: </strong><?php echo $cidade_cliente_locatario; ?>, <strong>Departamento: </strong><?php echo $estado_cliente_locatario; ?>, <strong>Estado Civil: </strong><?php echo $estado_civil_cliente_locatario;?></p> -->

           <table class="table table-bordered table-striped lead">
                <thead>
                <tr>
                  <th>FECHA</th>
                  <th>PROVEDOR</th>
                  <th>SERVICO</th>
                  <th><div align="center">TIPO</div></th>
                  <th><div align="center">VALOR</div></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($con, "SELECT * from lancamentos
                      INNER JOIN tipo_lancamento ON tipo_lancamento.id_lanc = lancamentos.lancamento_tipo
                      INNER JOIN tipo_moeda ON tipo_moeda.id_moeda = lancamentos.moeda_lancamento
                      INNER JOIN fornecedores ON fornecedores.id_fornecedor = lancamentos.fornecedor_lancamento
                      INNER JOIN centro_custo ON centro_custo.id_ccusto = lancamentos.cc_custo_conta_lancamento

                      WHERE cc_custo_conta_lancamento = '$id_centro_custo' AND mes_lancamento='$mes_comp' AND ano_lancamento='$ano_comp' ORDER BY data_lancamento");
                      
                      while($array = mysqli_fetch_array($query)){
                       
                  ?>
                <tr>
                  <td><?php print databr($array['data_lancamento'])?></td> 
                  <td><?php print $array['nome_razao_social_fornecedor'];?></td> 
                  <td><?php print $array['descricao_lancamento'];?></td> 

                  <td><div align="center"><?php print $array['desc_lanc'];?></div></td> 

                  <td><div align="center"><?php print $array['sigla_moeda']; ?><?php print number_format($array['valor_lancamento'], 2, ',', '.');?></div></td> 
                  
                </tr>
                <?php } ?>
                </tbody>
              </table>

              <?php
                
                $querycredito = mysqli_query($con, "SELECT SUM(valor_lancamento) AS total_credito FROM lancamentos WHERE cc_custo_conta_lancamento = '$id_centro_custo' AND mes_lancamento='$mes_comp' AND ano_lancamento='$ano_comp' and lancamento_tipo = '1'");
                      while($array1 = mysqli_fetch_array($querycredito)){
                        $total_credito = $array1['total_credito'];
                      }

                $querydebito = mysqli_query($con, "SELECT SUM(valor_lancamento) AS total_debito FROM lancamentos WHERE cc_custo_conta_lancamento = '$id_centro_custo' AND mes_lancamento='$mes_comp' AND ano_lancamento='$ano_comp' and lancamento_tipo = '2'");
                      while($array2 = mysqli_fetch_array($querydebito)){
                        $total_debito = $array2['total_debito'];
                      }

                      $total_recebido = $total_credito - $total_debito;
              ?>
              
              <p class="lead"><strong>TOTAL CREDITO</strong>: <?php echo $sigla_moeda;echo " "; echo number_format($total_credito, 2, ',', '.'); ?></p>
              <p class="lead"><strong>TOTAL DEBITO</strong>: <?php echo $sigla_moeda;echo " "; echo number_format($total_debito, 2, ',', '.'); ?></p>
              <p class="lead"><strong>SALDO COMPETENCIA</strong>: <?php echo $sigla_moeda;echo " "; echo number_format($total_recebido, 2, ',', '.'); ?></p>
          

         
          <br><br><br><br>
          </div>
          
    

      <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" class="btn btn-default" onclick="print()"><i class="fa fa-print"></i> Imprimir</a>
          <button type="button" class="btn btn-warning" onClick="history.go(-1)">Voltar</button>
          
        </div>
      </div>
    </section>
   
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php  include ('_script.php'); ?>
</body>
</html>
