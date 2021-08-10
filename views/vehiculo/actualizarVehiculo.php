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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="../../js/main.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body style="background-image: url(../../asset/img/job-people.jpg);">    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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

    <section style="background-color: slategrey; opacity: 0.9;height: 80vh;margin-top: 50px;">

        <div class="col-md-12  p-3">

            <div class="row">

                <form  class="container col-6" action="../../controllers/vehiculo/ActualizarVehiculoController.php" method="POST">

                    <h1>Actualizar Vehiculo</h1>

                    <div class="form-group">
                    <label for="patente">Patente </label>
                        <input class="form-control mb-3" id="patente" autofocus type="text" name="patente" value="<?= $vehiculo['patente_vehiculo'] ?>">

                        </div>

                        <div class="form-group">
                            <label for="patente">Marca </label>
                            <input class="form-control mb-3 id="patente" autofocus type="text" name="marca" value="<?= $vehiculo['marca_vehiculo'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="patente">Modelo</label>
                            <input class="form-control mb-3 id="patente" autofocus type="text" name="modelo" value="<?= $vehiculo['modelo_vehiculo'] ?>">
                        </div>


                        <div class="form-group">
                            <label for="patente">Stock</label>
                            <input class="form-control mb-3 id="stock" type="text" name="stock" value="<?= $vehiculo['stock_vehiculo'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="patente">Descripcion</label>
                            <input class="form-control mb-3 id="descripcion" type="text" name="descripcion" value="<?= $vehiculo['descripcion_vehiculo'] ?>">
                        </div>




                        <div class="form-group">
                            <button class="btn btn-info" id="actualizar" name="idVehiculo"  value="<?= $vehiculo['id_vehiculo'] ?>" class="btn">Actualizar </button>
                        </div>

                </form>

            </div>
        </div>
    </section>
    <?php
    if (isset($_SESSION['limpiezaInput'])) {

        echo  $_SESSION['limpiezaInput'];
        unset($_SESSION['limpiezaInput']);
    }

    ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>