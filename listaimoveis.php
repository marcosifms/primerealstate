<?php

include 'valida_session.php';

$proprietario_imovel = $_GET['code'];

//$query = mysql_query("select * from cursos where CATEGORIA = $curso order by NOME_CURSO");
?>
<div class="form-group col-md-6">
    <label for="cliente_contrato">Propiedad del Cliente</label>
        <select class="form-control" name="imovel_contrato" id="imovel_contrato">
            <option value="" selected="selected">Seleccione la propiedad del cliente</option>
            <option value="">---</option>
                <?php 
                    $querycursos = mysqli_query($con,"select * from imoveis where proprietario_imovel = '$proprietario_imovel'");
                        while ($arraycursos = mysqli_fetch_array($querycursos)){ ?> 
                          <option value="<?php echo $arraycursos['id_imovel'];?>"><?php echo $arraycursos['endereco_imovel'];?></option>
                        <?php }?>
        </select>
</div>