<?php 
  include_once "../classes/html_inicio.php";
  include_once "../db/db_config_mysql.php";

  if($_SESSION["modificar_onu"] == 0) {
    echo '
    <script language= "JavaScript">
      alert("Sem Permissão de Acesso!");
      location.href="../classes/redirecionador_pagina.php";
    </script>
    ';
  }
?>
  <div id="page-wrapper">
    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="login-panel panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Cadastro de Vlan</h3>
            </div>
            <div class="panel-body">
              <form role="form" action="./add_vlan.php" method="post">
                <div class="form-group">
                  <label>Selecione a OLT</label>
                  <select class="form-control" name="olt">
                    <?php 
                      $sql_consulta_olt = "SELECT DISTINCT deviceName,olt_ip FROM `pon`";
                      $executa_query = mysqli_query($conectar,$sql_consulta_olt);
                      while ($ont = mysqli_fetch_array($executa_query, MYSQLI_BOTH))
                      {
                        echo "<option value=$ont[deviceName]>$ont[deviceName]</option>";
                      }
                    ?>
                  </select>
                </div>
                <button class="btn btn-lg btn-success btn-block">Avançar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <!-- </div> -->
  </div>



<?php include_once "../classes/html_fim.php";   ?>