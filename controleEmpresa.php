<?php
session_start();
require("logica-aut.php");
require "cabecalho.php";
require "conexao.php";
if (!autenticado()) {
  $_SESSION["restrito"] = true;
  redireciona("index.php");
  die();
}
?>
<br>
<?php
if (isset($_SESSION["result"])) {
    if (isset($_SESSION["result"])) {
        //inseriu de forma correta
        unset($_SESSION["result"]);
?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Sucesso!</h4>
            <p><?= $_SESSION["msg"]?></p>
        </div>
        
    <?php
    } else {
        //inseriu de maneira errada
        $erro = $_SESSION["erro"];
        unset($_SESSION["erro"]);
    ?>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erro!</h4>
            <p><?= $erro ?></p>
        </div>
<?php
    }
}


$sql = "select v.idVaga, c.nome, c.especificacoes, e.nomeFantasia, v.dataDisponivelFim, v.propostaSalarial, v.observacoes
from Cargo c inner join Vaga v
on c.idCargo = v.idCargo inner join Empresa e
on v.idEmpresa = e.idEmpresa order by c.nome";

$stmt = $conn->query($sql);

?>

<h3 class="text-center mt-4">Lista de Vagas Disponíveis:</h3>

<div class="row align-items-center justify-content-end flex-column flex-sm-row">
  <div class="col-12 mt-4">

    <table class="table table-dark table-striped">
      <tr>

        <th class="linha" scope="col" style="width: 20%;">Cargo</th>
        <th scope="col" style="width: 20%;">Área</th>
        <th scope="col" style="width:  20%;">Nome Empresa</th>
        <th scope="col" style="width: 15%;">Data Final</th>
        <th scope="col" style="width: 15%;">Proposta Salarial</th>
        <th scope="col" style="width: 35%;">Observações</th>
        <th scope="col" style="width: 15%;" colspan="2"></th>
      </tr>
      <tbody>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
          <tr>
            <td><?= $row["nome"] ?></td>
            <td><?= $row["especificacoes"] ?></td>
            <td><?= $row["nomefantasia"] ?></td>
            <td><?= $row["datadisponivelfim"] ?></td>
            <td><?= $row["propostasalarial"] ?></td>
            <td><?= $row["observacoes"] ?></td>
            <td>
              <a href="enviarCurriculo.php?idVaga=<?= $row["idvaga"] ?>" class="btn btnEnviar pequeno" onclick="if(!confirm('Deseja enviar o Currículo?')) return false" ;>
                <i class="bi bi-check-circle-fill"></i>
                Enviar Currículo
              </a>
            </td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>
  </div>
</div>


<style>
  main {
    min-height: 87.4vh;
  }

  .pequeno {
    width: 90px;
    height: 60px;
  }
</style>

<?php
require "footer.php";

?>