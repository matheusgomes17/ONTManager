<?php

  
  include_once "../classes/html_inicio.php";
  include_once "../db/db_config_mysql.php";
  
  if($_SESSION["cadastrar_onu"] == 0) {
    echo '
    <script language= "JavaScript">
      alert("Sem Permissão de Acesso!");
      location.href="../classes/redirecionador_pagina.php";    
    </script>
    ';
  }
  
  $porta_selecionado = filter_input(INPUT_GET,'porta_atendimento');
  $frame = filter_input(INPUT_GET,'frame');
  $slot = filter_input(INPUT_GET,'slot');
  $pon = filter_input(INPUT_GET,'pon');
  $cto = filter_input(INPUT_GET,'cto');
  $device = filter_input(INPUT_GET,'device');
  
?>
  <div id="page-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Cadastro de ONT</h3>
            </div>
            <div class="panel-body">
              <form role="form" action="../classes/cadastrar.php" method="post">
                <fieldset>
                <legend>Informações</legend>
                  <p><?php echo "PORTA: $porta_selecionado | OLT: $device | FRAME: $frame | SLOT: $slot | PON: $pon | CTO: $cto";?></p>
                </fieldset>
                <fieldset class="radio-planos">
                    <div class="form-group">
                      <legend>Selecione o Plano</legend>
                      <div class="radio">
                          <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios1" value="VAS_Internet" checked>INTERNET
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios2" value="VAS_IPTV">IPTV
                          </label>
                      </div>
                      
                      <div class="radio">
                          <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios3" value="VAS_Internet-IPTV">INTERNET | IPTV
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios3" value="VAS_Internet-VoIP">INTERNET | TELEFONE
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                              <input type="radio" name="optionsRadios" id="optionsRadios3" value="VAS_Internet-VoIP-IPTV">INTERNET | TELEFONE | IPTV
                          </label>
                      </div>
                    </div>
                </fieldset>
                
                <fieldset>
                  <legend>Requisitos</legend>
                    <div class="form-group">
                        <label>Contrato</label> 
                        <input class="form-control" placeholder="Contrato" 
                          name="contrato" type="text" autofocus required>
                    </div>
                    
                    <div class="form-group">
                        <label>Pon MAC</label>                                                
                        <input class="form-control" placeholder="MAC PON" name="serial" type="text" minlength=16 maxlength=16 required>
                    </div>
                    <div class="camposPacotes" style="display:visible" >                                   
                      <div class="form-group" >
                        <?php include "../classes/listaPlanos.php" ?>
                        <label>Pacote</label>
                        <select class="form-control" name="pacote">
                        <?php 
                          $sql_lista_velocidades = "SELECT nome,nomenclatura_velocidade FROM planos";
                          $executa_query = mysqli_query($conectar,$sql_lista_velocidades);
                          while ($listaPlanos = mysqli_fetch_array($executa_query, MYSQLI_BOTH)) 
                          {
                            echo "<option value='$listaPlanos[nomenclatura_velocidade]'>$listaPlanos[nome]</option>"; 
                          }
                          mysqli_free_result($executa_query);                                                
                        ?>
                        </select>
                      </div>
                    </div> <!-- fim div pacote -->

                    <div class="form-group">
                      <label>Equipamento</label>
                      <select class="form-control" name="equipamentos">
                        <?php 
                          $sql_consulta_equipamentos = "SELECT * FROM equipamentos";
                          $executa_query_equipamentos = mysqli_query($conectar,$sql_consulta_equipamentos);
                          while ($equipamentos = mysqli_fetch_array($executa_query_equipamentos, MYSQLI_BOTH)) 
                          {
                            echo "<option value=$equipamentos[modelo]>$equipamentos[modelo]</option>";
                          }
                        ?>
                      </select>
                    </div>
                    
                    <?php
                      echo "<input type=hidden name=porta_atendimento value=$porta_selecionado>
                            <input type=hidden name=frame value=$frame>
                            <input type=hidden name=slot value=$slot>
                            <input type=hidden name=pon value=$pon>
                            <input type=hidden name=caixa_atendimento_select value=$cto>
                            <input type=hidden name=deviceName value=$device>
                      ";
                    ?>
                
                    <div class="camposTelefone" style="display:none" >                                   
                      <div class="form-group">
                        <label>Telefone</label>
                        <input class="form-control" placeholder="Telefone" name="numeroTel" type="text" autofocus>
                      </div> 
                      
                      <div class="form-group">
                        <label>Senha do Telefone</label>
                        <input class="form-control" placeholder="Senha do Telefone" name="passwordTel" type="text" autofocus>
                      </div>
                      
                    </div>
                </fieldset>
                <button class="btn btn-lg btn-success btn-block">Avançar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<?php include_once "../classes/html_fim.php";   ?>