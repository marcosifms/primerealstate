<?php
include ('valida_session.php');

$exibir = "style='display:none'";
$hideform="";

if ( $_SERVER['REQUEST_METHOD']  == 'POST' )
{
  if(isset($_POST['recibo_tipo_itens']))
    $recibo_tipo_itens = $_POST["recibo_tipo_itens"];

  if(isset($_POST['contrato_recibo_itens']))
    $contrato_recibo_itens = $_POST["contrato_recibo_itens"];

  if(isset($_POST['data_recibo_itens']))
    $data_recibo_itens = $_POST["data_recibo_itens"];

  if(isset($_POST['itens_recibo_itens']))
    $itens_recibo_itens = $_POST["itens_recibo_itens"];

	$sql = "insert into recibo_entrega_chaves (recibo_tipo_itens,contrato_recibo_itens,data_recibo_itens,itens_recibo_itens) values ('$recibo_tipo_itens','$contrato_recibo_itens','$data_recibo_itens','$itens_recibo_itens')";
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
  
  <!-- menu lado esquerdo -->
  
  <?php include ('_aside.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
  
  <!-- CONTEÚDO DA PÁGINA --->
  <section class="content-header">
       <h1>
         Recibo de Deposito de Llaves        
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
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true' onClick="window.location = 'frm_emissao_recibo_deposito_llaves.php'">&times;</button>
                	<h4><i class='icon fa fa-check'></i> Processado com sucesso!</h4>
                  <?php $imovel = mysqli_insert_id($con);?>
                  <a href="relatorio_recibo_itens.php?id=<?php echo $imovel;?>"><h4><i class='icon fa fa-print'></i> Imprimir Recibo</h4></a>
                  
              	</div>

            <div <?php echo $hideform; ?>>
            <form name="cadastro" id="cadastro" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

              <input type="hidden" name="recibo_tipo_itens" value="1">

              <div class="box-body">
                <div class="form-group col-md-3">
                  <label for="contrato_recibo_itens">Contrato con el cliente</label>
                      <select class="form-control" name="contrato_recibo_itens" id="contrato_recibo_itens" required>
                        
                       <?php 
                         $sqlcx = mysqli_query($con, "SELECT * FROM contratos INNER JOIN clientes ON clientes.id_cliente = contratos.cliente_locatario 
                    INNER JOIN tipo_contrato ON tipo_contrato.id_tipo_contrato = contratos.tipo_contrato INNER JOIN tipo_moeda ON tipo_moeda.id_moeda = contratos.tipo_moeda_contrato");
                              while($row=mysqli_fetch_array($sqlcx)){ 
                       ?>
                        <option value="<?php echo $row['id_contrato'];?>"><?php echo $row['nome_cliente'];?></option>
                       <?php } ?>
                  </select>
                </div>


                <div class="form-group col-md-3">
                  <label for="data_recibo_itens">Fecha de generación </label>
                  <input type="date" class="form-control" id="data_recibo_itens" name="data_recibo_itens" required>
                </div>

                
                 <div class="form-group col-md-12">
                      <label for="itens_recibo_itens">Itens Recibo</label>
                      <textarea name="itens_recibo_itens" class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
