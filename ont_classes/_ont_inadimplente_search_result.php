<?php 
  
  include_once "../classes/html_inicio.php";
  include_once "../classes/funcoes.php";
  
  if($_SESSION["desativar_ativar_onu"] == 0) 
  {
    echo '
    <script language= "JavaScript">
      alert("Sem Permissão de Acesso!");
      location.href="../classes/redirecionador_pagina.php";
    </script>
    ';
  }
?>
  <?php 
    include "../db/db_config_mysql.php";
    $contrato = $_POST['contrato'];
    
    if(checar_contrato($contrato) == null)
    {
      mysqli_close($conectar);
      echo '
        <script language= "JavaScript">
          alert("Contrato Inexistente ou Cancelado");
          location.href="../ont_classes/alterar_mac_ont.php";
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
              <h3 class="panel-title">Ativa|Desativa Cliente</h3>
            </div>
            <div class="panel-body">
              <form role="form" action="../classes/desativa_ativa.php" method="post">
                <div class="form-group">
                  <label>Contrato</label> 
                  <input class="form-control" placeholder="Contrato" name="contrato" type="text" value='<?php echo $contrato; ?>' autofocus readonly>
                </div>
                
                <div class="form-group">
                  <label>Pon MAC</label>                                                
                  <select class="form-control" name="serial">
                    <?php 
                      $sql_consulta_serial = "SELECT serial,pacote,status FROM ont
                        WHERE contrato = $contrato";
                      $executa_query = mysqli_query($conectar,$sql_consulta_serial);
                      while ($ont = mysqli_fetch_array($executa_query, MYSQLI_BOTH))
                      {
                        echo "<option value=$ont[serial]>$ont[serial]</option>";
                        $pacote = $ont['pacote'];
                        $status = $ont['status'];
                      }  
                      if(empty($pacote))
                      {
                        mysqli_close($conectar);
                        echo '
                          <script language= "JavaScript">
                            alert("Não Há Equipamento!");
                            location.href="ont_disable.php";
                          </script>
                          ';
                      }                    
                    ?>
                  </select>
                  <input name="status" type='hidden' value=<?php if(!empty($status))echo $status; ?> />
                  <input name="contrato" type='hidden' value=<?php echo $contrato; ?> />
                </div>
                
                <?php 
                if(!empty($status))
                {
                  if($status == 1) 
                  {
                    echo  '<button class="btn btn-lg btn-success btn-block">Ativar</button>';
                  }else{
                    echo  '<button class="btn btn-lg btn-success btn-block">Desativar</button>';
                  }
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
<?php include_once "../classes/html_fim.php";   ?>