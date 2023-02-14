<?php
session_start();
require("logica-aut.php");
require "conexao.php";
if (!autenticado()) {
    $_SESSION["restrito"] = true;
    redireciona("index.php");
    die();
}

$id = filter_input(INPUT_POST, "id",FILTER_SANITIZE_SPECIAL_CHARS);
$sql = "delete from Candidato where idCandidato= ?";


try{
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);
}catch(Exception $e){
        $result = false;
        $error = $e->getMessage();
    }


if ($result == true) {
    $_SESSION["result"] = true;
   
    session_destroy();

} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;

}
redireciona("index.php");



require "footer.php";
