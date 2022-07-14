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



$qry1=mysqli_query($con,"SELECT cc.*, CHAR_LENGTH(cod_ccusto)  
FROM age37778_prime_real_state.centro_custo cc
where CHAR_LENGTH(cod_ccusto) = 1
order by cod_ccusto");

echo " <ul id='myUL'>
  <li><span class='caret'>Centro de custos</span>
    <ul class='nested'>
";
while($row = mysqli_fetch_array($qry1)){
    /*echo($row['cod_ccusto']);
    echo "<br>";*/
    echo "<li> ";
    echo $row['cod_ccusto'];
    echo " </li>";
      
    

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
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}
</script>