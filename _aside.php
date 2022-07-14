<?php

if ($perfil == '1'){
  $x = "";
  $y = "";
} else {
  $x = "<!-- ";
  $y = " -->";
}

?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <?php echo $x; ?> <li><a href="gerenciar_acesso_sistema.php"><i class="fa  fa-chevron-circle-right"></i> <span> ACCESO</span></a></li><?php echo $y; ?>
       <li class=" treeview">
          <a href="#">
            <i class="fa fa-chevron-circle-right"></i> <span>ADJUSTES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
                    <a href="#"><i class="fa fa-arrow-right"></i>Parámetros
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="tipos_propriedades.php"><i class="fa fa-arrow-right"></i>Clase de Propiedades</a></li>
                      <li><a href="tipo_fornecedor.php"><i class="fa fa-arrow-right"></i>Clase de Proveedores</a></li>
                      <li><a href="tipos_contratos.php"><i class="fa fa-arrow-right"></i>Clase de Contratos</a></li>
                      <li><a href="tipos_lancamentos.php"><i class="fa fa-arrow-right"></i>Clase de Contabilidad</a></li>
                      <li><a href="tipos_moeda.php"><i class="fa fa-arrow-right"></i>Clase de Monedas</a></li>
                      <li><a href="tipos_centro_custo.php"><i class="fa fa-arrow-right"></i>Clase Centro de Costos</a></li>
                      <li><a href="tipos_caixa.php"><i class="fa fa-arrow-right"></i>Clase de Cajas</a></li>
                    </ul>
                </li>

          </ul>
        </li>
        <!-- ////////////////////// site ///////////////////////// -->


         <!--    <li class="treeview">
              <a href="#">
                <i class="fa  fa-chevron-circle-right"></i> <span>Institucional</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>

              <ul class="treeview-menu">
               
                <li><a href="frm_informacoes_institucionais.php"><i class="fa fa-arrow-right"></i>Dados Institucionais</a></li>
                <li><a href="#" onclick="return abrirPopup('frm_cadastro_foto_institucional.php',800,600)"><i class="fa fa-arrow-right"></i> Inserir Fotos Institucionais</a></li>
                <li><a href="frm_institucional_fotos.php"><i class="fa fa-arrow-right"></i> Galeria Fotos Institucionais</a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-arrow-right"></i>Equipe Médica
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="frm_cadastro_medico.php"><i class="fa fa-arrow-right"></i> Inserir</a></li>
                      <li><a href="gerenciar_medicos.php"><i class="fa fa-arrow-right"></i> Gerenciar</a></li>
                    </ul>
                </li>
              </ul>  
            </li>
        </li>
        <li class="treeview">
              <a href="#">
                <i class="fa  fa-chevron-circle-right"></i> <span>Exames</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>

              <ul class="treeview-menu">
                <li><a href="gerenciar_exames.php"><i class="fa fa-arrow-right"></i>Gerenciar</a></li>
              </ul>  
        </li>
        <li class="treeview">
              <a href="#">
                <i class="fa  fa-chevron-circle-right"></i> <span>Convênios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>

              <ul class="treeview-menu">
               
                <li><a href="frm_cadastro_logo_convenio.php"><i class="fa fa-arrow-right"></i>Cadastrar</a></li>
                <li><a href="gerenciar_logo_convenio.php"><i class="fa fa-arrow-right"></i>Gerenciar</a></li>
              </ul>

              
        </li> -->
        <!-- <li class=" treeview">
              <a href="#">
                <i class="fa fa-chevron-circle-right"></i> <span>Blog</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="frm_categoria_noticia.php"><i class="fa fa-arrow-right"></i> Categorias</a></li>
                <li><a href="frm_cadastro_noticia.php"><i class="fa fa-arrow-right"></i> Posts</a></li>
                <li><a href="gerenciar_noticias.php"><i class="fa fa-arrow-right"></i> Gerenciar</a></li>
              </ul>
            </li> -->
        <li><a href="gerenciar_clientes.php"><i class="fa  fa-chevron-circle-right"></i> <span>CLIENTES</span></a></li>
        <li><a href="gerenciar_fornecedores.php"><i class="fa  fa-chevron-circle-right"></i> <span>PROVEEDORES</span></a></li>
        <li><a href="gerenciar_personas.php"><i class="fa  fa-chevron-circle-right"></i> <span>PERSONAL</span></a></li>
        <li><a href="gerenciar_imoveis.php"><i class="fa  fa-chevron-circle-right"></i> <span>PROPIEDADES</span></a></li>
        <li><a href="gerenciar_contratos.php"><i class="fa  fa-chevron-circle-right"></i> <span>GESTIÓN DE CONTRATOS</span></a></li>
        
        <li class="treeview">
              <a href="#">
                <i class="fa  fa-chevron-circle-right"></i> <span>COMUNICADOS FINANCIEROS</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>

              <ul class="treeview-menu">
                <li><a href="frm_lancamentos.php"><i class="fa fa-arrow-right"></i>Insertar Comunicados</a></li>
                <li><a href="frm_lancamentos_find.php"><i class="fa fa-arrow-right"></i>Gestión Comunicados</a></li>
              </ul>  
        </li>
        <li class="treeview">
              <a href="#">
                <i class="fa  fa-chevron-circle-right"></i><span>CARTA DE INSTRUÇÕES</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>

              <ul class="treeview-menu">
                <li><a href="frm_emissao_carta_pagamento.php"><i class="fa fa-arrow-right"></i>ASUNTO</a></li>
              </ul>  
        </li>

        <li class="treeview">
              <a href="#">
                <i class="fa  fa-chevron-circle-right"></i><span>RECIBOS</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>

              <ul class="treeview-menu">
                <li><a href="frm_emissao_recibo_deposito_llaves.php"><i class="fa fa-arrow-right"></i>Recibo de Deposito de Llaves</a></li>
               <!--  <li><a href="#"><i class="fa fa-arrow-right"></i>Recibo de Dinero - Proprietário</a></li>
                <li><a href="#"><i class="fa fa-arrow-right"></i>Recibo de Dinero - Inquilino</a></li> -->
              </ul>  
        </li>
        <li><a href="frm_relatorio_gerencial.php"><i class="fa  fa-chevron-circle-right"></i><span>INFORME GERENCIAL</span></a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> <span>SAIR</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  