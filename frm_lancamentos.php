<?php
include ('valida_session.php');

$exibir = "style='display:none'";
$hideform="";

if ( $_SERVER['REQUEST_METHOD']  == 'POST' )
{
  if(isset($_POST['tipo_lancamento']))
    $tipo_lancamento = $_POST["tipo_lancamento"];

  if(isset($_POST['tipo_opercao_fin']))
    $tipo_opercao_fin = $_POST["tipo_opercao_fin"];

  if(isset($_POST['data_lancamento']))
    $data_lancamento = $_POST["data_lancamento"];

    $datalanc = explode("-", $data_lancamento);
     $mes_lanc =  $datalanc[1];
     $ano_lanc = $datalanc[0];

  if(isset($_POST['moeda_lancamento']))
    $moeda_lancamento = $_POST["moeda_lancamento"];

  if(isset($_POST['valor_lancamento']))
    $valor = $_POST["valor_lancamento"];
    $pontos = '.';
    $valor_lancamento = str_replace($pontos, "", $valor);

  if(isset($_POST['tipo_destinatario']))
    $tipo_destinatario = $_POST["tipo_destinatario"];

  if(isset($_POST['destinatario']))
    $destinatario = $_POST["destinatario"];

  if(isset($_POST['cc_custo_lancamento']))
    $cc_custo_lancamento = $_POST["cc_custo_lancamento"];

  if(isset($_POST['caixa_lancamento']))
    $caixa_lancamento = $_POST["caixa_lancamento"];

  if(isset($_POST['num_doc_lancamento']))
    $num_doc_lancamento = $_POST["num_doc_lancamento"];

  if(isset($_POST['descricao_lancamento']))
    $descricao_lancamento = $_POST["descricao_lancamento"];
  
	$sql = "insert into lancamentos (classe_contabilidade,tipo_operacao_fin,data_lancamento,mes_lancamento,ano_lancamento,moeda_lancamento,valor_lancamento,tipo_destinatario,destinatario,cc_custo_conta_lancamento,caixa_lancamento,num_doc_lancamento,descricao_lancamento) values ('$tipo_lancamento','$tipo_opercao_fin','$data_lancamento','$mes_lanc','$ano_lanc','$moeda_lancamento','$valor_lancamento','$tipo_destinatario','$destinatario','$cc_custo_lancamento','$caixa_lancamento','$num_doc_lancamento','$descricao_lancamento')";
    	$execIncluir = mysqli_query($con, $sql);  
    	if(!$execIncluir) {
    		exit( " Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
    	}
    	else {
    		$exibir = "";
        $hideform="hidden=hidden";
    	}

}

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
                  document.getElementById("load_data").innerHTML = "Carregando...";
                  doc1 = ajax1();
                  var unidade = document.getElementById("tipo_destinatario").value;
                  doc1.open("GET","listadados.php?code="+unidade,true);
                    doc1.onreadystatechange=function(){
                      if (doc1.readyState==4) {
                    var texto = doc1.responseText;
                    document.getElementById("load_data").innerHTML = texto;
                      }
                  }
                  doc1.send(null);
                  }
                </script>
  
  <!-- menu lado esquerdo -->
  
  <?php include ('_aside.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
  
  <!-- CONTEÚDO DA PÁGINA --->
  <section class="content-header">
       <h1>
        Comunicados financieros         
      </h1>
  </section>

  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
      		
            <div align='center' class='alert alert-success alert-dismissible' <?=$exibir;?>>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true' onClick="window.location = 'frm_lancamentos.php'">&times;</button>
                	<h4><i class='icon fa fa-check'></i> Processado com sucesso!</h4>
                  <small>Informações gravadas com Sucesso!</small>
              	</div>

            <div <?php echo $hideform; ?>>
            <form name="cadastro" id="cadastro" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

              <div class="box-body">
                <div class="form-group col-md-3">
                  <label for="tipo_lancamento">Contabilizaciones:</label>
                      <select class="form-control select2" name="tipo_lancamento" id="tipo_lancamento" required>
                        
                        <?php 
                         $sqlcx = mysqli_query($con, "select * from tipo_lancamento");
                              while($row=mysqli_fetch_array($sqlcx)){ 
                       ?>
                        <option value="<?php echo $row['id_lanc'];?>"><?php echo $row['desc_lanc'];?></option>
                       <?php } ?>
                  </select>
                </div>

                <div class="form-group col-md-3">
                  <label for="tipo_opercao_fin">Tipo de operación:</label>
                      <select class="form-control select2" name="tipo_opercao_fin" id="tipo_opercao_fin" required>
                        
                      

                       <?php 
                         $sqlcx = mysqli_query($con, "select * from tipo_operacao_financeira");
                              while($row=mysqli_fetch_array($sqlcx)){ 
                       ?>
                        <option value="<?php echo $row['id_tipo_operacao_fin'];?>"><?php echo $row['desc_tipo_operacao_fin'];?></option>
                       <?php } ?>
                  </select>
                </div>


                <div class="form-group col-md-3">
                  <label for="data_lancamento">Data</label>
                  <input type="date" class="form-control" id="data_lancamento" name="data_lancamento" required>
                </div>

                <div class="form-group col-md-3">
                  <label for="moeda_lancamento">Cambio monetário</label>
                    <select class="form-control "  name="moeda_lancamento" id="moeda_lancamento" required>
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
                  <label for="valor_lancamento">Valor </label>
                  <input type="text" class="form-control" id="valor_lancamento" name="valor_lancamento" required>
                </div>

                <div class="form-group col-md-3">
                  <label for="tipo_destinatario">Clase de destinatario</label>
                      <select class="form-control" name="tipo_destinatario" id="tipo_destinatario"  onchange="carregadata();" required>
                      <option value="">Seleccione...</option>
                       <?php 
                         $sqlcx = mysqli_query($con, "select * from tipo_destinatario");
                              while($row=mysqli_fetch_array($sqlcx)){ 
                       ?>
                        <option value="<?php echo $row['id_tipo_destinatario'];?>"><?php echo $row['nome_tipo_destinatario'];?></option>
                       <?php } ?>
                  </select>
                </div>

                
                <div class="" id="load_data">
                                
                </div>


                <div class="form-group col-md-3">
                  <label for="cc_custo_lancamento">Centro de coste</label>
                      <select class="form-control select2" name="cc_custo_lancamento" id="cc_custo_lancamento" required>
                       
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
                    <select class="form-control select2"  name="caixa_lancamento" id="caixa_lancamento" required>
                     
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
                  <input type="text" class="form-control" id="num_doc_lancamento" name="num_doc_lancamento">
                </div>
                
                <div class="form-group col-md-12">
                      <label for="descricao_lancamento">Descripción</label>
                      <textarea name="descricao_lancamento" class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

			       </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Gravar</button>
                <button type="button" class="btn btn-danger" onClick="window.location = 'principal.php'">Fechar</button>
              </div>
            </form>
          </div>
          </div>
       </div>
      </div>
     </section>
          <!-- /.box -->
  
  
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

<script>
$(function() {
  $('#valor_lancamento').maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

})
</script>

</body>
</html>
