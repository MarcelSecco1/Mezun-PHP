<?php
/*
$titulo_pagina = "Inserir Empresa";
require "header.php";
require "conexao.php";


$nomeFantasia = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_NUMBER_INT);
$cnpj = filter_input(INPUT_POST, "cpj", FILTER_SANITIZE_NUMBER_INT);
$rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT);
$bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_NUMBER_INT);
$cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);



$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

$sql = "insert into Empresa (telefoneContato, nomeFantasia, CNPJ, rua, numero, bairro, CEP, cidade) values (?, ?, ?, ?, ?, ?,?,?)";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$nomeFantasia, $telefone, $cnpj,$rua, $numero,$bairro,$cep,$cidade]);

if ($result == true) {

?>
    <div class="alert alert-success" role="alert">
        <h4> Dados gravados com sucesso </h4>
    </div>
<?php
} else {
?>
    <div class="alert alert-danger" role="alert">
        <h4> Falha ao efetuar gravação. </h4>
        <p><?= $stmt->error; ?></p>
    </div>
<?php
}
?>


<a href="index.php">Voltar ao Início:</a>


<?php
require "footer.php";
*/

?>