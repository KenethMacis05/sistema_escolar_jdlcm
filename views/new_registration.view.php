<?php 
    include_once "../template/zona_priv.php";
?>

<!DOCTYPE html>
<html lang="es-NI">
<head>
    <!--Meta datos-->
    <?php include_once "../template/metadata.php"?>
    <!--Estilos css-->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.form.css">
    <!--Titulo de la pagina-->
    <title>Nueva Matrícula | Sistema Escolar</title>
    <link rel="icon" href="/src/img/icon.webp" type="png/img">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Luego lo tengo que borrar -->
    <link rel="stylesheet" href="/css/borrar.css">
    <style>
        hr {
            color: white;
            width: 100%;
        }
    </style>
</head>
<body class="bg-secondary">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php include_once "../template/dashboard.php"?>
            <div class="col py-3 header">
                <span class="title">Nueva Matricula</span>
                <?php #include_once "/template/section-info-title/section-info-title.php"?>
            </div>            
        </div>
        <?php include_once "../template/form/form_new_registration.php"?>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <script src="/js/form_controller.js"></script>
    <script src="/js/alert.js"></script>
</html>