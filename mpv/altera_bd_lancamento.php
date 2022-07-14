<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";



$qry1=mysqli_query($con,"SELECT * FROM age37778_prime_real_state.tipo_lancamento  where cod_lanc is null");

echo "<br>";
while($row = mysqli_fetch_array($qry1)){
    
    $chars = str_split($row['desc_lanc']);
    $pos = 0 ;
    foreach($chars as $char){
        if ((ctype_digit($char) ) || ($char=='.') ) {
          $pos++;
        } else {
            break;
        }
    }    
     echo " ".substr($row['desc_lanc'], 0, $pos);
     echo " - ".substr($row['desc_lanc'], $pos, strlen($row['desc_lanc']));
     echo " -- ".$pos;
     echo "<br>";
     $sql = "update  age37778_prime_real_state.tipo_lancamento set cod_lanc='".substr($row['desc_lanc'], 0, $pos)."', desc_lanc = '".substr($row['desc_lanc'], $pos, strlen($row['desc_lanc']))."' where id_lanc=".$row['id_lanc'];
     $resp=mysqli_query($con,$sql);
     echo $sql;
     echo "<br>";

    
}
?>
