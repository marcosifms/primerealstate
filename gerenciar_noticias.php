<?php

include 'valida_session.php';

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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Gerenciar postagens</h3>
            </div>
			
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="4%">Cod.</th>
                  <th width="10%">Data</th>
                  <th width="36%">Titulo</th>
                  <th width="3%" class="hidden-phone">&nbsp;</th>
                  <th width="3%" class="hidden-phone">&nbsp;</th>
                  <th width="3%" class="hidden-phone">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sqlCon = "select * from noticias";
                  $resCon = mysqli_query($con, $sqlCon);
                  if($resCon === FALSE) { 
                     die(mysql_error()); // TODO: better error handling
                  } 
                while($row = mysqli_fetch_array($resCon))
                { 
                ?>
                <tr>
                  
                  <td><?php echo $row['idnoticias'];?></td>
                      
                        <td><?php $databr = databr($row['data_noticia']); echo $databr;?></td>
                       
                        <td><?php echo $row['titulo_noticia'];?></td>

                  <td>
                  <div align="center" class="btn-group">
                      <a href="frm_altera_imagem_noticia.php?id=<?php print $row['idnoticias'];?>"><button type="button" class="btn btn-info" title="Alterar imagem"><i class="fa fa-camera"></i></button></a>                    
                    </div>
                  </td>
                  

                  <td>
                  <div align="center" class="btn-group">
                  		<a href="frm_altera_cadastro_noticia.php?id=<?php print $row['idnoticias'];?>"><button type="button" class="btn btn-info" title="Alterar"><i class="fa fa-pencil-square-o"></i></button></a>                    
                    </div>
                  </td>
                  	
                  <td>
                  <div class="btn-group">
                  		<a href="src/sql_exclui_cadastro_noticia.php?id_noticia=<?php print $row['idnoticias'];?>"><button type="button" class="btn btn-danger" title="Excluir" onclick="return confirm('Deseja remover esse registro?');"><i class="fa  fa-times-circle"></i></button></a>
                  </div>
                  </td>
                </tr>
                <?php } ?>
          		</tbody>
                
                </tfoot>
              </table>
              </div>
          </div>
       </div>
      </div>
    </section>
  
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
