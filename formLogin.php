<?php
session_start();

require("logica-aut.php");
require "cabecalho.php";




if (!autenticado()) {
?>
    <form action="login.php" method="POST">
        <br> <br> <br> <br> <br> <br>
        <div class="row justify-content-md-center mt-2">
            <div class="col-4">
                <h1 class="h3 mb-3 fw-normal">Por favor identifique-se</h1>

                <div class="form-floating mb-2">
                    <input type="email" class="form-control" name="email" id="floatingInput">
                    <label for="floatingInput">Endereço Email</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" name="senha" id="floatingPassword">
                    <label for="floatingPassword">Senha</label>
                </div>

            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-3">
                    <button class="w-20 btn btn-lg btnPrincipal mb-4 text-white" type="submit">Entrar</button>
                    <a class="w-20 btn btn-lg btn-secondary mb-4 text-white ms-1" href="index.php">Cancelar</a>
                </div>
            </div>

        </div>
    </form>
    <?php
    if (isset($_SESSION["result"])) {
        $erro = $_SESSION["erro"];
        $danger = $_SESSION["danger"];
        unset($_SESSION["result"]);
    ?>
        <div class="row justify-content-md-center mt-3">
            <div class="col-5">
                <div class="alert alert-<?=$danger?> mt-3" role="alert">

                    <h4>Alerta!</h4>
                    <p><?= $erro ?></p>

                </div>
            </div>
        </div>
    <?php
    unset($_SESSION["erro"]);
    unset($_SESSION["danger"]);
    }
} else {
    ?>
    <div class="row justify-content-md-center mt-3">
        <div class="col-7">
            <div class="alert alert-danger mt-3" role="alert">

                <h4>Área restrista!</h4>
                <p>O usuário já está logado!</p>

            </div>
        </div>
    </div>

<?php
}
?>
<style>
    main {
        min-height: 87.4vh;
    }
</style>
<?php
require "footer.php";
?>