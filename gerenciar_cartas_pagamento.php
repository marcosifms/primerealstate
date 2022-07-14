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
        Gerenciar Carta de Instruções         
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
            </div>
			
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Tipo de Contrato</th>
                  <th>Arrendatario</th>
                  <th>Comienzo</th>
                  <th>El fin</th>
                  <th>Valor</th>

                  <th width="2%"></th>
                  <th width="2%"></th>
                  <th width="2%"></th>
                  <th width="2%"></th>
                </tr>
                </thead>
                <tbody>
                <?php
        					$query = mysqli_query($con,"SELECT * FROM contratos 
                    INNER JOIN clientes ON clientes.id_cliente = contratos.cliente_contrato 
                    INNER JOIN tipo_contrato ON tipo_contrato.id_tipo_contrato = contratos.tipo_contrato 
                    INNER JOIN tipo_moeda ON tipo_moeda.id_moeda = contratos.tipo_moeda_contrato");
        						
        						while($array = mysqli_fetch_array($query)){

        				?>
                <tr>
                  <td><?php print $array['id_contrato'];?> - <?php print $array['nome_cliente'];?></td>
                  <td><?php print $array['desc_tipo_contrato'];?></td>
                  <td>
                    <?php 

                      $varcliente = $array['cliente_locatario'];
                      $qrylocatario = mysqli_query($con,"SELECT nome_cliente from clientes where id_cliente = '$varcliente'");
                      while($arrayloca = mysqli_fetch_array($qrylocatario)){
                        $nome_locatario = $arrayloca['nome_cliente'];
                      }
                        echo $nome_locatario;
                    ?>
                      
                    </td>
                  <td><?php print databr($array['inicio_vigencia_contrato']);?></td>
                  <td><?php print databr($array['fim_vigencia_contrato']);?></td>
                  <td><?php print $array['sigla_moeda'];?><?php print number_format($array['valor_total_contrato'], 2, ',', '.');?></td>

                  <td>
                      <button type="button" class="btn btn-info btn-xs" title="contrato de impresión" data-toggle="modal" data-target="#modalalemitircontrato<?php echo $array['id_contrato'];?>"><i class="fa fa-print"></i></button></a>                   
                      </div>

                  </td>

                  <div class="modal fade" id="modalalemitircontrato<?php echo $array['id_contrato'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class= "modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Emitir Contrato </h4>
                          </div>
                          
                          <div class="modal-body">

                            <form name="alterar_cadastro" id="alterar_cadastro" role="form" method="post" action="frm_emissao_contrato_locacao.php" enctype="multipart/form-data">
                              <div class="box-body">
            
                                <input name="id" value="<?php echo $array['id_contrato'];?>" type="hidden">

                              <div class="form-group col-md-6">
                                <label for="data_geracao">Data Geração Contrato </label>
                                <input type="date" class="form-control" id="data_geracao" name="data_geracao" required>
                              </div>
                                
                            </div>
                            <!-- /.box-body -->
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Para gerar</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                  <td>
                      <button type="button" class="btn btn-info btn-xs" title="Recibo Deposito de Llaves" data-toggle="modal" data-target="#modalalemitircontrato<?php echo $array['id_contrato'];?>"><i class="fa fa-money"></i></button></a>                   
                      </div>

                  </td>

                  <td>
                      <div align="center" class="btn-group">
                      		<button type="button" class="btn btn-info btn-xs" title="Cambiar contrato" data-toggle="modal" data-target="#modalalterauser<?php echo $array['id_contrato'];?>"><i class="fa fa-pencil-square-o"></i></button>                    
                      </div>

                  </td>
                  	
                  <td>
                      <div class="btn-group">
                      		<button type="button" class="btn btn-danger btn-xs" title="Borrar" data-toggle="modal" data-target="#modal-excluir<?php echo $array['id_contrato'];?>"><i class="fa fa-close"></i></button>
                      </div>
                  </td>
                </tr>
                
               
                <div class="modal fade" id="modalalterauser<?php echo $array['id_contrato'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Cambiar los datos del contratos </h4>
                          </div>
                          
                          <div class="modal-body">

                            <form name="alterar_cadastro" id="alterar_cadastro" role="form" method="post" action="src/altera_contrato.php" enctype="multipart/form-data">
                              <div class="box-body">
            
                                <input name="id" value="<?php echo $array['id_contrato'];?>" type="hidden">

                                <div class="form-group col-md-6">
                                <label for="cliente_contrato">Cliente</label>
                                    <select class="form-control "  name="cliente_contrato" id="cliente_contrato" required>
                                      <option value="<?php echo $array['id_cliente'];?>"><?php echo $array['nome_cliente'];?></option>
                                      <option value="">---</option>
                                     
                                   <?php 
                                       $sqlcx = mysqli_query($con, "select * from clientes where cliente_tipo = 2");
                                            while($row=mysqli_fetch_array($sqlcx)){ 
                                     ?>
                                      <option value="<?php echo $row['id_cliente'];?>"><?php echo $row['nome_cliente'];?></option>
                                     <?php } ?>
                                </select>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="tipo_contrato">Tipo de contrato</label>
                                    <select class="form-control "  name="tipo_contrato" id="tipo_contrato" required>
                                      <option value="<?php echo $array['tipo_contrato'];?>"><?php echo $array['desc_tipo_contrato'];?></option>
                                      <option value="">---</option>
                                     <?php 
                                       $sqlcx = mysqli_query($con, "select * from tipo_contrato");
                                            while($row=mysqli_fetch_array($sqlcx)){ 
                                     ?>
                                      <option value="<?php echo $row['id_tipo_contrato'];?>"><?php echo $row['desc_tipo_contrato'];?></option>
                                     <?php } ?>
                                </select>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="cliente_locatario">Locatario/Comprador</label>

                                    <select class="form-control "  name="cliente_locatario" id="cliente_locatario" required>
                                      
                                      <option value="<?php echo $array['cliente_locatario'];?>">
                                        <?php $id_cliente_locatario = $array['cliente_locatario'];
                                          $sqlcx = mysqli_query($con, "select nome_cliente from clientes where id_cliente ='$id_cliente_locatario'");
                                            while($arr=mysqli_fetch_array($sqlcx)){
                                              $nome_cliente_locatario = $arr['nome_cliente'];
                                            }
                                            echo $nome_cliente_locatario;
                                        ?>
                                        </option>

                                      <option value="">---</option>
                                     <?php 
                                       $sqlcx = mysqli_query($con, "select * from clientes where cliente_tipo <> 2");
                                            while($row=mysqli_fetch_array($sqlcx)){ 
                                     ?>
                                      <option value="<?php echo $row['id_cliente'];?>"><?php echo $row['nome_cliente'];?></option>
                                     <?php } ?>
                                </select>
                              </div>

                              
                              <div class="form-group col-md-3">
                                <label for="inicio_vigencia_contrato">Inicio de validez </label>
                                <input type="date" class="form-control" id="inicio_vigencia_contrato" name="inicio_vigencia_contrato" value="<?php print $array['inicio_vigencia_contrato'];?>" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="fim_vigencia_contrato">Fim de validez </label>
                                <input type="date" class="form-control" id="fim_vigencia_contrato" name="fim_vigencia_contrato" value="<?php print $array['fim_vigencia_contrato'];?>" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="tipo_moeda_contrato">Cambio monetário</label>
                                    <select class="form-control "  name="tipo_moeda_contrato" id="tipo_moeda_contrato" required>
                                      
                                      <option value="<?php echo $array['id_moeda'];?>"><?php echo $array['sigla_moeda'];echo " - "; echo $array['desc_moeda'];?></option>
                                      
                                      <option value="">---</option>
                                     <?php 
                                       $sqlcx = mysqli_query($con, "select * from tipo_moeda");
                                            while($row=mysqli_fetch_array($sqlcx)){ 
                                     ?>
                                      <option value="<?php echo $row['id_moeda'];?>"><?php echo $row['sigla_moeda'];echo " - "; echo $row['desc_moeda'];?></option>
                                     <?php } ?>
                                </select>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="valor_total_contrato">Valor total del contrato </label>
                                <input type="text" class="form-control" id="valor_total_contrato" name="valor_total_contrato" value="<?php print number_format($array['valor_total_contrato'], 2, ',', '.');?>" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="qtd_parcelas_contrato">Número de plazos </label>
                                <input type="text" class="form-control" id="qtd_parcelas_contrato" name="qtd_parcelas_contrato" value="<?php print $array['qtd_parcelas_contrato'];?>" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="valor_parcela_contrato">Monto de la cuota</label>
                                <input type="text" class="form-control" id="valor_parcela_contrato" name="valor_parcela_contrato" value="<?php print number_format($array['valor_parcela_contrato'], 2, ',', '.');?>" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="garantia_contrato">Garantia</label>
                                <input type="text" class="form-control" id="garantia_contrato" name="garantia_contrato" value="<?php print number_format($array['garantia_contrato'], 2, ',', '.');?>" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="taxa_adm_contrato">Cuota de administracion</label>
                                <input type="text" class="form-control" id="taxa_adm_contrato" name="taxa_adm_contrato" value="<?php print number_format($array['taxa_adm_contrato'], 2, ',', '.');?>" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="comissao_contrato">Comisión</label>
                                <input type="text" class="form-control" id="comissao_contrato" name="comissao_contrato" value="<?php print number_format($array['comissao_contrato'], 2, ',', '.');?>" required>
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
                    <div class="modal modal-danger fade" id="modal-excluir<?php echo $array['id_contrato'];?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">ATENCIÓN </h4>
                          </div>
                        <div class="modal-body">
                          <p>¿Confirmas la eliminación del registro seleccionado? </p>
                        
                          <form name="form1" id="form1" role="form" method="POST" action="src/exclui_contrato.php" enctype="multipart/form-data">
                              <input type="hidden" name="id" id="id" value="<?php echo $array['id_contrato'];?>">
                          
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
             <script type="text/javascript">
                  jQuery(document).ready(function(){
                    $(".msg").hide();
                    jQuery('#cadastro').submit(function(){
                      var dados = jQuery( this ).serialize();

                      jQuery.ajax({
                        type: "POST",
                        url: "src/grava_contrato.php",
                        data: dados,
                        success: function( retorno )
                        {
                          $(".msg").html(retorno);
                          $(".msg").show();
                          $('.msg').fadeIn().delay(1500).fadeOut(function () {
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
                 //FUNÇAO AJAX PARA FUNCIONAMENTO DO SISTEMA//////////////////////////////////////////////////////////                                  
                function ajax1() {
                  try {
                    doc1 = new XMLHttpRequest();
                    } catch(e) {
                      try {
                        doc1 = new ActiveXObject("Msxml2.XMLHTTP");
                        } catch (ee) {
                          try { 
                          doc1 = new ActiveXObject("Microsoft.XMLHTTP");
                          } catch (E) {
                            doc1 = false;
                            }
                        }
                    }
                    return doc1;
                }
                function carregadata(){ 
                  document.getElementById("load_data").innerHTML = "Carregando propriedades...";
                  doc1 = ajax1();
                  var unidade = document.getElementById("cliente_contrato").value;
                  doc1.open("GET","listaimoveis.php?code="+unidade,true);
                    doc1.onreadystatechange=function(){
                      if (doc1.readyState==4) {
                    var texto = doc1.responseText;
                    document.getElementById("load_data").innerHTML = texto;
                      }
                  }
                  doc1.send(null);
                  }
                </script>




                  <div class="modal fade" id="modalacadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

                    <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Agregar contrato</h4>
                        </div>
                        
                        <div class="modal-body">
                                               
                          <form name="cadastro" id="cadastro" role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                              <div class="msg"></div>   
                              
                             <div class="form-group col-md-6">
                                <label for="cliente_contrato">Cliente</label>

                                    <select class="form-control "  name="cliente_contrato" id="cliente_contrato" onchange="carregadata();" required>
                                      <option value=""></option>
                                     <?php 
                                       $sqlcx = mysqli_query($con, "select * from clientes where cliente_tipo = 2");
                                            while($row=mysqli_fetch_array($sqlcx)){ 
                                     ?>
                                      <option value="<?php echo $row['id_cliente'];?>"><?php echo $row['nome_cliente'];?></option>
                                     <?php } ?>
                                </select>
                              </div>

                              <div class="" id="load_data">
                                
                              </div> 

                              <div class="form-group col-md-6">
                                <label for="tipo_contrato">Tipo de contrato</label>
                                    <select class="form-control "  name="tipo_contrato" id="tipo_contrato" required>
                                      <option value=""></option>
                                     <?php 
                                       $sqlcx = mysqli_query($con, "select * from tipo_contrato");
                                            while($row=mysqli_fetch_array($sqlcx)){ 
                                     ?>
                                      <option value="<?php echo $row['id_tipo_contrato'];?>"><?php echo $row['desc_tipo_contrato'];?></option>
                                     <?php } ?>
                                </select>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="cliente_locatario">Locatario/Comprador</label>

                                    <select class="form-control "  name="cliente_locatario" id="cliente_locatario" required>
                                      <option value=""></option>
                                     <?php 
                                       $sqlcx = mysqli_query($con, "select * from clientes where cliente_tipo <> 2");
                                            while($row=mysqli_fetch_array($sqlcx)){ 
                                     ?>
                                      <option value="<?php echo $row['id_cliente'];?>"><?php echo $row['nome_cliente'];?></option>
                                     <?php } ?>
                                </select>
                              </div>

                              
                              <div class="form-group col-md-3">
                                <label for="inicio_vigencia_contrato">Inicio de validez </label>
                                <input type="date" class="form-control" id="inicio_vigencia_contrato" name="inicio_vigencia_contrato" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="fim_vigencia_contrato">Fim de validez </label>
                                <input type="date" class="form-control" id="fim_vigencia_contrato" name="fim_vigencia_contrato" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="tipo_moeda_contrato">Cambio monetário</label>
                                    <select class="form-control "  name="tipo_moeda_contrato" id="tipo_moeda_contrato" required>
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
                                <label for="valor_total_contrato">Valor total del contrato </label>
                                <input type="text" class="form-control" id="valor_total_contrato" name="valor_total_contrato" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="qtd_parcelas_contrato">Número de plazos </label>
                                <input type="text" class="form-control" id="qtd_parcelas_contrato" name="qtd_parcelas_contrato" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="valor_parcela_contrato">Monto de la cuota</label>
                                <input type="text" class="form-control" id="valor_parcela_contrato" name="valor_parcela_contrato" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="garantia_contrato">Garantia contrato</label>
                                <input type="text" class="form-control" id="garantia_contrato" name="garantia_contrato" required>
                              </div>

                              <div class="form-group col-md-3">
                                <label for="taxa_adm_contrato">Cuota de administracion</label>
                                <input type="text" class="form-control" id="taxa_adm_contrato" name="taxa_adm_contrato">
                              </div>

                              <div class="form-group col-md-3">
                                <label for="comissao_contrato">Comisión</label>
                                <input type="text" class="form-control" id="comissao_contrato" name="comissao_contrato">
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
<script>
$(function() {
  $('#valor_total_contrato').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
  $('#valor_parcela_contrato').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
  $('#garantia_contrato').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
  $('#taxa_adm_contrato').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
  $('#comissao_contrato').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
})
</script>
</body>
</html>

  
