<?php
session_start();
require("logica-aut.php");
$titulo_pagina = "Inserir Candidato";


require "conexao.php";


$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$telefone1 = filter_input(INPUT_POST, "telefone1", FILTER_SANITIZE_NUMBER_INT);
$telefone2 = filter_input(INPUT_POST, "telefone2", FILTER_SANITIZE_NUMBER_INT);
$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_NUMBER_INT);
$rua = filter_input(INPUT_POST, "rua", FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT);
$bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_NUMBER_INT);
$cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$idade = filter_input(INPUT_POST, "idade", FILTER_SANITIZE_NUMBER_INT);
$senha = filter_input(INPUT_POST, "senha");

$nomeC = $_FILES['curriculo']['name'];
$tamanho = $_FILES['curriculo']['size'];
$tipo = $_FILES['curriculo']['type'];
$extensao = pathinfo($nome, PATHINFO_EXTENSION);
$senha_hash = password_hash($senha, PASSWORD_BCRYPT);

// Read in a binary file
$data = file_get_contents($_FILES['curriculo']['tmp_name']);


$sql = "insert into Candidato (CPF, idade, nome, telefone1, telefone2, rua, numero, bairro,CEP,senha,email,cidade, curriculos) 
        values (?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?)";
//** 
//$stmt = $conn->prepare($sql);
//$stmt->bindValue(1, $cpf, PDO::PARAM_STR);
//$stmt->bindValue(2, $idade, PDO::PARAM_INT);
//$stmt->bindValue(3, $nome, PDO::PARAM_STR);
//$stmt->bindValue(4, $telefone1, PDO::PARAM_STR);
//$stmt->bindValue(5, $telefone2, PDO::PARAM_STR);
//$stmt->bindValue(6, $rua, PDO::PARAM_STR);
//$stmt->bindValue(7, $numero, PDO::PARAM_INT);
//$stmt->bindValue(8, $bairro, PDO::PARAM_STR);
//$stmt->bindValue(9, $cep, PDO::PARAM_STR);
//$stmt->bindValue(10, $senha, PDO::PARAM_STR);
//$stmt->bindValue(11, $email, PDO::PARAM_STR);
//$stmt->bindValue(12, $cidade, PDO::PARAM_STR);
//$stmt->bindValue(13, $data, PDO::PARAM_LOB);
//$result = $stmt->execute();
 


try{
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $cpf, PDO::PARAM_STR);
    $stmt->bindValue(2, $idade, PDO::PARAM_INT);
    $stmt->bindValue(3, $nome, PDO::PARAM_STR);
    $stmt->bindValue(4, $telefone1, PDO::PARAM_STR);
    $stmt->bindValue(5, $telefone2, PDO::PARAM_STR);
    $stmt->bindValue(6, $rua, PDO::PARAM_STR);
    $stmt->bindValue(7, $numero, PDO::PARAM_INT);
    $stmt->bindValue(8, $bairro, PDO::PARAM_STR);
    $stmt->bindValue(9, $cep, PDO::PARAM_STR);
    $stmt->bindValue(10, $senha_hash, PDO::PARAM_STR);
    $stmt->bindValue(11, $email, PDO::PARAM_STR);
    $stmt->bindValue(12, $cidade, PDO::PARAM_STR);
    $stmt->bindValue(13, $data, PDO::PARAM_LOB);
    $result = $stmt->execute();
}catch(Exception $e){
    $result = false;
    $error = $e->getMessage();
}

if ($result == true) {
    $_SESSION["result"] = true;
    $_SESSION["erro"] = "Usuário Cadastrado com sucesso, logue-se para continuar";

} else {
    $_SESSION["result"] = false;
    $_SESSION["erro"] = $error;

}


redireciona("formLogin.php");


require "footer.php";
