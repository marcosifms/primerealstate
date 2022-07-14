<?php
include ('valida_session.php');

$exibir = "style='display:none'";
$hideform="";

if ( $_SERVER['REQUEST_METHOD']  == 'POST' )
{
  if(isset($_POST['tipo_lancamento']))
    $tipo_lancamento = $_POST["tipo_lancamento"];

  if(isset($_POST['data_lancamento']))
    $data_lancamento = $_POST["data_lancamento"];

  if(isset($_POST['moeda_lancamento']))
    $moeda_lancamento = $_POST["moeda_lancamento"];

  if(isset($_POST['valor_lancamento']))
    $valor = $_POST["valor_lancamento"];
    $pontos = '.';
    $valor_lancamento = str_replace($pontos, "", $valor);

  if(isset($_POST['fornecedor_lancamento']))
    $fornecedor_lancamento = $_POST["fornecedor_lancamento"];

  if(isset($_POST['cc_custo_lancamento']))
    $cc_custo_lancamento = $_POST["cc_custo_lancamento"];

  if(isset($_POST['caixa_lancamento']))
    $caixa_lancamento = $_POST["caixa_lancamento"];

  if(isset($_POST['num_doc_lancamento']))
    $num_doc_lancamento = $_POST["num_doc_lancamento"];

  if(isset($_POST['descricao_lancamento']))
    $descricao_lancamento = $_POST["descricao_lancamento"];
  
	$sql = "insert into lancamentos (lancamento_tipo,data_lancamento,moeda_lancamento,valor_lancamento,fornecedor_lancamento,cc_custo_conta_lancamento,caixa_lancamento,num_doc_lancamento,descricao_lancamento) values ('$tipo_lancamento','$data_lancamento','$moeda_lancamento','$valor_lancamento','$fornecedor_lancamento','$cc_custo_lancamento','$caixa_lancamento','$num_doc_lancamento','$descricao_lancamento')";
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
      		
            
 
            <form name="cadastro" id="cadastro" role="form" method="get" action="frm_lancamentos_result.php" enctype="multipart/form-data">

                <div class="box-body">
                  

                <div class="form-group col-md-3">
                  <label for="data_start">Fecha de inicio</label>
                  <input type="date" class="form-control" id="data_start" name="data_start" required>
                </div>

                <div class="form-group col-md-3">
                  <label for="data_end">Fecha final </label>
                  <input type="date" class="form-control" id="data_end" name="data_end" required>
                </div>

			       </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Localizar</button>
                <button type="button" class="btn btn-danger" onClick="window.location = 'principal.php'">Fechar</button>
              </div>
            </form>
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
