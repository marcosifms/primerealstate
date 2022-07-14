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
  
  <!-- CONTEÚDO DA PÁGINA --->
  <section class="content-header">
       <h1>
        Accesos al sistema         
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
                <div align="right"><button type="button" data-toggle="modal" data-target="#modalacadastroacessosistema" class="btn btn-sm btn-success">AGREGAR NUEVO</button></div>
              </div>
            </div>
			
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Correo Electrónico</th>
                  <th>Usuário</th>
                  <th>Perfil Acesso</th>
                  <th>Activo</th>
                  <th width="2%"></th>
                  <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                <?php
        					$query = mysqli_query($con,"select * from login INNER JOIN perfil_acesso ON perfil_acesso.cod_perfil = login.perfil_acesso");
        						
        						while($array = mysqli_fetch_array($query)){

        				?>
                <tr>
                  <td><?php print $array['nome_usuario'];?></td>
                  <td><?php print $array['email_usuario'];?></td>
                  <td><?php print $array['login_acesso'];?></td>
                  <td><?php print $array['desc_perfil_acesso'];?></td>
                  <td><?php print $array['ativo'];?></td>
                  
                  <td>
                      <div align="center" class="btn-group">
                      		<button type="button" class="btn btn-info btn-xs" title="Alterar" data-toggle="modal" data-target="#modalalterauser<?php echo $array['cod_usuario'];?>"><i class="fa fa-pencil-square-o"></i></button>                    
                      </div>

                  </td>
                  	
                  <td>
                      <div class="btn-group">
                      		<button type="button" class="btn btn-danger btn-xs" title="Excluir" data-toggle="modal" data-target="#modal-excluir<?php echo $array['cod_usuario'];?>"><i class="fa fa-close"></i></button>
                      </div>
                  </td>
                </tr>
                
               
                <div class="modal fade" id="modalalterauser<?php echo $array['cod_usuario'];?>"  role="dialog" aria-labelledby="exampleModalLabel">
                      <div class= "modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Cambiar los datos del usuario del sistema </h4>
                          </div>
                          
                          <div class="modal-body">

                            <form name="alterar_cadastro" id="alterar_cadastro" role="form" method="post" action="src/altera_acesso_sistema.php" enctype="multipart/form-data">
                              <div class="box-body">
            
                                <input name="idu" value="<?php echo $array['cod_usuario'];?>" type="hidden">

                                <div class="form-group col-md-12">
                                  <label for="nome_usuario">Nombre</label>
                                  <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" value="<?php print $array['nome_usuario'];?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="login_usuario">Usuario</label>
                                  <input type="text" class="form-control" id="login_usuario" name="login_usuario" value="<?php print $array['login_acesso'];?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="email_usuario">Correo electrónico</label>
                                  <input type="email" class="form-control" id="email_usuario" name="email_usuario" value="<?php print $array['email_usuario'];?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="perfil_usuario">Perfil de Acceso</label>
                                  <select class="form-control" name="perfil_usuario" required>
                                    <option value="<?php print $array['cod_perfil'];?>"><?php print $array['desc_perfil_acesso'];?></option>
                                    <option value="">---</option>
                                   <?php 
                                     $sqlcx = mysqli_query($con, "select * from perfil_acesso");
                                          while($row=mysqli_fetch_array($sqlcx)){ 
                                   ?>
                                    <option value="<?php echo $row['cod_perfil'];?>"><?php echo $row['desc_perfil_acesso'];?></option>
                                   <?php } ?>
                                  </select>
                                </div>
                                
                                 <div class="form-group col-md-6">
                                  <label for="ativo_usuario">Estado del perfil de acceso</label>
                                  <select class="form-control" name="ativo_usuario" id="ativo_usuario" required>
                                    <?php

                                    $ativou = $array['ativo'];

                                      if($ativou == 'A') {
                                        $nome_ativo = 'ATIVO';
                                      } else {
                                        $nome_ativo = 'INATIVO';
                                      }

                                    ?>
                                    <option value="<?php echo $ativou; ?>"><?php echo $nome_ativo; ?></option>
                                    <option value="">-----</option>
                                    <option value="A">ATIVO</option>
                                    <option value="I">INATIVO</option>
                                  </select>
                                </div>
                              </div>
                                
                            </div>
                            <!-- /.box-body -->
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Para registrar</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- MODAL DE EXCLUSÃO -->
                    <div class="modal modal-danger fade" id="modal-excluir<?php echo $array['cod_usuario'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ATENCIÓN </h4>
                          </div>
                        <div class="modal-body">
                          <p>¿Confirmas la eliminación del registro seleccionado? </p>
                        
                          <form name="form1" id="form1" role="form" method="POST" action="src/exclui_acesso.php" enctype="multipart/form-data">
                              <input type="hidden" name="id" id="id" value="<?php echo $array['cod_usuario'];?>">
                          
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
                    <!-- FIM MODAL EXCLUSÃO -->

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

<?php

  include ('_script.php');

?>




<!-- INCLUSÃO DE REGISTRO -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function(){
        $(".msg").hide();
        jQuery('#cadastro').submit(function(){
          var dados = jQuery( this ).serialize();

          jQuery.ajax({
            type: "POST",
            url: "src/grava_acesso_sistema.php",
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

<div class="modal fade" id="modalacadastroacessosistema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class= "modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Agregar acceso al sistema</h4>
      </div>
      <div class="modal-body">
                             
        <form name="cadastro" id="cadastro" role="form" method="post" action="" enctype="multipart/form-data">
          <div class="box-body">
            <div class="msg"></div>   
            <div class="form-group col-md-12">
              <label for="nome_usuario">Nombre</label>
              <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" required>
            </div>
            
            <div class="form-group col-md-6">
              <label for="login_usuario">Usuario</label>
              <input type="text" class="form-control" id="login_usuario" name="login_usuario" required>
            </div>
            
            <div class="form-group col-md-6">
              <label for="senha_usuario">Contraseña</label>
              <input type="password" class="form-control" id="senha_usuario" name="senha_usuario" required>
            </div>
            
            <div class="form-group col-md-12">
              <label for="email_usuario">Correo electrónico (Válido)</label>
              <input type="email" class="form-control" id="email_usuario" name="email_usuario" required>
            </div>
            
            <div class="form-group col-md-6">
              <label for="perfil_usuario">Perfil de Acesso</label>
              <select class="form-control" name="perfil_usuario" required>
                <option value="">Seleccione</option>
               <?php 
                 $sqlcx = mysqli_query($con, "select * from perfil_acesso");
                      while($row=mysqli_fetch_array($sqlcx)){ 
               ?>
                <option value="<?php echo $row['cod_perfil'];?>"><?php echo $row['desc_perfil_acesso'];?></option>
               <?php } ?>
              </select>
            </div>
            
             <div class="form-group col-md-6">
              <label for="ativo_usuario">Estado del perfil de acceso</label>
              <select class="form-control" name="ativo_usuario" id="ativo_usuario" required>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
              </select>
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
