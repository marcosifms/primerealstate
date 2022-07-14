<?php

include ('valida_session.php');

$exibir = "style='display:none'";
$hideform="";

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
  
  <!-- CONTEÚDO DA PÁGINA --->
  <section class="content-header">
       <h1>
        Cambiar Comunicados financieros         
      </h1>
  </section>
<?php

$id_lancamento = $_GET['id'];

$query = mysqli_query($con,"SELECT * FROM lancamentos INNER JOIN tipo_lancamento ON tipo_lancamento.id_lanc = lancamentos.lancamento_tipo INNER JOIN tipo_moeda ON tipo_moeda.id_moeda = lancamentos.moeda_lancamento INNER JOIN fornecedores ON fornecedores.id_fornecedor = lancamentos.fornecedor_lancamento INNER JOIN centro_custo ON centro_custo.id_ccusto = lancamentos.cc_custo_conta_lancamento INNER JOIN caixa ON caixa.id_caixa = lancamentos.caixa_lancamento WHERE id_lancamento = '$id_lancamento'");
                    
    while($array = mysqli_fetch_array($query)){
      $lancamento_tipo = $array['lancamento_tipo']; 
      $data_lancamento = $array['data_lancamento']; 
      $moeda_lancamento = $array['moeda_lancamento']; 

      $valor_lancamento = number_format($array['valor_lancamento'], 2, ',', '.');    

      $fornecedor_lancamento = $array['fornecedor_lancamento'];
      $cc_custo_conta_lancamento = $array['cc_custo_conta_lancamento'];
      $caixa_lancamento = $array['caixa_lancamento'];
      $num_doc_lancamento = $array['num_doc_lancamento'];
      $descricao_lancamento = $array['descricao_lancamento'];




      $desc_lanc = $array['desc_lanc'];
      
      $sigla_moeda = $array['sigla_moeda'];
      $desc_moeda = $array['desc_moeda'];
      

    }

?>
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
      		
            <div align='center' class='alert alert-success alert-dismissible' <?=$exibir;?>>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true' onClick="window.location = 'frm_lancamentos.php'">&times;</button>
                	<h4><i class='icon fa fa-check'></i> Processado com sucesso!</h4>
                  <small>Informações gravadas com Sucesso!</small>
              	</div>

            <div <?php echo $hideform; ?>>
            <form name="cadastro" id="cadastro" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

              <div class="box-body">
                <div class="form-group col-md-3">
                  <label for="tipo_lancamento">Contabilizaciones</label>
                      <select class="form-control" name="tipo_lancamento" id="tipo_lancamento" required>
                        
                        <option value="<?php echo $lancamento_tipo;?>"><?php echo $desc_lanc;?></option>
                        <option>---</option>
                        
                       <?php 
                         $sqlcx = mysqli_query($con, "select * from tipo_lancamento");
                              while($row=mysqli_fetch_array($sqlcx)){ 
                       ?>
                        <option value="<?php echo $row['id_lanc'];?>"><?php echo $row['desc_lanc'];?></option>
                       <?php } ?>
                  </select>
                </div>


                <div class="form-group col-md-3">
                  <label for="data_lancamento">Data</label>
                  <input type="date" class="form-control" id="data_lancamento" name="data_lancamento" value="<?php echo $data_lancamento;?>" required>
                </div>

                <div class="form-group col-md-3">
                  <label for="moeda_lancamento">Cambio monetário</label>
                    <select class="form-control "  name="moeda_lancamento" id="moeda_lancamento" required>
                      
                      <option value="<?php echo $moeda_lancamento;?>"><?php echo $sigla_moeda;echo " - "; echo $desc_moeda;?></option>
                      <option>---</option>
                      
                      <?php 
                        $sqlcx = mysqli_query($con, "select * from tipo_moeda");
                          while($row=mysqli_fetch_array($sqlcx)){ 
                      ?>
                        <option value="<?php echo $row['id_moeda'];?>"><?php echo $row['sigla_moeda'];echo " - "; echo $row['desc_moeda'];?></option>
                      <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                  <label for="valor_lancamento">Valor </label>
                  <input type="text" class="form-control" id="valor_lancamento" name="valor_lancamento" value="<?php echo $valor_lancamento;?>" required>
                </div>

                <div class="form-group col-md-3">
                  <label for="fornecedor_lancamento">Provedores</label>
                      <select class="form-control" name="fornecedor_lancamento" id="fornecedor_lancamento" required>
                         <option value=""></option>
                       <?php 
                         $sqlcx = mysqli_query($con, "select * from fornecedores");
                              while($row=mysqli_fetch_array($sqlcx)){ 
                       ?>
                        <option value="<?php echo $row['id_fornecedor'];?>"><?php echo $row['nome_fornecedor'];?></option>
                       <?php } ?>
                  </select>
                </div>

                <div class="form-group col-md-3">
                  <label for="cc_custo_lancamento">Centro de coste</label>
                      <select class="form-control" name="cc_custo_lancamento" id="cc_custo_lancamento" required>
                         <option value=""></option>
                       <?php 
                         $sqlcx = mysqli_query($con, "select * from centro_custo");
                              while($row=mysqli_fetch_array($sqlcx)){ 
                       ?>
                        <option value="<?php echo $row['id_ccusto'];?>"><?php echo $row['cod_ccusto'];?> - <?php echo $row['desc_ccusto'];?></option>
                       <?php } ?>
                  </select>
                </div>

                <div class="form-group col-md-3">
                  <label for="caixa_lancamento">Caja</label>
                    <select class="form-control "  name="caixa_lancamento" id="caixa_lancamento" required>
                      <option value=""></option>
                      <?php 
                        $sqlcx = mysqli_query($con, "select * from caixa");
                          while($row=mysqli_fetch_array($sqlcx)){ 
                      ?>
                        <option value="<?php echo $row['id_caixa'];?>"><?php echo $row['desc_caixa'];?></option>
                      <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                  <label for="num_doc_lancamento">Número del Documento </label>
                  <input type="text" class="form-control" id="num_doc_lancamento" name="num_doc_lancamento">
                </div>
                
                <div class="form-group col-md-12">
                      <label for="descricao_lancamento">Descripción</label>
                      <textarea name="descricao_lancamento" class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

			       </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Gravar</button>
                <button type="button" class="btn btn-warning" onClick="history.go(-1)">Voltar</button>
              </div>
            </form>
          </div>
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

<script>
$(function() {
  
 $('#valor_lancamento').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

})
</script>

</body>
</html>
