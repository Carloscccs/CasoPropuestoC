<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script>
        const site_url = "<?=site_url()?>";
        const base_url = "<?=base_url()?>";
    </script>
    <style>
        body {
            padding-top: 5rem;
        }

        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }

        .truncatetext {
            width: 100px white-space: nowrap overflow: hidden text-overflow: ellipsis
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="#">Navbar 2</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cerrar sesion</a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="row">
            <div class="col-6">
                <h6>Bienvenido: <?=$User->Nombre?></h6>
                <h6>Curso: <?=$User->Nivel?></h6>
            </div>
        </div>
        <div class="row my-2" id="row-txt_btn">
            <div class="col-4">
                <h4>Mis bitacoras</h4>
            </div>
            <div class="col-5"></div>
            <div class="col-3"><button class="btn btn-sm btn-success btn-block">Agregar bitacora</button></div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning text-center d-none" role="alert" id="no_practica">
                    No hay ninguna practica activa
                </div>
                <table class="table table-responsive" id="tablaBitacora">
                    <thead>
                        <th>Id</th>
                        <th>Texto</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                    </thead>
                    <tbody id="tbodyBitacora"></tbody>
                </table>
            </div>
        </div>

    </main><!-- /.container -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="<?=base_url()?>/lib/js/va.js"></script>
</body>

</html>