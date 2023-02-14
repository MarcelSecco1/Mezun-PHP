<?php
    session_start();
    require("logica-aut.php");
    $titulo_pagina = "Candidato requeriu a uma Vaga";
    require "conexao.php";


    $email = email_usuario();
    $idsql = "select idCandidato from Candidato where email = ?";
    $stmt = $conn->prepare($idsql);
    $stmt->execute([$email]);
    $id = $stmt->fetch();

    $status = "Requerido!";
    $idVaga = filter_input(INPUT_GET, "idVaga",FILTER_SANITIZE_SPECIAL_CHARS);
    $observacoes = "teste";

    
    $sql = "insert into Vaga_Candidato (idCandidato, idVaga, status, observacoes) 
    values (?, ?, ?, ?)" ;

    try{
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$id['idcandidato'],$idVaga,$status,$observacoes]);
        $result = true;

    }catch(Exception $e){
        $result = false;
        $error = $e->getMessage();
   
    }

    
    
    if ($result == true) {
        $_SESSION["result"] = true;
        $_SESSION["msg"] = "Você requeriu à uma vaga, aguarde seu status ser atualizado.";
        ?>
        <?php
        redireciona("controleEmpresa.php");

        ?>
       
        
         <?php
    
    } else {
        $_SESSION["result"] = false;
        $_SESSION["erro"] = $error;
        redireciona("controleEmpresa.php");
    }
    
   
    
?>