<?php
session_start();
require("logica-aut.php");
require "cabecalho.php";

?>

<script>
    function verifica_senha() {
        var senha = document.getElementById("senha");
        var confsenha = document.getElementById("conf-senha");

        if (confsenha.value && senha.value) {
            if (senha.value != confsenha.value) {
                senha.classList.add("is-invalid");
                confsenha.classList.add("is-invalid");
                confsenha.value = null;
            } else {
                senha.classList.remove("is-invalid");
                confsenha.classList.remove("is-invalid");
            }
        }
    }
</script>



<?php
if (!autenticado()) {
?>
    <h3 class="text-center mt-3"> Cadastro de Candidato</h3>
    <form action="inserirCandidato.php" method="POST" class="me-4 ms-4 mt-2" enctype="multipart/form-data">

        <div class="row justify-content-md-center mt-2">
            <div class="col-10">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone 1:</label>
                    <input type="text" class="form-control" data-mask="(00) 00000-0000" id="tel1" name="telefone1" maxlength="15" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone 2:</label>
                    <input type="text" class="form-control" data-mask="(00) 00000-0000" id="tel2" maxlength="15" name="telefone2" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" data-mask="000.000.000-00" required maxlength="14">
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="idade" class="form-label">Idade:</label>
                    <input type="number" class="form-control" id="idade" name="idade" required>
                </div>
            </div>

            <div class="col-10">
                <div class="mb-3">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" required>
                </div>
            </div>
            <div class="col-10">
                <div class="mb-3">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" class="form-control" id="rua" name="rua" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="number" class="form-control" id="numero" name="numero" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" class="form-control" id="cep" name="cep" data-mask="00000-000" required maxlength="9">
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
            </div>
            <div class="col-md-5">
                <div class="mb-3 ms-6">
                    <label for="formFile" class="form-label">Currículo:</label>
                    <input class="form-control" type="file" id="curriculo" name="curriculo" required accept="application/pdf">
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center mt-2">
            <div class="col-md-5">
                <div class="mb-3 ms-6">
                    <label for="conf-senha" class="form-label">Confirmar Senha</label>
                    <input type="password" class="form-control" id="conf-senha" name="conf-senha" onblur="verifica_senha()" required>
                </div>
            </div>
        </div>


        <div class="row justify-content-md-center mt-2">
            <button class="w-25 btn btn-lg  btnPrincipal mb-4 text-white" type="submit">Registrar</button>
            <a class="w-25 btn btn-lg btn-secondary mb-4 text-white ms-1" href="index.php">Cancelar</a>
        </div>
    </form>
<?php

} else {
?>
    <div class="row justify-content-md-center mt-3">
        <div class="col-7">
            <div class="alert alert-danger mt-3" role="alert">

                <h4>Área restrista!</h4>
                <p>O usuário já está cadastrado e autenticado!!</p>

            </div>
        </div>
    </div>

    <style>
        main {
            min-height: 87.4vh;
        }
    </style>


<?php
}


?>



<?php
require "footer.php";
?>