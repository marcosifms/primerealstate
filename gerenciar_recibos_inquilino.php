<?php

include 'valida_session.php';

$id_contrato = $_GET['id'];

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
<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  
  <!-- menu lado esquerdo -->
  
  <?php include ('_aside.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
  
  <!-- CONTE??DO DA P??GINA --->
  <section class="content-header">
       <h1>
        Recibos de Pagamento - Inquilino         
      </h1>
  </section>

  
      <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="col-md-6">
                <h3 class="box-title"></h3>
              </div>
              <div class="col-md-6">
                <div align="right"><button type="button" data-toggle="modal" data-target="#modalacadastro" class="btn btn-sm btn-success">AGREGAR NUEVO</button> &ensp;<button type="button" class="btn btn-sm btn-warning" onclick="history.go(-1)">CANCELAR</button></div>
              </div>
            </div>
			
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Cod Recibo</th>
                  <th>Data</th>
                  
                  <th width="2%"></th>
                  <th width="2%"></th>
                  <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                <?php
        					$query = mysqli_query($con,"select * from recibo_pagamento_inquilino where contrato_pagamento = '$id_contrato' and tipo_recibo = '1'");
        						
        						while($array = mysqli_fetch_array($query)){

        				?>
                <tr>
                  <td><?php print $array['id_recibo_pagamento'];?></td>
                  <td><?php print databr($array['data_pagamento']);?></td>
     
                  
                  <td>
                      <div align="center" class="btn-group">
                      		<a href="frm_pagamento_aluguel_inquilino.php?idrecibo=<?php echo $array['id_recibo_pagamento'];?>?idcontrato=<?php echo $id_contrato;?>"><button type="button" class="btn btn-info btn-xs" title="Incluir art??culos en el recibo"><i class="fa fa-plus-square-o"></i></button></a>                 
                      </div>

                  </td>

                   <td>
                      <a href="relatorio_recibo_pagamento_inquilino.php?idrecibo=<?php echo $array['id_recibo_pagamento'];?>?idcontrato=<?php echo $id_contrato;?>"><button type="button" class="btn btn-info btn-xs" title="impresi??n recibo"><i class="fa fa-print"></i></button></a>                   
                      </div>

                  </td>
                  	
                  <td>
                      <div class="btn-group">
                      		<button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal-excluir<?php echo $array['id_recibo_pagamento'];?>"><i class="fa fa-close"></i></button>
                      </div>
                  </td>
                </tr>
                
               
                
                    <!-- MODAL DE EXCLUS??O -->
                    <div class="modal modal-danger fade" id="modal-excluir<?php echo $array['id_recibo_pagamento'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ATENCI??N </h4>
                          </div>
                        <div class="modal-body">
                          <p>??Confirmas la eliminaci??n del registro seleccionado? </p>
                        
                          <form name="form1" id="form1" role="form" method="POST" action="src/exclui_recibo.php" enctype="multipart/form-data">
                              <input type="hidden" name="id" id="id" value="<?php echo $array['id_recibo_pagamento'];?>">
                          
                        </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-outline">Borrar</button>
                            </div>
                          </form>
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
                    <!-- FIM MODAL EXCLUS??O -->

                <?php } ?>
          		</tbody>
                
                </tfoot>
              </table>
              </div>
          </div>
       </div>
      </div>
    </section>
  
  <!-- FINAL DO CONTE??DO -->
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

<?php

  include ('_script.php');

?>
<!-- INCLUS??O DE REGISTRO -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function(){
        $(".msg").hide();
        jQuery('#cadastro').submit(function(){
          var dados = jQuery( this ).serialize();

          jQuery.ajax({
            type: "POST",
            url: "src/grava_recibo.php",
            data: dados,
            success: function( retorno )
            {
              $(".msg").html(retorno);
              $(".msg").show();
              $('.msg').fadeIn().delay(2000).fadeOut(function () {
                $(this).remove()
                $('#cadastro')[0].reset();
                location.reload();
                
              });
            }
          });
          return false;
        });
      });
    </script>

<div class="modal fade" id="modalacadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class= "modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar recibos</h4>
      </div>
      <div class="modal-body">
        <form name="cadastro" id="cadastro" role="form" method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="id_contrato" value="<?php echo $id_contrato; ?>">
          <div class="box-body">
            <div class="msg"></div>
             
            <div class="form-group col-md-4">
              <label for="data_recibo">Data</label>
              <input type="date" class="form-control" id="data_recibo" name="data_recibo" required>
            </div>

          </div>
          <!-- /.box-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Para registrar</button>
            </div>
        </form>
       
      </div>
    </div>
  </div>
</div>
</body>
</html>
