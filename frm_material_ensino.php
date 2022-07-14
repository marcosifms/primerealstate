<?php

include ('valida_session.php');


@$id = $_GET['id'];
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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Material de Apoio</h3>
            </div>
			
           
            <form name="cadastro" id="cadastro" role="form" method="post" action="src/grava_material.php" enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?php echo $id; ?>">

              <div class="box-body">
                <div class="form-group">
                  <label for="nome_material">Nome do Material</label>
                  <input type="text" class="form-control" id="nome_material" name="nome_material" >
                </div>

                <div class="form-group">
                  <label for="pdf">Selecione o aqruivo</label>
                  <input type="file" class="form-control" id="pdf" name="pdf" required>
                </div>

			       </div>
              <!-- /.box-body -->

              <div class="box-footer">
                
                <button type="submit" class="btn btn-primary">Gravar</button>
                 <button type="button" class="btn btn-warning" onClick="window.location = 'gerenciar_ensino.php'">Voltar</button>
                
              </div>
            </form>
          
          </div>
       </div>
      

       <!-- histórico -->
      <div class="col-md-6">
          <!-- Horizontal Form -->
       
        <!-- left column -->
       
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Materiais Disponíveis</h3>
            </div>
      
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="94%">Materiais</th>
                    
                    <th width="3%"></th>
                    <th width="3%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($con, "select * from ensino_materiais where cod_ensino = '$id'");
                      
                      while($array = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    
                    <td><?php print $array['nome_material'];?></td>

                    <td>
                    <div align="center" class="btn-group">
                      <a href="../materiais/<?php print $id;?>/<?php print $array['arquivo_pdf'];?>" target="_blank"><button type="button" class="btn btn-info" title="Material em PDF"><i class="fa fa-file-pdf-o"></i></button></a>                    
                    </div>
                  </td>
              
                    <td>
                    <div class="btn-group">
                        <a href="src/exclui_material_ensino.php?id=<?php print $array['id_material']; ?>"><button type="button" class="btn btn-danger" title="Excluir" onclick="return confirm('Deseja remover esse registro?');"><i class="fa  fa-times-circle"></i></button></a>
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
