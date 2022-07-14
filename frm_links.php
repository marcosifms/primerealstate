<?php

  include ('valida_session.php');

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
              <h3 class="box-title">Links</h3>
            </div>
			
           
            <form name="cadastro" id="cadastro" role="form" method="post" action="src/grava_link.php" enctype="multipart/form-data">

              <div class="box-body">
                <div class="form-group">
                  <label for="nome_link">Nome da Link</label>
                  <input type="text" class="form-control" id="nome_link" name="nome_link" >
                </div>

                <div class="form-group">
                  <label for="link">Link</label>
                  <input type="text" class="form-control" id="link" name="link" >
                </div>

                <div class="form-group col-md-6">
              <label for="proprietario_imovel">Propietario</label>
                  <select class="form-control select2" name="proprietario_imovel" id="proprietario_imovel" required>
                    
                   <?php 
                     $sqlcx = mysqli_query($con, "select * from clientes");
                          while($row=mysqli_fetch_array($sqlcx)){ 
                   ?>
                    <option value="<?php echo $row['id_cliente'];?>"><?php echo $row['nome_cliente'];?></option>
                   <?php } ?>
              </select>
            </div>

			       </div>
              <!-- /.box-body -->

              <div class="box-footer">
                
                <button type="submit" class="btn btn-primary">Gravar</button>
                
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
              <h3 class="box-title">Links cadastrados</h3>
            </div>
      
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="95%">Links</th>
                    
                    <th width="5%"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query($con, "select * from links");
                      
                      while($array = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    
                    <td><strong><?php print $array['nome_link'];?></strong><?php echo "<br>";print $array['link'];?></td>
              
                    <td>
                    <div class="btn-group">
                        <a href="src/exclui_link.php?id=<?php print $array['id_link']; ?>"><button type="button" class="btn btn-danger" title="Excluir" onclick="return confirm('Deseja remover esse registro?');"><i class="fa  fa-times-circle"></i></button></a>
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
