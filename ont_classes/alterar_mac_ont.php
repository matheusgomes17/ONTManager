<?php 
  include_once "../classes/html_inicio.php";

  if($_SESSION["alterar_macONT"] == 0) {
    echo '
    <script language= "JavaScript">
      alert("Sem Permissão de Acesso!");
      location.href="../classes/redirecionador_pagina.php";
    </script>
    ';
  }

?>

<div id="page-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"> Alterar MAC ONT </h3>
          </div>
          <div class="panel-body">
            <form role="form" action="_ont_alterar_mac.php" method="post">
              <div class="form-group">
                <div class="input-group">
                  <label>Contrato</label>
                  <input class="form-control" placeholder="Contrato" name="contrato" type="search" autofocus required>
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Buscar</button>
                  </span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once "../classes/html_fim.php";   ?>