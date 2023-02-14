<?php
session_start();
require "logica-aut.php";

if(autenticado()){
    redireciona("index.php");
    die();
}

require "conexao.php";


$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, "senha");

$sql = "select nome, senha from Candidato where email = ?";

$stmt = $conn->prepare($sql);
$result = $stmt->execute([$email]);
$row = $stmt->fetch();

if (!empty($row["senha"])) {
    if (password_verify($senha, $row["senha"])) {

        $_SESSION["email"] = $email;
        $_SESSION["nome"] = $row["nome"];
        $_SESSION["result"] = true;
        $_SESSION["danger"] = "success";
        $_SESSION["erro"] = "Autenticado com sucesso!";
        redireciona("index.php");

    } else {

        $_SESSION["result"] = false;
        $_SESSION["danger"] = "danger";
        $_SESSION["erro"] = "Senha incorreta!";
        redireciona("formLogin.php");
   
    }
} else {
    $_SESSION["danger"] = "danger";
    $_SESSION["result"] = false;
    $_SESSION["erro"] = "Nenhuma usuário encontrado com esse email!";
    redireciona("formLogin.php");
    
}






?>