<?php
//mpv 14/07/2022 -
include( 'valida_session.php' );
include "include/config.php";

$exibir = "style='display:none'";
$hideform = '';

//if ( $_SERVER[ 'REQUEST_METHOD' ]  == 'POST' ) {
if ( isset( $_GET[ 'valor' ] ) ) {

    $lancamento_tipo = $_GET[ 'valor' ];
    if ($lancamento_tipo == 0) {
      $sql = 'SELECT id_fornecedor, tipo_fornecedor,  nome_razao_social_fornecedor FROM fornecedores';
    }
    if ($lancamento_tipo == 1) {
      $sql = 'SELECT id_cliente, cliente_tipo, nome_cliente FROM clientes';
    }
    
    if ($lancamento_tipo == 2) {
      $sql = 'SELECT id_personal, nome_personal, cargo_funcao_personal FROM personal';
    }
    $data = $con->query( $sql )->fetch_all( MYSQLI_ASSOC );
    sleep( 1 );
    echo json_encode( $data );
} else {
    echo 'ERRO: passar valor para consulta';
}

?>