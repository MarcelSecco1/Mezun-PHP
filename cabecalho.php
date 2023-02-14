<!DOCTYPE html>
<html lang="pt-br">



</script>
<?php
function ativa($pagina)
{
    if (basename($_SERVER["PHP_SELF"]) == $pagina) {
        return " active";
    } else {
        return null;
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mezun</title>
    <!-- Favicon-->
    <link rel="icon" type="png" href="assets\img\mortarboard.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="dist/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .font-1 {
            color: #000 !important;
            font-weight: bolder;
        }

        .btnPrincipal {
            background-color: #336258;
        }

        .btnPrincipal:hover {
            background-color: #264642;
        }

        .btnEnviar {
            background-color: #e7e8ea;
            color: black;
        }

        .btnEnviar:hover {
            background-color: #ADC8BC;
            color: black;
        }

        .nav-link:active {
            color: #336258;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="dist/dashboard.css" rel="stylesheet">


</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#page-top">
            <img src="assets\img\mortarboard.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top">
            Mezun - Currículos
        </a>


        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start pe-3 d-none d-sm-block">
            <div class="text-end">

                <?php
                if (autenticado()) {
                ?>
                    <span class="navbar-text fs-5 pt-5 me-3">
                        <a href="areaCandidato.php" class="btn  me-2">
                            <span data-feather="user"></span>
                            <?= nome_usuario() ?>
                        </a>
                    </span>
                    <a href="sair.php" class="btn btn-danger me-2">
                        <span data-feather="log-out"></span>
                        Sair
                    </a>
                <?php
                } else {
                ?>

                    <a href="formLogin.php" class="btn btn-light me-2">
                        <span data-feather="log-in"></span>
                        Entrar
                    </a>
                    <a href="formRegister.php" class="btn btnPrincipal me-2 text-white">
                        <span data-feather="user-plus"></span>
                        Cadastrar
                    </a>
                <?php
                }
                ?>

            </div>
        </div>

    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky mt-3">
                    <ul class="nav flex-column">

                        <?php
                        if (!autenticado()) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ativa('index.php'); ?>" aria-current="page" href="index.php">
                                    <span data-feather="home"></span>
                                    Início
                                </a>
                            </li>


                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link <?= ativa('index.php'); ?>" aria-current="page" href="index.php">
                                    <span data-feather="home"></span>
                                    Início
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ativa('controleEmpresa.php'); ?>" aria-current="page" href="controleEmpresa.php">
                                    <span data-feather="list"></span>
                                    Lista de Vagas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ativa('areaCandidato.php'); ?>" aria-current="page" href="areaCandidato.php">
                                    <span data-feather="user"></span>
                                    Minha Área
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">