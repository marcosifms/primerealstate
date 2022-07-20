<?php
//mpv 13/07/2022 - no frm_lancamentos.php vai existir uma chamada via ajax para este arquivo
include('valida_session.php');

$exibir = "style='display:none'";
$hideform = "";



if ($_SERVER['REQUEST_METHOD']  == 'POST') {
  if (isset($_POST['lancamento_tipo']))
    $lancamento_tipo = $_POST["lancamento_tipo"];

  // if (isset($_POST['tipo_opercao_fin']))
  //  $tipo_opercao_fin = $_POST["tipo_opercao_fin"];

  if (isset($_POST['data_lancamento']))
    $data_lancamento = $_POST["data_lancamento"];

  $datalanc = explode("-", $data_lancamento);
  $mes_lanc =  $datalanc[1];
  $ano_lanc = $datalanc[0];

  if (isset($_POST['moeda_lancamento']))
    $moeda_lancamento = $_POST["moeda_lancamento"];

  if (isset($_POST['valor_lancamento']))
    $valor = $_POST["valor_lancamento"];
  $pontos = '.';
  $valor_lancamento = str_replace($pontos, "", $valor);
  $valor_lancamento = str_replace(",", ".", $valor_lancamento);






  // if (isset($_POST['destinatario']))
  // $destinatario = $_POST["destinatario"];

  if (isset($_POST['cc_custo_conta_lancamento']))
    $cc_custo_conta_lancamento = $_POST["cc_custo_conta_lancamento"];

  if (isset($_POST['caixa_lancamento']))
    $caixa_lancamento = $_POST["caixa_lancamento"];

  if (isset($_POST['num_doc_lancamento']))
    $num_doc_lancamento = $_POST["num_doc_lancamento"];

  if (isset($_POST['descricao_lancamento']))
    $descricao_lancamento = $_POST["descricao_lancamento"];


  if (isset($_POST['classe_pago_cobro']))
    $classe_pago_cobro = $_POST["classe_pago_cobro"]; //fwlr 14/07
    if ($classe_pago_cobro == "PR") {
      if (isset($_POST['fornecedor_lancamento']))
          $fornecedor_lancamento = $_POST["fornecedor_lancamento"]; //fwlr 14/07
      $sql = "insert into lancamentos (lancamento_tipo, data_lancamento, mes_lancamento,ano_lancamento ,moeda_lancamento, valor_lancamento, classe_pago_cobro, fornecedor_lancamento, cc_custo_conta_lancamento, caixa_lancamento, num_doc_lancamento, descricao_lancamento ) values ('$lancamento_tipo','$data_lancamento','$mes_lanc','$ano_lanc','$moeda_lancamento','$valor_lancamento','$classe_pago_cobro','$fornecedor_lancamento','$cc_custo_conta_lancamento','$caixa_lancamento','$num_doc_lancamento','$descricao_lancamento')";
    }
  
  if ($classe_pago_cobro == "CL") {
    if (isset($_POST['fornecedor_lancamento']))
        $cliente_lancamento = $_POST["fornecedor_lancamento"]; //fwlr 14/07
    $sql = "insert into lancamentos (lancamento_tipo, data_lancamento, mes_lancamento,ano_lancamento ,moeda_lancamento, valor_lancamento, classe_pago_cobro, cliente_lancamento, cc_custo_conta_lancamento, caixa_lancamento, num_doc_lancamento, descricao_lancamento ) values ('$lancamento_tipo','$data_lancamento','$mes_lanc','$ano_lanc','$moeda_lancamento','$valor_lancamento','$classe_pago_cobro','$cliente_lancamento','$cc_custo_conta_lancamento','$caixa_lancamento','$num_doc_lancamento','$descricao_lancamento')";
  }
  
  if ($classe_pago_cobro == "PE") {
    if (isset($_POST['fornecedor_lancamento']))
        $personal_lancamento = $_POST["fornecedor_lancamento"]; //fwlr 14/07
    $sql = "insert into lancamentos (lancamento_tipo, data_lancamento, mes_lancamento,ano_lancamento ,moeda_lancamento, valor_lancamento, classe_pago_cobro, personal_lancamento, cc_custo_conta_lancamento, caixa_lancamento, num_doc_lancamento, descricao_lancamento ) values ('$lancamento_tipo','$data_lancamento','$mes_lanc','$ano_lanc','$moeda_lancamento','$valor_lancamento','$classe_pago_cobro','$personal_lancamento','$cc_custo_conta_lancamento','$caixa_lancamento','$num_doc_lancamento','$descricao_lancamento')";
  }

  $execIncluir = mysqli_query($con, $sql);
  if (!$execIncluir) {
    echo (" Erro : ao gravar no Banco de Dados ==> " . mysqli_error($con));
  } else {
    echo "Comunicado financiero insertado.";
  }
}
