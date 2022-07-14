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
        Clientes         
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
                  <button type="button" class="btn btn-success">AGREGAR NUEVO</button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#" data-toggle="modal" data-target="#modalacadastropf">CLIENTE PERSONA FÍSICA</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modalacadastropj">CLIENTE PERSONA JURÍDICA</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
             
              </div>
            </div>
			
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre/Razón Social</th>
                  <th>Clase de Cliente</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th width="2%"></th>
                  <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                <?php
        					$query = mysqli_query($con,"select * from clientes INNER JOIN tipo_cliente ON clientes.cliente_tipo = tipo_cliente.id_tipo_cliente");
        						
        						while($array = mysqli_fetch_array($query)){

        				?>
                <tr>
                  <td><?php print $array['nome_cliente'];?></td>
                  <td><?php print $array['desc_tipo_cliente'];?></td>
                  <td><?php print $array['endereco_cliente'];echo ', ';print $array['numero_cliente'];echo '<br>';print $array['bairro_cliente'];echo ' - ';print $array['cidade_cliente'];echo ' - ';print $array['estado_cliente'];echo ' - ';print $array['pais_cliente'];?></td>
                  <td><?php print $array['contato_cliente'];?></td>
                  <td><?php print $array['email_cliente'];?></td>
                  
                  <td>
                      <div align="center" class="btn-group">
                      		<button type="button" class="btn btn-info btn-xs" title="Alterar" data-toggle="modal" data-target="#modalalterauser<?php echo $array['id_cliente'];?>"><i class="fa fa-pencil-square-o"></i></button>                    
                      </div>

                  </td>
                  	
                  <td>
                      <div class="btn-group">
                      		<button type="button" class="btn btn-danger btn-xs" title="Excluir" data-toggle="modal" data-target="#modal-excluir<?php echo $array['id_cliente'];?>"><i class="fa fa-close"></i></button>
                      </div>
                  </td>
                </tr>
                
               
                <div class="modal fade" id="modalalterauser<?php echo $array['id_cliente'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">CAMBIAR DATOS</h4>
                          </div>
                          
                          <div class="modal-body">

                            <form name="alterar_cadastro" id="alterar_cadastro" role="form" method="post" action="src/altera_cliente.php" enctype="multipart/form-data">
                              <div class="box-body">
            
                                <input name="id" value="<?php echo $array['id_cliente'];?>" type="hidden">

                                <?php

                                $enquadramento_cliente = $array['enquadramento_cliente'];

                                if ($enquadramento_cliente == '1'){
                                  $disabledpf = "disabled ";
                                  $disabledpj = "";
                                } else {

                                  $disabledpf = " ";
                                  $disabledpj = "disabled";

                                }



                                ?>

                                <div class="form-group col-md-4">
                                  <label for="tipo_cliente">Cliente:</label>

                                    <select class="form-control "  name="tipo_cliente" id="tipo_cliente">
                                      <option value="<?php echo $array['cliente_tipo'];?>"><?php echo $array['desc_tipo_cliente'];?></option>
                                      <option value="">---</option>
                                        <?php 
                                          $sqlcx = mysqli_query($con, "select * from tipo_cliente");
                                          while($row=mysqli_fetch_array($sqlcx)){ 
                                        ?>
                                          <option value="<?php echo $row['id_tipo_cliente'];?>"><?php echo $row['desc_tipo_cliente'];?></option>
                                        <?php } ?>
                                    </select>
                                  </div>

                                <div class="form-group col-md-8">
                                  <label for="nome_cliente">Nombre / Razón Social:</label>
                                  <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" value='<?php print $array['nome_cliente'];?>' required>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="data_nascimento_cliente">Fecha Nascimento:</label>
                                  <input type="date" class="form-control" id="data_nascimento_cliente" name="data_nascimento_cliente" value='<?php print $array['data_nascimento_cliente'];?>' <?php echo $disabledpj;?> >
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="rg_ci_cliente">C.I./RG:</label>
                                  <input type="text" class="form-control" id="rg_ci_cliente" name="rg_ci_cliente" maxlength="18" value='<?php print $array['rg_ci_cliente'];?>' <?php echo $disabledpj;?> >
                                </div>
                                
                                <div class="form-group col-md-3">
                                  <label for="cpf_cnpj_cliente">R.U.C./CPF:</label>
                                  <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" maxlength="18" value='<?php print $array['cpf_cnpj_cliente'];?>' >
                                </div>

                                   <div class="form-group col-md-3">
                                  <label for="estado_civil_cliente">Estada Civil:</label>
                                  <input type="text" class="form-control" id="estado_civil_cliente" name="estado_civil_cliente" value='<?php print $array['estado_civil_cliente'];?>' <?php echo $disabledpj;?> >
                                </div>
                                
                                <div class="form-group col-md-4">
                                  <label for="endereco_cliente">Dirección:</label>
                                  <input type="text" class="form-control" id="endereco_cliente" name="endereco_cliente" value='<?php print $array['endereco_cliente'];?>' required>
                                </div>


                                <div class="form-group col-md-3">
                                  <label for="bairro_cliente">Barrío/Distrito:</label>
                                  <input type="text" class="form-control" id="bairro_cliente" name="bairro_cliente" value='<?php print $array['bairro_cliente'];?>' required>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="cidade_cliente">Ciudad: </label>
                                  <input type="text" class="form-control" id="cidade_cliente" name="cidade_cliente" value='<?php print $array['cidade_cliente'];?>' required>
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="estado_cliente">Departamento: </label>
                                  <input type="text" class="form-control" id="estado_cliente" name="estado_cliente" value='<?php print $array['estado_cliente'];?>' required>
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="pais_cliente">País: </label>
                                  <input type="text" class="form-control" id="pais_cliente" name="pais_cliente" value='<?php print $array['pais_cliente'];?>' required>
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="contato_cliente">Teléfono 1:</label>
                                  <input type="text" class="form-control" id="contato_cliente" name="contato_cliente" value='<?php print $array['contato_cliente'];?>' required>
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="contato_cliente2">Teléfono 2: </label>
                                  <input type="text" class="form-control" id="contato_cliente2" name="contato_cliente2" value='<?php print $array['contato_cliente2'];?>' >
                                </div>

                                <div class="form-group col-md-2">
                                  <label for="whatsapp_cliente">WhatsApp:</label>
                                  <input type="text" class="form-control" id="whatsapp_cliente" name="whatsapp_cliente" >
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="instagram_cliente">Instagram:</label>
                                  <input type="text" class="form-control" id="instagram_cliente" name="instagram_cliente" >
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="email_cliente">Correo:</label>
                                  <input type="email" class="form-control" id="email_cliente" name="email_cliente" value='<?php print $array['email_cliente'];?>' required>
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="resp_contrato_cliente">Representante Legal:</label>
                                  <input type="text" class="form-control" id="resp_contrato_cliente" name="resp_contrato_cliente" value='<?php print $array['resp_contrato_cliente'];?>' <?php echo $disabledpf;?> >
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="adm_contrato_cliente">Administrador:</label>
                                  <input type="text" class="form-control" id="adm_contrato_cliente" name="adm_contrato_cliente" value='<?php print $array['adm_contrato_cliente'];?>' <?php echo $disabledpf;?> >
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="data_nascimento_resp_contrato">Fecha de Nacimiento:</label>
                                  <input type="date" class="form-control" id="data_nascimento_resp_contrato" name="data_nascimento_resp_contrato" maxlength="18" value='<?php print $array['data_nascimento_resp_contrato'];?>' <?php echo $disabledpf;?>>
                                </div>

                                 <div class="form-group col-md-3">
                                  <label for="rg_resp_contrato">C.I./RG:</label>
                                  <input type="text" class="form-control" id="rg_resp_contrato" name="rg_resp_contrato" maxlength="18" value='<?php print $array['rg_resp_contrato'];?>' <?php echo $disabledpf;?> >
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="whatsapp_resp_contrato">WhatsApp:</label>
                                  <input type="text" class="form-control" id="whatsapp_resp_contrato" name="whatsapp_resp_contrato" value='<?php print $array['whatsapp_resp_contrato'];?>' <?php echo $disabledpf;?> >
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="instagram_resp_contrato">Instagram:</label>
                                  <input type="text" class="form-control" id="instagram_resp_contrato" name="instagram_resp_contrato" value='<?php print $array['instagram_resp_contrato'];?>' <?php echo $disabledpf;?> >
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="email_resp_contrato">Correo:</label>
                                  <input type="email" class="form-control" id="email_resp_contrato" name="email_resp_contrato" value='<?php print $array['email_resp_contrato'];?>' <?php echo $disabledpf;?>>
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="observacoes_cliente">Comentarios: </label>
                                  <input type="text" class="form-control" id="observacoes_cliente" name="observacoes_cliente" value='<?php print $array['observacao_cliente'];?>'>
                                </div>
                                
                            </div>
                            <!-- /.box-body -->
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">GUARDAR</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">CERRAR</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- MODAL DE EXCLUSÃO -->
                    <div class="modal modal-danger fade" id="modal-excluir<?php echo $array['id_cliente'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ATENCIÓN </h4>
                          </div>
                        <div class="modal-body">
                          <p>¿Confirmas la eliminación del registro seleccionado? </p>
                        
                          <form name="form1" id="form1" role="form" method="POST" action="src/exclui_cliente.php" enctype="multipart/form-data">
                              <input type="hidden" name="id" id="id" value="<?php echo $array['id_cliente'];?>">
                          
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
            url: "src/grava_cliente.php",
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

    <script type="text/javascript">
      jQuery(document).ready(function(){
        $(".msg").hide();
        jQuery('#cadastro1').submit(function(){
          var dados = jQuery( this ).serialize();

          jQuery.ajax({
            type: "POST",
            url: "src/grava_cliente.php",
            data: dados,
            success: function( retorno )
            {
              $(".msg").html(retorno);
              $(".msg").show();
              $('.msg').fadeIn().delay(2000).fadeOut(function () {
                $(this).remove()
                $('#cadastro1')[0].reset();
                location.reload();
                
              });
            }
          });
          return false;
        });
      });
    </script>

<div class="modal fade" id="modalacadastropf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">CLIENTE PERSONA FÍSICA</h4>
      </div>
      <div class="modal-body">
                             
        <form name="cadastro" id="cadastro" role="form" method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="enquadramento_cliente" value="1">
          <div class="box-body">
            <div class="msg"></div>   
            
            <div class="form-group col-md-4">
              <label for="tipo_cliente">Cliente:</label>

                <select class="form-control "  name="tipo_cliente" id="tipo_cliente" required>
                  <option value=""></option>
                    <?php 
                      $sqlcx = mysqli_query($con, "select * from tipo_cliente");
                      while($row=mysqli_fetch_array($sqlcx)){ 
                    ?>
                      <option value="<?php echo $row['id_tipo_cliente'];?>"><?php echo $row['desc_tipo_cliente'];?></option>
                    <?php } ?>
                </select>
              </div>

             
            <div class="form-group col-md-8">
              <label for="nome_cliente">Nombre:</label>
              <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required>
            </div>

            <div class="form-group col-md-3">
              <label for="data_nascimento_cliente">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" id="data_nascimento_cliente" name="data_nascimento_cliente" maxlength="18" required>
            </div>

            <div class="form-group col-md-3">
              <label for="rg_ci_cliente">C.I./RG:</label>
              <input type="text" class="form-control" id="rg_ci_cliente" name="rg_ci_cliente" maxlength="18" required>
            </div>

            <div class="form-group col-md-3">
              <label for="cpf_cnpj_cliente">R.U.C./CPF:</label>
              <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" maxlength="18" >
            </div>

            <div class="form-group col-md-3">
              <label for="estado_civil_cliente">Estado Civil:</label>
              <input type="text" class="form-control" id="estado_civil_cliente" name="estado_civil_cliente" required >
            </div>
            
            
            
            <div class="form-group col-md-6">
              <label for="endereco_cliente">Dirección:</label>
              <input type="text" class="form-control" id="endereco_cliente" name="endereco_cliente" >
            </div>

            <div class="form-group col-md-5">
              <label for="bairro_cliente">Barrío/Distrito:</label>
              <input type="text" class="form-control" id="bairro_cliente" name="bairro_cliente" >
            </div>

            <div class="form-group col-md-4">
              <label for="cidade_cliente">Ciudad:</label>
              <input type="text" class="form-control" id="cidade_cliente" name="cidade_cliente" >
            </div>

            <div class="form-group col-md-3">
              <label for="estado_cliente">Departamento:</label>
              <input type="text" class="form-control" id="estado_cliente" name="estado_cliente" >
            </div>

            <div class="form-group col-md-2">
              <label for="pais_cliente">País:</label>
              <input type="text" class="form-control" id="pais_cliente" name="pais_cliente" >
            </div>

            <div class="form-group col-md-3">
              <label for="contato_cliente">Teléfono:</label>
              <input type="text" class="form-control" id="contato_cliente" name="contato_cliente" >
            </div>

            <div class="form-group col-md-3">
              <label for="whatsapp_cliente">WhatsApp:</label>
              <input type="text" class="form-control" id="whatsapp_cliente" name="whatsapp_cliente" >
            </div>

            <div class="form-group col-md-3">
              <label for="instagram_cliente">Instagram:</label>
              <input type="text" class="form-control" id="instagram_cliente" name="instagram_cliente" >
            </div>

            <div class="form-group col-md-6">
              <label for="email_cliente">Correo:</label>
              <input type="email" class="form-control" id="email_cliente" name="email_cliente" >
            </div>

            <div class="form-group col-md-12">
              <label for="observacoes_cliente">Comentarios:</label>
              <input type="text" class="form-control" id="observacoes_cliente" name="observacoes_cliente" >
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


<div class="modal fade" id="modalacadastropj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">CLIENTE PERSONA JURÍDICA</h4>
      </div>
      <div class="modal-body">
                             
        <form name="cadastro1" id="cadastro1" role="form" method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="enquadramento_cliente" value="2">
          <div class="box-body">
            <div class="msg"></div>   
            
            <div class="form-group col-md-3">
              <label for="tipo_cliente">Cliente:</label>

                <select class="form-control "  name="tipo_cliente" id="tipo_cliente" required>
                  <option value=""></option>
                    <?php 
                      $sqlcx = mysqli_query($con, "select * from tipo_cliente");
                      while($row=mysqli_fetch_array($sqlcx)){ 
                    ?>
                      <option value="<?php echo $row['id_tipo_cliente'];?>"><?php echo $row['desc_tipo_cliente'];?></option>
                    <?php } ?>
                </select>
              </div>

             
            <div class="form-group col-md-6">
              <label for="nome_cliente">Razón Social:</label>
              <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required>
            </div>

            <div class="form-group col-md-3">
              <label for="cpf_cnpj_cliente">R.U.C./CNPJ:</label>
              <input type="text" class="form-control" id="cpfcnpj" name="cpfcnpj" maxlength="18" required>
            </div>

            <div class="form-group col-md-4">
              <label for="endereco_cliente">Dirección: </label>
              <input type="text" class="form-control" id="endereco_cliente" name="endereco_cliente" required>
            </div>

            <div class="form-group col-md-4">
              <label for="bairro_cliente">Barrío/Distrito: </label>
              <input type="text" class="form-control" id="bairro_cliente" name="bairro_cliente" required>
            </div>

            <div class="form-group col-md-4">
              <label for="cidade_cliente">Ciudad: </label>
              <input type="text" class="form-control" id="cidade_cliente" name="cidade_cliente" required>
            </div>

            <div class="form-group col-md-3">
              <label for="estado_cliente">Departamento: </label>
              <input type="text" class="form-control" id="estado_cliente" name="estado_cliente" required>
            </div>

            <div class="form-group col-md-3">
              <label for="pais_cliente">País: </label>
              <input type="text" class="form-control" id="pais_cliente" name="pais_cliente" >
            </div>

             <div class="form-group col-md-3">
              <label for="contato_cliente">Teléfono: </label>
              <input type="text" class="form-control" id="contato_cliente" name="contato_cliente" required>
            </div>

            <div class="form-group col-md-3">
              <label for="contato_cliente2">Teléfono 2: </label>
              <input type="text" class="form-control" id="contato_cliente2" name="contato_cliente2" >
            </div>

            <div class="form-group col-md-4">
              <label for="email_cliente">Correo:</label>
              <input type="email" class="form-control" id="email_cliente" name="email_cliente" >
            </div>

            <div class="form-group col-md-4">
              <label for="resp_contrato_cliente">Representante Legal:</label>
              <input type="text" class="form-control" id="resp_contrato_cliente" name="resp_contrato_cliente" >
            </div>

            <div class="form-group col-md-4">
              <label for="adm_contrato_cliente">Administrador:</label>
              <input type="text" class="form-control" id="adm_contrato_cliente" name="adm_contrato_cliente" >
            </div>

            <div class="form-group col-md-3">
              <label for="data_nascimento_resp_contrato">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" id="data_nascimento_resp_contrato" name="data_nascimento_resp_contrato" maxlength="18" required>
            </div>

             <div class="form-group col-md-3">
              <label for="rg_resp_contrato">C.I./RG:</label>
              <input type="text" class="form-control" id="rg_resp_contrato" name="rg_resp_contrato" maxlength="18" >
            </div>

            <div class="form-group col-md-3">
              <label for="whatsapp_resp_contrato">WhatsApp:</label>
              <input type="text" class="form-control" id="whatsapp_resp_contrato" name="whatsapp_resp_contrato" >
            </div>

            <div class="form-group col-md-3">
              <label for="instagram_resp_contrato">Instagram:</label>
              <input type="text" class="form-control" id="instagram_resp_contrato" name="instagram_resp_contrato" >
            </div>

            <div class="form-group col-md-6">
              <label for="email_resp_contrato">Correo:</label>
              <input type="email" class="form-control" id="email_resp_contrato" name="email_resp_contrato" >
            </div>       

            <div class="form-group col-md-6">
              <label for="observacoes_cliente">Comentarios </label>
              <input type="text" class="form-control" id="observacoes_cliente" name="observacoes_cliente" >
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
