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
        Proveedores         
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
                    <li><a href="#" data-toggle="modal" data-target="#modalacadastropf">PROVEDOR PERSONA FÍSICA</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modalacadastropj">PROVEDOR PERSONA JURÍDICA</a></li>
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
                  <th width="25%">Nombre/Razón Social</th>
                  <th>Clase de Proveedor</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th width="2%"></th>
                  <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                <?php
        					$query = mysqli_query($con,"select * from fornecedores INNER JOIN tipo_provedor ON fornecedores.classe_fornecedor = tipo_provedor.id_tipo_provedor");
        						
        						while($array = mysqli_fetch_array($query)){

        				?>
                <tr>
                  <td><?php print $array['nome_razao_social_fornecedor'];?></td>
                  <td><?php print $array['desc_tipo_provedor'];?></td>
                  <td><?php print $array['endereco_fornecedor'];echo '<br>';print $array['bairro_fornecedor'];echo ' - ';print $array['cidade_fornecedor'];echo ' - ';print $array['estado_fornecedor'];echo ' - ';print $array['pais_fornecedor'];?></td>
                  <td><?php print $array['telefone_fornecedor'];?></td>
                  <td><?php print $array['email_fornecedor'];?></td>
                  
                  <td>
                      <div align="center" class="btn-group">
                      		<button type="button" class="btn btn-info btn-xs" title="Alterar" data-toggle="modal" data-target="#modalalterauser<?php echo $array['id_fornecedor'];?>"><i class="fa fa-pencil-square-o"></i></button>                    
                      </div>

                  </td>
                  	
                  <td>
                      <div class="btn-group">
                      		<button type="button" class="btn btn-danger btn-xs" title="Excluir" data-toggle="modal" data-target="#modal-excluir<?php echo $array['id_fornecedor'];?>"><i class="fa fa-close"></i></button>
                      </div>
                  </td>
                </tr>
                
               
                <div class="modal fade" id="modalalterauser<?php echo $array['id_fornecedor'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class= "modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">CAMBIAR DATOS</h4>
                          </div>
                          
                          <div class="modal-body">

                            <form name="alterar_cadastro" id="alterar_cadastro" role="form" method="post" action="src/altera_fornecedor.php" enctype="multipart/form-data">
                              <div class="box-body">
            
                                <input name="id" value="<?php echo $array['id_fornecedor'];?>" type="hidden">

                                <input type="hidden" name="tipo_provedor" value="<?php echo $array['tipo_fornecedor'];?>">
                                <?php

                                $tipo_fornecedor = $array['tipo_fornecedor'];

                                if ($tipo_fornecedor == '1'){
                                  $disabledpf = "disabled ";
                                  $disabledpj = "";
                                } else {

                                  $disabledpf = " ";
                                  $disabledpj = "disabled";

                                }



                                ?>
                                <div class="box-body">
                                  <div class="msg"></div>
                                  <div class="form-group col-md-4">
                                    <label for="classe_provedor">Classe provedor:</label>

                                      <select class="form-control "  name="classe_provedor" id="classe_provedor" required>
                                        <option value="<?php echo $array['classe_fornecedor'];?>"><?php echo $array['desc_tipo_provedor'];?></option>
                                        <option value="">----</option>
                                          <?php 
                                            $sqlcx = mysqli_query($con, "select * from tipo_provedor");
                                              while($row=mysqli_fetch_array($sqlcx)){ 
                                          ?>
                                            <option value="<?php echo $row['id_tipo_provedor'];?>"><?php echo $row['desc_tipo_provedor'];?></option>
                                      <?php } ?>
                                        </select>
                                  </div>
                                  
                                  <div class="form-group col-md-4">
                                    <label for="produto_servico_fornecedor">Producto/Servício:</label>
                                    <input type="text" class="form-control" id="produto_servico_fornecedor" name="produto_servico_fornecedor" value="<?php echo $array['produto_servico_fornecedor'];?>">
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="nome_razao_social_fornecedor">Nombre/Razón Social</label>
                                    <input type="text" class="form-control" id="nome_razao_social_fornecedor" name="nome_razao_social_fornecedor" value="<?php echo $array['nome_razao_social_fornecedor'];?>" >
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="cnpj_fornecedor">R.U.C./CNPJ:</label>
                                    <input type="text" class="form-control" id="cnpj_fornecedor" name="cnpj_fornecedor" value="<?php echo $array['cnpj_fornecedor'];?>"  <?php echo $disabledpf;?>>
                                  </div>
                                  
                                  <div class="form-group col-md-4">
                                    <label for="rg_fornecedor">C.I./RG:</label>
                                    <input type="text" class="form-control" id="rg_fornecedor" name="rg_fornecedor" value="<?php echo $array['rg_fornecedor'];?>"  <?php echo $disabledpj;?>>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="cpf_fornecedor">R.U.C./CPF:</label>
                                    <input type="text" class="form-control" id="cpf_fornecedor" name="cpf_fornecedor" value="<?php echo $array['cpf_fornecedor'];?>"  <?php echo $disabledpj;?>>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="data_nascimento_fornecedor">Fecha de Nacimiento:</label>
                                    <input type="date" class="form-control" id="data_nascimento_fornecedor" name="data_nascimento_fornecedor" value="<?php echo $array['data_nascimento_fornecedor'];?>" <?php echo $disabledpj;?> >
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="estado_civil_fornecedor">Estado Civil:</label>
                                    <input type="text" class="form-control" id="estado_civil_fornecedor" name="estado_civil_fornecedor" value="<?php echo $array['estado_civil_fornecedor'];?>"  <?php echo $disabledpj;?>>
                                  </div>
                                  
                                  <div class="form-group col-md-6">
                                    <label for="endereco_fornecedor">Dirección: </label>
                                    <input type="text" class="form-control" id="endereco_fornecedor" name="endereco_fornecedor" value="<?php echo $array['endereco_fornecedor'];?>" >
                                  </div>



                                  <div class="form-group col-md-3">
                                    <label for="bairro_fornecedor">Barrío/Distrito: </label>
                                    <input type="text" class="form-control" id="bairro_fornecedor" name="bairro_fornecedor" value="<?php echo $array['bairro_fornecedor'];?>">
                                  </div>

                                  <div class="form-group col-md-3">
                                    <label for="cidade_fornecedor">Ciudad: </label>
                                    <input type="text" class="form-control" id="cidade_fornecedor" name="cidade_fornecedor" value="<?php echo $array['bairro_fornecedor'];?>" >
                                  </div>

                                  <div class="form-group col-md-3">
                                    <label for="estado_fornecedor">Departamento: </label>
                                    <input type="text" class="form-control" id="estado_fornecedor" name="estado_fornecedor" value="<?php echo $array['estado_fornecedor'];?>" >
                                  </div>

                                  <div class="form-group col-md-3">
                                    <label for="pais_fornecedor">País: </label>
                                    <input type="text" class="form-control" id="pais_fornecedor" name="pais_fornecedor" value="<?php echo $array['pais_fornecedor'];?>" >
                                  </div>

                                  <div class="form-group col-md-3">
                                    <label for="telefone_fornecedor">Teléfono: </label>
                                    <input type="text" class="form-control" id="telefone_fornecedor" name="telefone_fornecedor" value="<?php echo $array['telefone_fornecedor'];?>">
                                  </div>

                                  <div class="form-group col-md-3">
                                    <label for="whatsapp_fornecedor">Whatsapp: </label>
                                    <input type="text" class="form-control" id="whatsapp_fornecedor" name="whatsapp_fornecedor" value="<?php echo $array['whatsapp_fornecedor'];?>" <?php echo $disabledpj;?>>
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="email_fornecedor">Correo: </label>
                                    <input type="email" class="form-control" id="email_fornecedor" name="email_fornecedor" value="<?php echo $array['email_fornecedor'];?>">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="instagram_fornecedor">Instagram: </label>
                                    <input type="text" class="form-control" id="instagram_fornecedor" name="instagram_fornecedor" value="<?php echo $array['instagram_fornecedor'];?>" <?php echo $disabledpj;?>>
                                  </div>



                                  <div class="form-group col-md-4">
                                    <label for="representande_legal_fornecedor">Representante Legal: </label>
                                    <input type="text" class="form-control" id="representande_legal_fornecedor" name="representande_legal_fornecedor" value="<?php echo $array['representande_legal_fornecedor'];?>" <?php echo $disabledpf;?>>
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="rg_representande_legal_fornecedor">C.I./RG: </label>
                                    <input type="text" class="form-control" id="rg_representande_legal_fornecedor" name="rg_representande_legal_fornecedor" <?php echo $disabledpf;?> value="<?php echo $array['rg_representande_legal_fornecedor'];?>">
                                  </div>

                                   <div class="form-group col-md-4">
                                    <label for="data_nascimento_representande_legal_fornecedor">Fecha de Nacimiento: </label>
                                    <input type="date" class="form-control" id="data_nascimento_representande_legal_fornecedor" name="data_nascimento_representande_legal_fornecedor" <?php echo $disabledpf;?> value="<?php echo $array['data_nascimento_representande_legal_fornecedor'];?>" >
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="whatsapp_representande_legal_fornecedor">Whats App: </label>
                                    <input type="text" class="form-control" id="whatsapp_representande_legal_fornecedor" name="whatsapp_representande_legal_fornecedor" <?php echo $disabledpf;?> value="<?php echo $array['whatsapp_representande_legal_fornecedor'];?>">
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="email_representande_legal_fornecedor">Correo: </label>
                                    <input type="text" class="form-control" id="email_representande_legal_fornecedor" name="email_representande_legal_fornecedor" <?php echo $disabledpf;?> value="<?php echo $array['email_representande_legal_fornecedor'];?>">
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="instagram_representande_legal_fornecedor">Instagram: </label>
                                    <input type="text" class="form-control" id="instagram_representande_legal_fornecedor" name="instagram_representande_legal_fornecedor" <?php echo $disabledpf;?> value="<?php echo $array['instagram_representande_legal_fornecedor'];?>">
                                  </div>




                                  <div class="form-group col-md-12">
                                    <label for="observacoes_fornecedor">Comentarios: </label>
                                    <input type="text" class="form-control" id="observacoes_fornecedor" name="observacoes_fornecedor" >
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
                    <div class="modal modal-danger fade" id="modal-excluir<?php echo $array['id_fornecedor'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ATENCIÓN </h4>
                          </div>
                        <div class="modal-body">
                          <p>¿Confirmas la eliminación del registro seleccionado? </p>
                        
                          <form name="form1" id="form1" role="form" method="POST" action="src/exclui_fornecedor.php" enctype="multipart/form-data">
                              <input type="hidden" name="id" id="id" value="<?php echo $array['id_fornecedor'];?>">
                          
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
        jQuery('#cadastropf').submit(function(){
          var dados = jQuery( this ).serialize();

          jQuery.ajax({
            type: "POST",
            url: "src/grava_fornecedor_pf.php",
            data: dados,
            success: function( retorno )
            {
              $(".msg").html(retorno);
              $(".msg").show();
              $('.msg').fadeIn().delay(2000).fadeOut(function () {
                $(this).remove()
                $('#cadastropf')[0].reset();
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
          <h4 class="modal-title">PROVEEDOR PERSONA FÍSICA</h4>
      </div>
      <div class="modal-body">
                             
        <form name="cadastropf" id="cadastropf" role="form" method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="tipo_provedor" value="1">
          <div class="box-body">
            <div class="msg"></div>
            <div class="form-group col-md-4">
              <label for="classe_provedor">Clase provedor:</label>

                <select class="form-control "  name="classe_provedor" id="classe_provedor" required>
                  <option value=""></option>
                    <?php 
                      $sqlcx = mysqli_query($con, "select * from tipo_provedor");
                        while($row=mysqli_fetch_array($sqlcx)){ 
                    ?>
                      <option value="<?php echo $row['id_tipo_provedor'];?>"><?php echo $row['desc_tipo_provedor'];?></option>
                <?php } ?>
                  </select>
            </div>
            
            <div class="form-group col-md-4">
              <label for="produto_servico_fornecedor">Producto/Servício:</label>
              <input type="text" class="form-control" id="produto_servico_fornecedor" name="produto_servico_fornecedor" required>
            </div>

            <div class="form-group col-md-4">
              <label for="nome_razao_social_fornecedor">Nombre:</label>
              <input type="text" class="form-control" id="nome_razao_social_fornecedor" name="nome_razao_social_fornecedor" required>
            </div>
            
            <div class="form-group col-md-4">
              <label for="rg_fornecedor">C.I./RG:</label>
              <input type="text" class="form-control" id="rg_fornecedor" name="rg_fornecedor" required>
            </div>

            <div class="form-group col-md-4">
              <label for="cpf_fornecedor">R.U.C./CPF:</label>
              <input type="text" class="form-control" id="cpf_fornecedor" name="cpf_fornecedor" required>
            </div>

            <div class="form-group col-md-4">
              <label for="data_nascimento_fornecedor">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" id="data_nascimento_fornecedor" name="data_nascimento_fornecedor" required>
            </div>

            <div class="form-group col-md-4">
              <label for="estado_civil_fornecedor">Estado Civil:</label>
              <input type="text" class="form-control" id="estado_civil_fornecedor" name="estado_civil_fornecedor" required>
            </div>
            
            <div class="form-group col-md-8">
              <label for="endereco_fornecedor">Dirección: </label>
              <input type="text" class="form-control" id="endereco_fornecedor" name="endereco_fornecedor" >
            </div>



            <div class="form-group col-md-3">
              <label for="bairro_fornecedor">Barrío/Distrito: </label>
              <input type="text" class="form-control" id="bairro_fornecedor" name="bairro_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="cidade_fornecedor">Ciudad: </label>
              <input type="text" class="form-control" id="cidade_fornecedor" name="cidade_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="estado_fornecedor">Departamento: </label>
              <input type="text" class="form-control" id="estado_fornecedor" name="estado_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="pais_fornecedor">País: </label>
              <input type="text" class="form-control" id="pais_fornecedor" name="pais_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="telefone_fornecedor">Teléfono: </label>
              <input type="text" class="form-control" id="telefone_fornecedor" name="telefone_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="whatsapp_fornecedor">Whatsapp: </label>
              <input type="text" class="form-control" id="whatsapp_fornecedor" name="whatsapp_fornecedor" >
            </div>

            <div class="form-group col-md-6">
              <label for="email_fornecedor">Correo: </label>
              <input type="email" class="form-control" id="email_fornecedor" name="email_fornecedor" >
            </div>

            <div class="form-group col-md-6">
              <label for="instagram_fornecedor">Instagram: </label>
              <input type="text" class="form-control" id="instagram_fornecedor" name="instagram_fornecedor" >
            </div>

            <div class="form-group col-md-6">
              <label for="observacoes_fornecedor">Comentarios: </label>
              <input type="text" class="form-control" id="observacoes_fornecedor" name="observacoes_fornecedor" >
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

<!-- INCLUSÃO DE REGISTRO -->

    <script type="text/javascript">
      jQuery(document).ready(function(){
        $(".msg").hide();
        jQuery('#cadastropj').submit(function(){
          var dados = jQuery( this ).serialize();

          jQuery.ajax({
            type: "POST",
            url: "src/grava_fornecedor_pj.php",
            data: dados,
            success: function( retorno )
            {
              $(".msg").html(retorno);
              $(".msg").show();
              $('.msg').fadeIn().delay(2000).fadeOut(function () {
                $(this).remove()
                $('#cadastropj')[0].reset();
                location.reload();
                
              });
            }
          });
          return false;
        });
      });
    </script>

<div class="modal fade" id="modalacadastropj" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">PROVEEDOR PERSONA JURÍDICA</h4>
      </div>
      <div class="modal-body">
                             
        <form name="cadastropj" id="cadastropj" role="form" method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="tipo_provedor" value="2">
          <div class="box-body">
            <div class="msg"></div>
            <div class="form-group col-md-4">
              <label for="classe_provedor">Clase provedor:</label>

                <select class="form-control "  name="classe_provedor" id="classe_provedor" required>
                  <option value=""></option>
                    <?php 
                      $sqlcx = mysqli_query($con, "select * from tipo_provedor");
                        while($row=mysqli_fetch_array($sqlcx)){ 
                    ?>
                      <option value="<?php echo $row['id_tipo_provedor'];?>"><?php echo $row['desc_tipo_provedor'];?></option>
                <?php } ?>
                  </select>
            </div>
            
            <div class="form-group col-md-4">
              <label for="produto_servico_fornecedor">Producto/Servício:</label>
              <input type="text" class="form-control" id="produto_servico_fornecedor" name="produto_servico_fornecedor" required>
            </div>

            <div class="form-group col-md-4">
              <label for="nome_razao_social_fornecedor">Razón Social:</label>
              <input type="text" class="form-control" id="nome_razao_social_fornecedor" name="nome_razao_social_fornecedor" required>
            </div>
            
            <div class="form-group col-md-3">
              <label for="cnpj_fornecedor">R.U.C./CNPJ:</label>
              <input type="text" class="form-control" id="cnpj_fornecedor" name="cnpj_fornecedor" required>
            </div>


            
            <div class="form-group col-md-6">
              <label for="endereco_fornecedor">Dirección: </label>
              <input type="text" class="form-control" id="endereco_fornecedor" name="endereco_fornecedor" >
            </div>



            <div class="form-group col-md-3">
              <label for="bairro_fornecedor">Barrío/Distrito: </label>
              <input type="text" class="form-control" id="bairro_fornecedor" name="bairro_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="cidade_fornecedor">Ciudad: </label>
              <input type="text" class="form-control" id="cidade_fornecedor" name="cidade_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="estado_fornecedor">Departamento: </label>
              <input type="text" class="form-control" id="estado_fornecedor" name="estado_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="pais_fornecedor">País: </label>
              <input type="text" class="form-control" id="pais_fornecedor" name="pais_fornecedor" >
            </div>

            <div class="form-group col-md-3">
              <label for="telefone_fornecedor">Teléfono: </label>
              <input type="text" class="form-control" id="telefone_fornecedor" name="telefone_fornecedor" >
            </div>

            <div class="form-group col-md-4">
              <label for="email_fornecedor">Correo: </label>
              <input type="email" class="form-control" id="email_fornecedor" name="email_fornecedor" >
            </div>

            <div class="form-group col-md-4">
              <label for="representande_legal_fornecedor">Representante Legal: </label>
              <input type="text" class="form-control" id="representande_legal_fornecedor" name="representande_legal_fornecedor" >
            </div>

            <div class="form-group col-md-4">
              <label for="rg_representande_legal_fornecedor">C.I./RG: </label>
              <input type="text" class="form-control" id="rg_representande_legal_fornecedor" name="rg_representande_legal_fornecedor" >
            </div>

             <div class="form-group col-md-4">
              <label for="data_nascimento_representande_legal_fornecedor">Fecha de Nacimiento: </label>
              <input type="date" class="form-control" id="data_nascimento_representande_legal_fornecedor" name="data_nascimento_representande_legal_fornecedor" >
            </div>

            <div class="form-group col-md-4">
              <label for="whatsapp_representande_legal_fornecedor">Whats App: </label>
              <input type="text" class="form-control" id="whatsapp_representande_legal_fornecedor" name="whatsapp_representande_legal_fornecedor" >
            </div>

            <div class="form-group col-md-4">
              <label for="email_representande_legal_fornecedor">Correo: </label>
              <input type="text" class="form-control" id="email_representande_legal_fornecedor" name="email_representande_legal_fornecedor" >
            </div>

            <div class="form-group col-md-4">
              <label for="instagram_representande_legal_fornecedor">Instagram: </label>
              <input type="text" class="form-control" id="instagram_representande_legal_fornecedor" name="instagram_representande_legal_fornecedor" >
            </div>

            




            <div class="form-group col-md-6">
              <label for="observacoes_fornecedor">Comentarios: </label>
              <input type="text" class="form-control" id="observacoes_fornecedor" name="observacoes_fornecedor" >
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
