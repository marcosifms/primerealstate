<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>
<?php
header("Content-type: text/html; charset=utf-8");

include "../valida_session.php";
include "../include/config.php";
//include "../include/funcoes.php";

//$valorteste = 1512217351.23;
//$valorteste = 15122.00; //erro
  //$valorteste = 1512217351.00;
  $valorteste = 230000.00; //erro
echo "<br>".valorPorExtenso($valorteste,1);
echo "<br>".valorPorExtenso($valorteste,2);
echo "<br>".valorPorExtenso($valorteste,3);

function itens_nivel($nivel, $cod_lanc, $con) {
  $sql_local = "SELECT tl.*, CHAR_LENGTH(cod_lanc)  
  FROM age37778_prime_real_state.tipo_lancamento tl
  where nivel_lanc = $nivel  and  cod_lanc like '$cod_lanc%'
  order by cod_lanc";
  //echo $sql_local;
  $qry2=mysqli_query($con,$sql_local);
  echo "<ul class='nested'>";
  while($row1 = mysqli_fetch_array($qry2)){    
    echo "<li>".$row1['cod_lanc']."</li>";
  }
  echo "</ul>";
}

$qry1=mysqli_query($con,"SELECT tl.*, CHAR_LENGTH(cod_lanc)  
FROM age37778_prime_real_state.tipo_lancamento tl
where nivel_lanc = 2
order by cod_lanc");

echo " <ul id='myUL'>
  <li><span class='caret'>Centro de custos</span>
    <ul class='nested'>";
while($row = mysqli_fetch_array($qry1)){
    /*echo($row['cod_ccusto']);
    echo "<br>";*/
    echo "<li> <span class='caret'> ";
    echo $row['cod_lanc']." - ".$row['desc_lanc'];
    echo "</span> ";
    itens_nivel($row['nivel_lanc']+1, $row['cod_lanc'], $con);          
    echo "</li>";
  }
echo " </ul> 
</li>
</ul>"
?>

<ul id="myUL">
  <li><span class="caret">Centro de custos</span>
    <ul class="nested">
      <li>Water</li>
      <li>Coffee</li>
      <li><span class="caret">Tea</span>
        <ul class="nested">
          <li>Black Tea</li>
          <li>White Tea</li>
          <li><span class="caret">Green Tea</span>
            <ul class="nested">
              <li>Sencha</li>
              <li>Gyokuro</li>
              <li>Matcha</li>
              <li>Pi Lo Chun</li>
            </ul>
          </li>
        </ul>
      </li>  
    </ul>
  </li>
</ul>

<script>
var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    if (this.parentElement.querySelector(".nested").innerHTML== "<li id=-1></li>") {
      this.parentElement.querySelector(".nested").html("");
      this.parentElement.querySelector(".nested").append("<li><span class='caret'>1.1</span></li>");
      //this.parentElement.querySelector(".nested").innerHTML += "<li><span class='caret'>1.2</span></li>";
    }
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
    //console.log(this.parentElement.querySelector(".nested").innerHTML);
  });
}
</script>