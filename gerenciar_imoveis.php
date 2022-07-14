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
        Propiedades         
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
                <div align="right"><button type="button" data-toggle="modal" data-target="#modalacadastro" class="btn btn-sm btn-success">AGREGAR NUEVO</button>
                </div>
              </div>
            </div>
			
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Propiedad</th>
                  <th>Dirección</th>
                  <th>Propietario</th>
                  <th>Whats App</th>
                  <th width="2%"></th>
                  <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                <?php
        					$query = mysqli_query($con,"SELECT * FROM imoveis INNER JOIN clientes ON clientes.id_cliente = imoveis.proprietario_imovel INNER JOIN centro_custo ON centro_custo.id_ccusto = imoveis.centro_custo_imovel INNER JOIN personal ON personal.id_personal = imoveis.captador_imovel");
        						
        						while($array = mysqli_fetch_array($query)){

        				?>
                <tr>
                  <td><?php print $array['imovel_tipo'];?></td>
                  <td><?php print $array['endereco_imovel'];echo '<br>';print $array['bairro_imovel'];echo ' - ';print $array['cidade_imovel'];echo ' - ';print $array['estado_imovel'];echo ' - ';print $array['pais_imovel'];?></td>
                  <td><?php print $array['nome_cliente'];?></td>
                  <td><?php print $array['wpp_adm_imovel'];?></td>

                  
                  <td>
                      <div align="center" class="btn-group">
                      		<button type="button" class="btn btn-info btn-xs" title="Alterar" data-toggle="modal" data-target="#modalalterauser<?php echo $array['id_imovel'];?>"><i class="fa fa-pencil-square-o"></i></button>                    
                      </div>

                  </td>
                  	
                  <td>
                      <div class="btn-group">
                      		<button type="button" class="btn btn-danger btn-xs" title="Excluir" data-toggle="modal" data-target="#modal-excluir<?php echo $array['id_imovel'];?>"><i class="fa fa-close"></i></button>
                      </div>
                  </td>
                </tr>
                
               
                <div class="modal fade" id="modalalterauser<?php echo $array['id_imovel'];?>" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">CAMBIAR DATOS</h4>
                          </div>
                          
                          <div class="modal-body">

                            <form name="alterar_cadastro" id="alterar_cadastro" role="form" method="post" action="src/altera_imovel.php" enctype="multipart/form-data">
                              <div class="box-body">
            
                                <input name="id" value="<?php echo $array['id_imovel'];?>" type="hidden">


                                <div class="form-group col-md-4">
                                  <label for="imovel_tipo">Clase de Propiedad:</label>
                                      <select class="form-control select2" style="width: 100%;" name="imovel_tipo" id="imovel_tipo" required>
                                        <option value="<?php echo $array['imovel_tipo'];?>"><?php echo $array['imovel_tipo'];?></option>
                                        <option value="">-----</option>
                                       <?php 
                                         $sqlcx = mysqli_query($con, "select * from tipo_propriedade");
                                              while($row=mysqli_fetch_array($sqlcx)){ 
                                       ?>
                                        <option value="<?php echo $row['desc_tipo_propriedade'];?>"><?php echo $row['desc_tipo_propriedade'];?></option>
                                       <?php } ?>
                                  </select>
                                </div>
                                
                               <div class="form-group col-md-4">
                                  <label for="proprietario_imovel">Propietario:</label>
                                      <select class="form-control select2" style="width: 100%;" name="proprietario_imovel" id="proprietario_imovel" >
                                        <option value="<?php echo $array['proprietario_imovel'];?>"><?php echo $array['nome_cliente'];?></option>
                                        <option value="">-----</option>
                                       <?php 
                                         $sqlcx = mysqli_query($con, "select * from clientes where cliente_tipo ='2'");
                                              while($row=mysqli_fetch_array($sqlcx)){ 
                                       ?>
                                        <option value="<?php echo $row['id_cliente'];?>"><?php echo $row['nome_cliente'];?></option>
                                       <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="captador_imovel">Captador:</label>
                                      <select class="form-control select2" style="width: 100%;" name="captador_imovel" id="captador_imovel" required>
                                        <option value="<?php echo $array['captador_imovel'];?>"><?php echo $array['nome_personal'];?></option>
                                        <option value="">-----</option>
                                       <?php 
                                         $sqlcx = mysqli_query($con, "select * from personal");
                                              while($row=mysqli_fetch_array($sqlcx)){ 
                                       ?>
                                        <option value="<?php echo $row['id_personal'];?>"><?php echo $row['nome_personal'];?></option>
                                       <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="referencia_imovel">Referéncia:</label>
                                  <input type="text" class="form-control" id="referencia_imovel" name="referencia_imovel" value="<?php echo $array['referencia_imovel'];?> " >
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="operacao_imovel">Operación:</label>
                                      <select class="form-control" name="operacao_imovel" id="operacao_imovel" required>
                                        <option value="<?php echo $array['operacao_imovel'];?>"><?php echo $array['operacao_imovel'];?></option>
                                        <option value="">-----</option>
                                        <option value="Venta">Venta</option>
                                        <option value="Alquiler">Alquiler</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-8">
                                  <label for="endereco_imovel">Dirección </label>
                                  <input type="text" class="form-control" id="endereco_imovel" name="endereco_imovel" value="<?php echo $array['endereco_imovel'];?>">
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="bairro_imovel">Barrío/Distrito:</label>
                                  <input type="text" class="form-control" id="bairro_imovel" name="bairro_imovel" value="<?php echo $array['bairro_imovel'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="cidade_imovel">Ciudad </label>
                                  <input type="text" class="form-control" id="cidade_imovel" name="cidade_imovel" value="<?php echo $array['cidade_imovel'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="estado_imovel">Estado </label>
                                  <input type="text" class="form-control" id="estado_imovel" name="estado_imovel" value="<?php echo $array['estado_imovel'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="pais_imovel">País </label>
                                  <input type="text" class="form-control" id="pais_imovel" name="pais_imovel" value="<?php echo $array['pais_imovel'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="matricula_imovel">Matricula:</label>
                                  <input type="text" class="form-control" id="matricula_imovel" name="matricula_imovel" value="<?php echo $array['matricula_imovel'];?>" >
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="conta_corrente_imovel">Cuenta Corriente:</label>
                                  <input type="text" class="form-control" id="conta_corrente_imovel" name="conta_corrente_imovel" value="<?php echo $array['conta_corrente_imovel'];?>">
                                </div>


                                <div class="form-group col-md-3">
                                  <label for="tipo_construcao_imovel">Tipo de construcción:</label>
                                  <input type="text" class="form-control" id="tipo_construcao_imovel" name="tipo_construcao_imovel" value="<?php echo $array['tipo_construcao_imovel'];?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="centro_custo_imovel">Centro de coste:</label>
                                      <select class="form-control select2" style="width: 100%;" name="centro_custo_imovel" id="centro_custo_imovel" required>
                                        <option value="<?php echo $array['centro_custo_imovel'];?>"><?php echo $array['cod_ccusto'];?> - <?php echo $array['desc_ccusto'];?></option>
                                        <option value="">-----</option>
                                       <?php 
                                         $sqlcx = mysqli_query($con, "select * from centro_custo");
                                              while($row=mysqli_fetch_array($sqlcx)){ 
                                       ?>
                                        <option value="<?php echo $row['id_ccusto'];?>"><?php echo $row['cod_ccusto'];?> - <?php echo $row['desc_ccusto'];?></option>
                                       <?php } ?>
                                  </select>
                                </div>


                                <div class="form-group col-md-4">
                                  <label for="valor_aluguel_imovel">Valor del Alquiler (G$/U$/R$):</label>
                                  <input type="text" class="form-control" id="valor_aluguel_imovel" name="valor_aluguel_imovel" value="<?php echo $array['valor_aluguel_imovel'];?>">
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="valor_venda_imovel">Valor de Venta (G$/U$/R$):</label>
                                  <input type="text" class="form-control" id="valor_venda_imovel" name="valor_venda_imovel" value="<?php echo $array['valor_venda_imovel'];?>">
                                </div>

                                 <div class="form-group col-md-4">
                                  <label for="valor_garantia_imovel">Valor de la Garantía (G$/U$/R$):</label>
                                  <input type="text" class="form-control" id="valor_garantia_imovel" name="valor_garantia_imovel" value="<?php echo $array['valor_garantia_imovel'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="destino_garantia_imovel">Destino de la Garantía:</label>
                                      <select class="form-control" name="destino_garantia_imovel" id="destino_garantia_imovel" >
                                        <option value="<?php echo $array['destino_garantia_imovel'];?>"><?php echo $array['destino_garantia_imovel'];?></option>
                                        <option value="">-----</option>
                                        <option value="Propietário">Propietário</option>
                                        <option value="Inmobiliaria">Inmobiliaria</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="administracao_imovel">Administración:</label>
                                      <select class="form-control" name="administracao_imovel" id="administracao_imovel" >
                                        <option value="<?php echo $array['administracao_imovel'];?>"><?php echo $array['administracao_imovel'];?></option>
                                        <option value="">-----</option>
                                        <option value="Sín Tasa de Administración">Sín Tasa de Administración</option>
                                        <option value="10,00% mensual">10,00% mensual</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="comissao_aluguel_imovel">Comisión s/ Alquiler:</label>
                                      <select class="form-control" name="comissao_aluguel_imovel" id="comissao_aluguel_imovel" >
                                        <option value="<?php echo $array['comissao_aluguel_imovel'];?>"><?php echo $array['comissao_aluguel_imovel'];?></option>
                                        <option value="">-----</option>
                                        <option value="Sín comisión">Sín comisión</option>
                                        <option value="50,00% s/ 1er. Alquiler">50,00% s/ 1er. Alquiler</option>
                                        <option value="100,00% s/ 1er. Alquiler">100,00% s/ 1er. Alquiler</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="comissao_venda_imovel">Comisión s/ Venta:</label>
                                      <select class="form-control" name="comissao_venda_imovel" id="comissao_venda_imovel" >
                                        <option value="<?php echo $array['comissao_venda_imovel'];?>"><?php echo $array['comissao_venda_imovel'];?></option>
                                        <option value="">-----</option>
                                        <option value="5,00% s/ el Monto">5,00% s/ el Monto</option>
                                        <option value="Over Price">Over Price</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="descricao_imovel">Descripción del Inmueble:</label>
                                  <textarea class="textarea" rows="5" name="descricao_imovel" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $array['descricao_imovel'];?></textarea>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="condominio_imovel">Condomínio:</label>
                                      <select class="form-control" name="condominio_imovel" id="condominio_imovel" >
                                        <option value="<?php echo $array['condominio_imovel'];?>"><?php echo $array['condominio_imovel'];?></option>
                                        <option value="">-----</option>
                                        <option value="Sí">Sí</option>
                                        <option value="No">No</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="nome_condominio_imovel">Nombre del Condomínio:</label>
                                  <input type="text" class="form-control" id="nome_condominio_imovel" name="nome_condominio_imovel" value="<?php echo $array['nome_condominio_imovel'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="administrador_imovel">Administrador:</label>
                                  <input type="text" class="form-control" id="administrador_imovel" name="administrador_imovel" value="<?php echo $array['administrador_imovel'];?>">
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="data_nascimento_adm_imovel">Fecha de Nacimiento:</label>
                                  <input type="date" class="form-control" id="data_nascimento_adm_imovel" name="data_nascimento_adm_imovel" value="<?php echo $array['data_nascimento_adm_imovel'];?>">
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="wpp_adm_imovel">Whats App:</label>
                                  <input type="text" class="form-control" id="wpp_adm_imovel" name="wpp_adm_imovel" value="<?php echo $array['wpp_adm_imovel'];?>">
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="email_adm_imovel">Correo:</label>
                                  <input type="text" class="form-control" id="email_adm_imovel" name="email_adm_imovel" value="<?php echo $array['email_adm_imovel'];?>">
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="instagram_adm_imovel">Instagram:</label>
                                  <input type="text" class="form-control" id="instagram_adm_imovel" name="instagram_adm_imovel" value="<?php echo $array['instagram_adm_imovel'];?>">
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="cct_cadastral_imovel">CCT Cadadstral </label>
                                  <input type="text" class="form-control" id="cct_cadastral_imovel" name="cct_cadastral_imovel" value="<?php echo $array['cct_cadastral_imovel'];?>">
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
                    <div class="modal modal-danger fade" id="modal-excluir<?php echo $array['id_imovel'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ATENCIÓN </h4>
                          </div>
                        <div class="modal-body">
                          <p>¿Confirmas la eliminación del registro seleccionado? </p>
                        
                          <form name="form1" id="form1" role="form" method="POST" action="src/exclui_imovel.php" enctype="multipart/form-data">
                              <input type="hidden" name="id" id="id" value="<?php echo $array['id_imovel'];?>">
                          
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
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
    <script type="text/javascript">
      jQuery(document).ready(function(){
        $(".msg").hide();
        jQuery('#cadastro').submit(function(){
          var dados = jQuery( this ).serialize();

          jQuery.ajax({
            type: "POST",
            url: "src/grava_imovel.php",
            data: dados,
            success: function( retorno )
            {
              $(".msg").html(retorno);
              $(".msg").show();
              $('.msg').fadeIn().delay(5500).fadeOut(function () {
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

<div class="modal fade" id="modalacadastro" role="dialog" aria-labelledby="exampleModalLabel">
  <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">INCLUYE PROPIEDAD</h4>
      </div>
      <div class="modal-body">
                             
        <form name="cadastro" id="cadastro" role="form" method="post" action="" enctype="multipart/form-data">
          <div class="box-body">
            <div class="msg"></div>   


            <div class="form-group col-md-4">
              <label for="imovel_tipo">Clase de Propiedad:</label>
                  <select class="form-control select2" style="width: 100%;" name="imovel_tipo" id="imovel_tipo" required>
                 
                   <?php 
                     $sqlcx = mysqli_query($con, "select * from tipo_propriedade");
                          while($row=mysqli_fetch_array($sqlcx)){ 
                   ?>
                    <option value="<?php echo $row['desc_tipo_propriedade'];?>"><?php echo $row['desc_tipo_propriedade'];?></option>
                   <?php } ?>
              </select>
            </div>
            
           <div class="form-group col-md-4">
              <label for="proprietario_imovel">Propietario:</label>
                  <select class="form-control select2" style="width: 100%;" name="proprietario_imovel" id="proprietario_imovel" required>
                   
                   <?php 
                     $sqlcx = mysqli_query($con, "select * from clientes where cliente_tipo ='2'");
                          while($row=mysqli_fetch_array($sqlcx)){ 
                   ?>
                    <option value="<?php echo $row['id_cliente'];?>"><?php echo $row['nome_cliente'];?></option>
                   <?php } ?>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="captador_imovel">Captador:</label>
                  <select class="form-control select2" style="width: 100%;" name="captador_imovel" id="captador_imovel" required>
                   
                   <?php 
                     $sqlcx = mysqli_query($con, "select * from personal");
                          while($row=mysqli_fetch_array($sqlcx)){ 
                   ?>
                    <option value="<?php echo $row['id_personal'];?>"><?php echo $row['nome_personal'];?></option>
                   <?php } ?>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="referencia_imovel">Referéncia:</label>
              <input type="text" class="form-control" id="referencia_imovel" name="referencia_imovel" required>
            </div>

            <div class="form-group col-md-4">
              <label for="operacao_imovel">Operación:</label>
                  <select class="form-control" name="operacao_imovel" id="operacao_imovel" required>
                    <option value=""></option>
                    <option value="Venta">Venta</option>
                    <option value="Alquiler">Alquiler</option>
              </select>
            </div>

            <div class="form-group col-md-8">
              <label for="endereco_imovel">Dirección:</label>
              <input type="text" class="form-control" id="endereco_imovel" name="endereco_imovel" required>
            </div>

            <div class="form-group col-md-4">
              <label for="bairro_imovel">Barrío/Distrito: </label>
              <input type="text" class="form-control" id="bairro_imovel" name="bairro_imovel" required>
            </div>

            <div class="form-group col-md-3">
              <label for="cidade_imovel">Ciudad: </label>
              <input type="text" class="form-control" id="cidade_imovel" name="cidade_imovel" required>
            </div>

            <div class="form-group col-md-3">
              <label for="estado_imovel">Estado: </label>
              <input type="text" class="form-control" id="estado_imovel" name="estado_imovel" required>
            </div>

            <div class="form-group col-md-3">
              <label for="pais_imovel">País: </label>
              <input type="text" class="form-control" id="pais_imovel" name="pais_imovel" required>
            </div>

            <div class="form-group col-md-3">
              <label for="matricula_imovel">Matricula:</label>
              <input type="text" class="form-control" id="matricula_imovel" name="matricula_imovel" >
            </div>

            <div class="form-group col-md-3">
              <label for="conta_corrente_imovel">Cuenta Corriente:</label>
              <input type="text" class="form-control" id="conta_corrente_imovel" name="conta_corrente_imovel" >
            </div>


            <div class="form-group col-md-3">
              <label for="tipo_construcao_imovel">Tipo de construcción:</label>
              <input type="text" class="form-control" id="tipo_construcao_imovel" name="tipo_construcao_imovel" required>
            </div>

            <div class="form-group col-md-6">
              <label for="centro_custo_imovel">Centro de coste:</label>
                  <select class="form-control select2" style="width: 100%;" name="centro_custo_imovel" id="centro_custo_imovel" required>
                  
                   <?php 
                     $sqlcx = mysqli_query($con, "select * from centro_custo");
                          while($row=mysqli_fetch_array($sqlcx)){ 
                   ?>
                    <option value="<?php echo $row['id_ccusto'];?>"><?php echo $row['cod_ccusto'];?> - <?php echo $row['desc_ccusto'];?></option>
                   <?php } ?>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="tipo_moeda_aluguel_imovel">Cambio monetário Alquiler:</label>
                <select class="form-control "  name="tipo_moeda_aluguel_imovel" id="tipo_moeda_aluguel_imovel" >
                  <option value=""></option>
                    <?php 
                      $sqlcx = mysqli_query($con, "select * from tipo_moeda");
                        while($row=mysqli_fetch_array($sqlcx)){ 
                    ?>
                    <option value="<?php echo $row['id_moeda'];?>"><?php echo $row['sigla_moeda'];echo " - "; echo $row['desc_moeda'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-3">
              <label for="valor_aluguel_imovel">Valor del Alquiler:</label>
              <input type="text" class="form-control" id="valor_aluguel_imovel" name="valor_aluguel_imovel" >
            </div>

            
            <div class="form-group col-md-3">
              <label for="tipo_moeda_venda_imovel">Cambio monetário Venta:</label>
                <select class="form-control "  name="tipo_moeda_venda_imovel" id="tipo_moeda_venda_imovel" >
                  <option value=""></option>
                    <?php 
                      $sqlcx = mysqli_query($con, "select * from tipo_moeda");
                        while($row=mysqli_fetch_array($sqlcx)){ 
                    ?>
                    <option value="<?php echo $row['id_moeda'];?>"><?php echo $row['sigla_moeda'];echo " - "; echo $row['desc_moeda'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-3">
              <label for="valor_venda_imovel">Valor de Venta:</label>
              <input type="text" class="form-control" id="valor_venda_imovel" name="valor_venda_imovel" >
            </div>

            
            <div class="form-group col-md-3">
              <label for="tipo_moeda_garantia_imovel">Cambio monetário Garantía:</label>
                <select class="form-control "  name="tipo_moeda_garantia_imovel" id="tipo_moeda_garantia_imovel" >
                  <option value=""></option>
                    <?php 
                      $sqlcx = mysqli_query($con, "select * from tipo_moeda");
                        while($row=mysqli_fetch_array($sqlcx)){ 
                    ?>
                    <option value="<?php echo $row['id_moeda'];?>"><?php echo $row['sigla_moeda'];echo " - "; echo $row['desc_moeda'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-3">
              <label for="valor_garantia_imovel">Valor de la Garantía:</label>
              <input type="text" class="form-control" id="valor_garantia_imovel" name="valor_garantia_imovel" >
            </div>

            <div class="form-group col-md-3">
              <label for="destino_garantia_imovel">Destino de la Garantía:</label>
                  <select class="form-control" name="destino_garantia_imovel" id="destino_garantia_imovel" >
                    <option value=""></option>
                    <option value="Propietário">Propietário</option>
                    <option value="Inmobiliaria">Inmobiliaria</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="administracao_imovel">Administración:</label>
                  <select class="form-control" name="administracao_imovel" id="administracao_imovel" required>
                    <option value=""></option>
                    <option value="Sín Tasa de Administración">Sín Tasa de Administración</option>
                    <option value="10,00% mensual">10,00% mensual</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="comissao_aluguel_imovel">Comisión s/ Alquiler:</label>
                  <select class="form-control" name="comissao_aluguel_imovel" id="comissao_aluguel_imovel" required>
                    <option value=""></option>
                    <option value="Sín comisión">Sín comisión</option>
                    <option value="50,00% s/ 1er. Alquiler">50,00% s/ 1er. Alquiler</option>
                    <option value="100,00% s/ 1er. Alquiler">100,00% s/ 1er. Alquiler</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="comissao_venda_imovel">Comisión s/ Venta:</label>
                  <select class="form-control" name="comissao_venda_imovel" id="comissao_venda_imovel" required>
                    <option value=""></option>
                    <option value="5,00% s/ el Monto">5,00% s/ el Monto</option>
                    <option value="Over Price">Over Price</option>
              </select>
            </div>

            <div class="form-group col-md-12">
              <label for="descricao_imovel">Descripción del Inmueble:</label>
              <textarea class="textarea" rows="5" name="descricao_imovel" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>

            <div class="form-group col-md-3">
              <label for="condominio_imovel">Condomínio:</label>
                  <select class="form-control" name="condominio_imovel" id="condominio_imovel" >
                    <option value=""></option>
                    <option value="Sí">Sí</option>
                    <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="nome_condominio_imovel">Nombre del Condomínio:</label>
              <input type="text" class="form-control" id="nome_condominio_imovel" name="nome_condominio_imovel" >
            </div>

            <div class="form-group col-md-3">
              <label for="administrador_imovel">Administrador:</label>
              <input type="text" class="form-control" id="administrador_imovel" name="administrador_imovel" >
            </div>

            <div class="form-group col-md-3">
              <label for="data_nascimento_adm_imovel">Fecha de Nacimiento:</label>
              <input type="date" class="form-control" id="data_nascimento_adm_imovel" name="data_nascimento_adm_imovel" >
            </div>

            <div class="form-group col-md-4">
              <label for="wpp_adm_imovel">Whats App:</label>
              <input type="text" class="form-control" id="wpp_adm_imovel" name="wpp_adm_imovel" >
            </div>

            <div class="form-group col-md-4">
              <label for="email_adm_imovel">Correo:</label>
              <input type="text" class="form-control" id="email_adm_imovel" name="email_adm_imovel" >
            </div>

            <div class="form-group col-md-4">
              <label for="instagram_adm_imovel">Instagram:</label>
              <input type="text" class="form-control" id="instagram_adm_imovel" name="instagram_adm_imovel" >
            </div>

            <div class="form-group col-md-4">
              <label for="cct_cadastral_imovel">CCT Cadadstral </label>
              <input type="text" class="form-control" id="cct_cadastral_imovel" name="cct_cadastral_imovel" >
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
