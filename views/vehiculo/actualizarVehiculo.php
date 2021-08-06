<?php


require_once("../../models/vehiculo-models/VehiculoModels.php");

use models\VehiculoModels as VehiculoModels;

session_start();

$objVehiculo = new VehiculoModels();

$veh = $_GET['id'];

$vehiculo = $objVehiculo->buscarVehiculo($veh)[0];
$allVehiculos = $objVehiculo->getAllVehiculos();


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar-Empleado</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="../../js/main.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Salfa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/AsignarActivo.php">Asignar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./listarEmpleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Informes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <p class="red-success">
        <?php

        if (isset($_SESSION['actualizado'])) {
            echo $_SESSION['actualizado'];
            //$miarr  =  $_SESSION['actualizado'];
            //echo var_dump($miarr);
            unset($_SESSION['actualizado']);
        }
        ?>
    </p>

    <p class="red-success">
        <?php

        if (isset($_SESSION['impresion'])) {
            //echo $_SESSION['impresion'];
            $miarr  =  $_SESSION['impresion'];
            echo var_dump($miarr);
            unset($_SESSION['impresion']);
        }
        ?>
    </p>
    <p class="error">
        <?php

        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            // $miarr  =  $_SESSION['error'];
            // echo var_dump($miarr);
            unset($_SESSION['error']);
        }
        ?>
    </p>

    <section class="form">


        <h1>Actualizar Empleado</h1>

        <form action="../../controllers/vehiculo/ActualizarVehiculoController.php" method="POST">
            <div class="row">
                <input id="patente" autofocus type="text" name="patente" value="<?= $vehiculo['patente_vehiculo'] ?>">

                <select name="marca" class="form-select " aria-label="Default select example">
                    <option selected>Seleccione marca</option>
                    <?php foreach ($allVehiculos as $car) { ?>

                        <option value="<?= $car["marca_vehiculo"] ?>"><?= $car["marca_vehiculo"] ?></option>

                    <?php } ?>
                </select>
                <select name="modelo" class="form-select " aria-label="Default select example">
                    <option selected>Seleccione modelo</option>
                    <?php foreach ($allVehiculos as $car) { ?>

                        <option value="<?= $car["modelo_vehiculo"] ?>"><?= $car["modelo_vehiculo"] ?></option>

                    <?php } ?>
                </select>

                <input id="stock" type="text" name="stock" value="<?= $vehiculo['stock_vehiculo'] ?>">

                <input id="descripcion" type="text" name="descripcion" value="<?= $vehiculo['descripcion_vehiculo'] ?>">






                <button id="actualizar" class="btn">Actualizar </button>

            </div>
        </form>



    </section>
    <?php
    if (isset($_SESSION['limpiezaInput'])) {

        echo  $_SESSION['limpiezaInput'];
        unset($_SESSION['limpiezaInput']);
    }

    ?>
</body>

</html>