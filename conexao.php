<?php

$conf = parse_ini_file("conexao.ini");

$dsn = $conf["driver"] .
    ":host=" . $conf["server"] .
    ";dbname=" . $conf["database"] .
    ";port=" . $conf["port"];
try{
    $conn = new PDO($dsn, $conf["user"], $conf["password"]);
    if($conf["debug"] == "true") {
        echo "<h2>Sucesso!</h2>";
        echo "<p>Conectado ao Banco de Dados.<b>" . $conf["database"] . "</b></p>";
    }
} catch (Exception $e){
    echo "<p>Erro ao conectar no Banco de Dados.</p>";
    echo $e->getMessage();
}
?>