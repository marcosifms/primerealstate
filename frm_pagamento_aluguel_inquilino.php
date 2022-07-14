<?php

  include ('valida_session.php');

  $id_recibo = $_GET['idrecibo'];

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

  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detalles del pago - Inquilino</h3>
            </div>
			
           
            <form name="cadastro" id="cadastro" role="form" method="post" action="src/grava_pagamento_inquilino.php" enctype="multipart/form-data">

              <input type="hidden" name="id_recibo" value="<?php echo $id_recibo; ?>">

              <div class="box-body">

                <div class="form-group">
                  <label for="cota_pagamento">Cota Pagamento</label>
                  <input type="cota_pagamento" class="form-control" id="cota_pagamento" name="cota_pagamento" >
                </div>

                <div class="form-group">
                  <label for="desc_pagamento">Descripción</label>
                  <input type="desc_pagamento" class="form-control" id="desc_pagamento" name="desc_pagamento" >
                </div>

                <div class="form-group">
                  <label for="moeda_pagamento">Cambio monetário</label>
                    <select class="form-control "  name="moeda_pagamento" id="moeda_pagamento" required>
                      <option value=""></option>
                      <?php 
                        $sqlcx = mysqli_query($con, "select * from tipo_moeda");
                          while($row=mysqli_fetch_array($sqlcx)){ 
                      ?>
                        <option value="<?php echo $row['id_moeda'];?>"><?php echo $row['sigla_moeda'];echo " - "; echo $row['desc_moeda'];?></option>
                      <?php } ?>
                    </select>
                </div>

                 <div class="form-group">
                  <label for="tipo_lancamento">Contabilizaciones</label>
                      <select class="form-control" name="tipo_lancamento" id="tipo_lancamento" required>
                        
                       <?php 
                         $sqlcx = mysqli_query($con, "select * from tipo_lancamento");
                              while($row=mysqli_fetch_array($sqlcx)){ 
                       ?>
                        <option value="<?php echo $row['id_lanc'];?>"><?php echo $row['desc_lanc'];?></option>
                       <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="valor_pagamento">Valor</label>
                  <input type="valor_pagamento" class="form-control" id="valor_pagamento" name="valor_pagamento" >
                </div>

			       </div>
              <!-- /.box-body -->

                <div class="box-footer">
                  
                  <button type="reset" class="btn btn-success">Limpar</button>
                  <button type="submit" class="btn btn-primary">Gravar</button>
                  <button type="button" class="btn btn-warning" onClick="history.go(-1)">Voltar</button>
                  
                </div>
            </form>
          </div>
       </div>
      

       <!-- histórico -->
      <div class="col-md-8">
          <!-- Horizontal Form -->
      <div class="row">
        <!-- left column -->
       
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lançamentos - Inquilino</h3>
            </div>
      
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>COTA</th>
                  <th>DESCRIPCIÓN</th>
                  <th>VALOR</th>
                  <th>TIPO</th>
                  <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($con, "SELECT * from pagamento_aluguel_inquilino INNER JOIN tipo_lancamento ON tipo_lancamento.id_lanc = pagamento_aluguel_inquilino.tipo_lancamento_pagamento WHERE recibo_pagamento = '$id_recibo'");
                      
                      while($array = mysqli_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php print $array['cota_pagamento'];?></td> 
                  <td><?php print $array['desc_pagamento'];?></td>
                  <td><?php print $array['desc_lanc'];?></td> 
                  <td><?php print number_format($array['valor_pagamento'], 2, ',', '.');?></td> 
                  <td>
                  <div class="btn-group">
                      <a href="src/exclui_pagamento_recibo_inquilino.php?id=<?php print $array['id_pagamento']; ?>"><button type="button" class="btn btn-danger btn-xs" title="Excluir" onclick="return confirm('Deseja remover esse registro?');"><i class="fa fa-close"></i></button></a>
                  </div>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
              </div>
          </div>
      </div>
    </section>
    <!-- Final bloco histórico -->




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
  $('#valor_pagamento').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
})
</script>

</body>
</html>
