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
        Personas         
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
                <div class="btn-group">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalacadastro">AGREGAR NUEVO</button>
                  
                </div>
              </div>
              <div class="col-md-6">
             
              </div>
            </div>
			
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cargo</th>
                  <th>Sucursal</th>
                  <th>WhatsApp</th>
                  <th width="2%"></th>
                  <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                <?php
        					$query = mysqli_query($con,"select * from personal");
        						
        						while($array = mysqli_fetch_array($query)){

        				?>
                <tr>
                  <td><?php print $array['nome_personal'];?></td>
                  <td><?php print $array['cargo_funcao_personal'];?></td>
                  <td><?php print $array['sucursal_personal'];?></td>
                  <td><?php print $array['whatsapp_personal'];?></td>
                  
                  <td>
                      <div align="center" class="btn-group">
                      		<button type="button" class="btn btn-info btn-xs" title="Alterar" data-toggle="modal" data-target="#modalalterauser<?php echo $array['id_personal'];?>"><i class="fa fa-pencil-square-o"></i></button>                    
                      </div>

                  </td>
                  	
                  <td>
                      <div class="btn-group">
                      		<button type="button" class="btn btn-danger btn-xs" title="Excluir" data-toggle="modal" data-target="#modal-excluir<?php echo $array['id_personal'];?>"><i class="fa fa-close"></i></button>
                      </div>
                  </td>
                </tr>
                
               
                <div class="modal fade" id="modalalterauser<?php echo $array['id_personal'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">CAMBIAR DATOS</h4>
                          </div>
                          
                          <div class="modal-body">

                            <form name="alterar_cadastro" id="alterar_cadastro" role="form" method="post" action="src/altera_personal.php" enctype="multipart/form-data">
                              <div class="box-body">
            
                                <input name="id" value="<?php echo $array['id_personal'];?>" type="hidden">

                                 <div class="form-group col-md-6">
                                  <label for="cargo_funcao_personal">Cargo/Función:</label>
                                  <input type="text" class="form-control" id="cargo_funcao_personal" name="cargo_funcao_personal" value="<?php echo $array['cargo_funcao_personal'];?>" >
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="sucursal_personal">Sucursal:</label>
                                  <input type="text" class="form-control" id="sucursal_personal" name="sucursal_personal" value="<?php echo $array['sucursal_personal'];?>" >
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="nome_personal">Nombre:</label>
                                  <input type="text" class="form-control" id="nome_personal" name="nome_personal" value="<?php echo $array['nome_personal'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="rg_personal">C.I./RG:</label>
                                  <input type="text" class="form-control" id="rg_personal" name="rg_personal" maxlength="18" value="<?php echo $array['rg_personal'];?>" >
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="cpf_personal">R.U.C./CPF:</label>
                                  <input type="text" class="form-control" id="cpf_personal" name="cpf_personal" maxlength="18" value="<?php echo $array['cpf_personal'];?>" >
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="estado_civil_personal">Estado Civil:</label>
                                  <input type="text" class="form-control" id="estado_civil_personal" name="estado_civil_personal" value="<?php echo $array['estado_civil_personal'];?>" >
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="data_nascimento_personal">Fecha de Nacimiento:</label>
                                  <input type="date" class="form-control" id="data_nascimento_personal" name="data_nascimento_personal" maxlength="18" value="<?php echo $array['data_nascimento_personal'];?>">
                                </div>
                                
                                <div class="form-group col-md-6">
                                  <label for="endereco_personal">Dirección:</label>
                                  <input type="text" class="form-control" id="endereco_personal" name="endereco_personal" value="<?php echo $array['endereco_personal'];?>">
                                </div>

                                <div class="form-group col-md-5">
                                  <label for="bairro_personal">Barrío/Distrito:</label>
                                  <input type="text" class="form-control" id="bairro_personal" name="bairro_personal" value="<?php echo $array['bairro_personal'];?>" >
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="cidade_personal">Ciudad:</label>
                                  <input type="text" class="form-control" id="cidade_personal" name="cidade_personal" value="<?php echo $array['cidade_personal'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="estado_personal">Departamento:</label>
                                  <input type="text" class="form-control" id="estado_personal" name="estado_personal" value="<?php echo $array['estado_personal'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="pais_personal">País:</label>
                                  <input type="text" class="form-control" id="pais_personal" name="pais_personal" value="<?php echo $array['pais_personal'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="telefone_personal">Teléfono:</label>
                                  <input type="text" class="form-control" id="telefone_personal" name="telefone_personal" value="<?php echo $array['telefone_personal'];?>">
                                </div>

                                 <div class="form-group col-md-3">
                                  <label for="email_personal">Correo:</label>
                                  <input type="email" class="form-control" id="email_personal" name="email_personal" value="<?php echo $array['email_personal'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="whatsapp_personal">WhatsApp:</label>
                                  <input type="text" class="form-control" id="whatsapp_personal" name="whatsapp_personal" value="<?php echo $array['whatsapp_personal'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="banco_personal">Banco:</label>
                                  <input type="text" class="form-control" id="banco_personal" name="banco_personal" value="<?php echo $array['banco_personal'];?>">
                                </div>

                                 <div class="form-group col-md-3">
                                  <label for="sucursal_agencia_personal">Sucursal/Agência:</label>
                                  <input type="text" class="form-control" id="sucursal_agencia_personal" name="sucursal_agencia_personal" value="<?php echo $array['sucursal_agencia_personal'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="cc_ca_personal">C.C./C.A.:</label>
                                  <input type="text" class="form-control" id="cc_ca_personal" name="cc_ca_personal" value="<?php echo $array['cc_ca_personal'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="email_sucursal_personal">Correo:</label>
                                  <input type="text" class="form-control" id="email_sucursal_personal" name="email_sucursal_personal" value="<?php echo $array['email_sucursal_personal'];?>">
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="cnh_personal">L.C/CNH:</label>
                                  <input type="text" class="form-control" id="cnh_personal" name="cnh_personal" value="<?php echo $array['cnh_personal'];?>" >
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="data_validade_cnh_personal">Fecha de validez:</label>
                                  <input type="date" class="form-control" id="data_validade_cnh_personal" name="data_validade_cnh_personal" value="<?php echo $array['data_validade_cnh_personal'];?>">
                                </div>

                                 <div class="form-group col-md-6">
                                  <label for="instagram_personal">Instagram:</label>
                                  <input type="text" class="form-control" id="instagram_personal" name="instagram_personal" value="<?php echo $array['instagram_personal'];?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="observacoes_personal">Comentarios:</label>
                                  <input type="text" class="form-control" id="observacoes_personal" name="observacoes_personal" value="<?php echo $array['observacoes_personal'];?>">
                                </div>
                                                    
                            </div>
                            <!-- /.box-body -->
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">GUARDAR</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- MODAL DE EXCLUSÃO -->
                    <div class="modal modal-danger fade" id="modal-excluir<?php echo $array['id_personal'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ATENCIÓN </h4>
                          </div>
                        <div class="modal-body">
                          <p>¿Confirmas la eliminación del registro seleccionado? </p>
                        
                          <form name="form1" id="form1" role="form" method="POST" action="src/exclui_personal.php" enctype="multipart/form-data">
                              <input type="hidden" name="id" id="id" value="<?php echo $array['id_personal'];?>">
                          
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
            url: "src/grava_personal.php",
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
  <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">INCLUYE PERSONA</h4>
      </div>
      <div class="modal-body">
                             
        <form name="cadastro" id="cadastro" role="form" method="post" action="" enctype="multipart/form-data">

          <div class="box-body">
            <div class="msg"></div>   
            
                         
            <div class="form-group col-md-6">
              <label for="cargo_funcao_personal">Cargo/Función:</label>
              <input type="text" class="form-control" id="cargo_funcao_personal" name="cargo_funcao_personal" required>
            </div>

            <div class="form-group col-md-6">
              <label for="sucursal_personal">Sucursal:</label>
              <input type="text" class="form-control" id="sucursal_personal" name="sucursal_personal" required>
            </div>

            <div class="form-group col-md-6">
              <label for="nome_personal">Nombre:</label>
              <input type="text" class="form-control" id="nome_personal" name="nome_personal" required>
            </div>

            <div class="form-group col-md-3">
              <label for="rg_personal">C.I./RG:</label>
              <input type="text" class="form-control" id="rg_personal" name="rg_personal" maxlength="18" required>
            </div>

            <div class="form-group col-md-3">
              <label for="cpf_personal">R.U.C./CPF:</label>
              <input type="text" class="form-control" id="cpf_personal" name="cpf_personal" maxlength="18" >
            </div>

            <div class="form-group col-md-3">
              <label for="estado_civil_personal">Estado Civil:</label>
              <input type="text" class="form-control" id="estado_civil_personal" name="estado_civil_personal" required >
            </div>

            <div class="form-group col-md-3">
              <label for="data_nascimento_personal">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" id="data_nascimento_personal" name="data_nascimento_personal" maxlength="18" required>
            </div>
            
            <div class="form-group col-md-6">
              <label for="endereco_personal">Dirección:</label>
              <input type="text" class="form-control" id="endereco_personal" name="endereco_personal" >
            </div>

            <div class="form-group col-md-5">
              <label for="bairro_personal">Barrío/Distrito:</label>
              <input type="text" class="form-control" id="bairro_personal" name="bairro_personal" >
            </div>

            <div class="form-group col-md-4">
              <label for="cidade_personal">Ciudad:</label>
              <input type="text" class="form-control" id="cidade_personal" name="cidade_personal" >
            </div>

            <div class="form-group col-md-3">
              <label for="estado_personal">Departamento:</label>
              <input type="text" class="form-control" id="estado_personal" name="estado_personal" >
            </div>

            <div class="form-group col-md-3">
              <label for="pais_personal">País:</label>
              <input type="text" class="form-control" id="pais_personal" name="pais_personal" >
            </div>

            <div class="form-group col-md-3">
              <label for="telefone_personal">Teléfono:</label>
              <input type="text" class="form-control" id="telefone_personal" name="telefone_personal" >
            </div>

             <div class="form-group col-md-3">
              <label for="email_personal">Correo:</label>
              <input type="email" class="form-control" id="email_personal" name="email_personal" >
            </div>

            <div class="form-group col-md-3">
              <label for="whatsapp_personal">WhatsApp:</label>
              <input type="text" class="form-control" id="whatsapp_personal" name="whatsapp_personal" >
            </div>

            <div class="form-group col-md-3">
              <label for="banco_personal">Banco:</label>
              <input type="text" class="form-control" id="banco_personal" name="banco_personal" >
            </div>

             <div class="form-group col-md-3">
              <label for="sucursal_agencia_personal">Sucursal/Agência:</label>
              <input type="text" class="form-control" id="sucursal_agencia_personal" name="sucursal_agencia_personal" >
            </div>

            <div class="form-group col-md-3">
              <label for="cc_ca_personal">C.C./C.A.:</label>
              <input type="text" class="form-control" id="cc_ca_personal" name="cc_ca_personal" >
            </div>

            <div class="form-group col-md-3">
              <label for="email_sucursal_personal">Correo:</label>
              <input type="text" class="form-control" id="email_sucursal_personal" name="email_sucursal_personal" >
            </div>

            <div class="form-group col-md-4">
              <label for="cnh_personal">L.C/CNH:</label>
              <input type="text" class="form-control" id="cnh_personal" name="cnh_personal" >
            </div>

            <div class="form-group col-md-4">
              <label for="data_validade_cnh_personal">Fecha de validez:</label>
              <input type="date" class="form-control" id="data_validade_cnh_personal" name="data_validade_cnh_personal" >
            </div>

             <div class="form-group col-md-4">
              <label for="instagram_personal">Instagram:</label>
              <input type="text" class="form-control" id="instagram_personal" name="instagram_personal" >
            </div>

            <div class="form-group col-md-6">
              <label for="observacoes_personal">Comentarios:</label>
              <input type="text" class="form-control" id="observacoes_personal" name="observacoes_personal" >
            </div>
          </div>
          <!-- /.box-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">GUARDAR</button>
            </div>
        </form>
       
      </div>
    </div>
  </div>
</div>



</body>
</html>
