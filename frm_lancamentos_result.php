<?php

include 'valida_session.php';

$data_start = $_GET['data_start'];
$data_end = $_GET['data_end'];

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
         Gestión Comunicados          
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
                  <th>Fecha</th>
                  <th>Tipo de lanzamiento</th>
                  <th>Moneda</th>

                  <th>Centro de coste</th>
                  <th>Caja</th>
                  <th>Valor</th>

                  <th width="2%"></th>
                  <th width="2%"></th>

                </tr>
                </thead>
                <tbody>
                <?php
        					$query = mysqli_query($con,"SELECT * FROM lancamentos
                    INNER JOIN tipo_lancamento ON tipo_lancamento.id_lanc = lancamentos.classe_contabilidade
                    INNER JOIN tipo_moeda ON tipo_moeda.id_moeda = lancamentos.moeda_lancamento

                    INNER JOIN centro_custo ON centro_custo.id_ccusto = lancamentos.cc_custo_conta_lancamento
                    INNER JOIN caixa ON caixa.id_caixa = lancamentos.caixa_lancamento  
                    WHERE data_lancamento BETWEEN '$data_start' AND '$data_end'");
        						
        						while($array = mysqli_fetch_array($query)){

                      

        				?>
                <tr>
                  <td><?php print databr($array['data_lancamento']);?></td>
                  <td><?php print $array['desc_lanc'];?></td>
                  <td><?php print $array['sigla_moeda'];?></td>

                  <td><?php print $array['cod_ccusto'];echo " - ";print $array['desc_ccusto'];?></td>
                  <td><?php print $array['desc_caixa'];?></td>
                  <td><?php print $array['sigla_moeda'];?><?php print number_format($array['valor_lancamento'], 2, ',', '.');?></td>

                  <td>
                      <div align="center" class="btn-group">
                      		<button type="button" class="btn btn-info btn-xs" title="Cambiar lancamento" data-toggle="modal" data-target="#modalalterar<?php echo $array['id_lancamento'];?>"><i class="fa fa-pencil-square-o"></i></button>                
                      </div>

                  </td>
                  	
                  <td>
                      <div class="btn-group">
                      		<button type="button" class="btn btn-danger btn-xs" title="Borrar" data-toggle="modal" data-target="#modal-excluir<?php echo $array['id_lancamento'];?>"><i class="fa fa-close"></i></button>
                      </div>
                  </td>
                </tr>
                
               
                    <div class="modal fade" id="modalalterar<?php echo $array['id_lancamento'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      
                      <div class= "modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                          
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Cambiar los datos del comunicados </h4>
                          </div>
                          
                          <div class="modal-body">

                            <form name="altera_lanc" id="altera_lanc" role="form" method="post" action="src/altera_lancamento.php" enctype="multipart/form-data">

                              <input type="hidden" name="id" value="<?php echo $array['id_lancamento'];?>">
                           

                              <div class="box-body">
                                
                                <div class="form-group col-md-3">
                                  <label for="tipo_lancamento">Contabilizaciones</label>
                                      <select class="form-control" name="tipo_lancamento" id="tipo_lancamento" required>
                                         <option value="<?php echo $array['lancamento_tipo'];?>"><?php echo $array['desc_lanc'];?></option>
                                         <option>---</option>
                                         <?php 
                                           $sqlcx = mysqli_query($con, "select * from tipo_lancamento");
                                                while($row=mysqli_fetch_array($sqlcx)){ 
                                         ?>
                                          <option value="<?php echo $row['id_lanc'];?>"><?php echo $row['desc_lanc'];?></option>
                                         <?php } ?>
                                      </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="data_lancamento">Data</label>
                                  <input type="date" class="form-control" id="data_lancamento" name="data_lancamento" value="<?php echo $array['data_lancamento'];?>" required>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="moeda_lancamento">Cambio monetário</label>
                                    <select class="form-control "  name="moeda_lancamento" id="moeda_lancamento" required>
                                      <option value="<?php echo $array['moeda_lancamento'];?>"><?php echo $array['sigla_moeda'];echo " - "; echo $array['desc_moeda'];?></option>
                                       <option>---</option>
                                      <?php 
                                        $sqlcx = mysqli_query($con, "select * from tipo_moeda");
                                          while($row=mysqli_fetch_array($sqlcx)){ 
                                      ?>
                                        <option value="<?php echo $row['id_moeda'];?>"><?php echo $row['sigla_moeda'];echo " - "; echo $row['desc_moeda'];?></option>
                                      <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="valor_lancamento">Valor </label>
                                  <?php $valor_lancamento = number_format($array['valor_lancamento'], 2, ',', '.'); ?>
                                  <input type="text" class="form-control" id="valor_lancamento" name="valor_lancamento" value="<?php echo $valor_lancamento;?>" required>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="fornecedor_lancamento">Provedores</label>
                                      <select class="form-control" name="fornecedor_lancamento" id="fornecedor_lancamento" required>
                                       <option value="<?php echo $array['fornecedor_lancamento'];?>"><?php echo $array['nome_razao_social_fornecedor'];?></option>
                                       <option>---</option>
                                       <?php 
                                         $sqlcx = mysqli_query($con, "select * from fornecedores");
                                              while($row=mysqli_fetch_array($sqlcx)){ 
                                       ?>
                                        <option value="<?php echo $row['id_fornecedor'];?>"><?php echo $row['nome_fornecedor'];?></option>
                                       <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="cc_custo_lancamento">Centro de coste</label>
                                      <select class="form-control" name="cc_custo_lancamento" id="cc_custo_lancamento" required>
                                      <option value="<?php echo $array['cc_custo_conta_lancamento'];?>"><?php echo $array['cod_ccusto'];?> - 
                                        <?php echo $array['desc_ccusto'];?></option>
                                       
                                       <option>---</option>
                                       <?php 
                                         $sqlcx = mysqli_query($con, "select * from centro_custo");
                                              while($row=mysqli_fetch_array($sqlcx)){ 
                                       ?>
                                        <option value="<?php echo $row['id_ccusto'];?>"><?php echo $row['cod_ccusto'];?> - <?php echo $row['desc_ccusto'];?></option>
                                       <?php } ?>
                                  </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="caixa_lancamento">Caja</label>
                                    <select class="form-control "  name="caixa_lancamento" id="caixa_lancamento" required>
                                      <option value="<?php echo $array['caixa_lancamento'];?>"><?php echo $array['desc_caixa'];?></option>
                                       
                                       <option>---</option>
                                      <?php 
                                        $sqlcx = mysqli_query($con, "select * from caixa");
                                          while($row=mysqli_fetch_array($sqlcx)){ 
                                      ?>
                                        <option value="<?php echo $row['id_caixa'];?>"><?php echo $row['desc_caixa'];?></option>
                                      <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                  <label for="num_doc_lancamento">Número del Documento </label>
                                  <input type="text" class="form-control" id="num_doc_lancamento" name="num_doc_lancamento" value="<?php echo $array['num_doc_lancamento']; ?>">
                                </div>
                                
                                <div class="form-group col-md-12">
                                      <label for="descricao_lancamento">Descripción</label>
                                      <textarea name="descricao_lancamento" class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $array['descricao_lancamento']; ?></textarea>
                                </div>



                                

                             </div>
                              <!-- /.box-body -->

                              <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Gravar</button>
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
  $('#valor_lancamento').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
})
</script>
</body>
</html>

  
