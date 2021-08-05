<?php

require_once("../../models/vehiculo-models/VehiculoModels.php");

use models\VehiculoModels as VehiculoModels;

session_start();
$vehiculoid = $_GET['id'];
$objVehiculo = new VehiculoModels();

$vehiculos = $objVehiculo->buscarVehiculo($vehiculoid)[0];


$fecha = new DateTime();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->
</head>

<body style="background-image: url(../../asset/img/job-people.jpg);">
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
                        <a class="nav-link" href="../views/AsignarActivo.php">Activo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./listarEmpleados.php">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Informes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Asignar</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Herramienta</a>
                            <a class="dropdown-item" href="#">Tecnologia</a>
                            <a class="dropdown-item" href="#">Vehiculos</a>
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
    <div class="container  pt-3">






        <?php
        if (isset($_SESSION['creado'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>AVehiculo asignado exitosamente</strong> success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            unset($_SESSION['creado']);
        } ?>


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


        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong></strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            unset($_SESSION['error']);
        } ?>



    </div>
    <section style="background-color: slategrey; opacity: 0.9;height: 80vh;margin-top: 50px;">

        <div class="col-md-12  p-3">

            <div class="row">
                <form class="container col-6" action="../../controllers/vehiculo/AsignarVehiculoController.php" method="POST">

                    <h1>Asignar Vehiculo</h1>

                    <div class="form-group">
                        <label for="patente">Patente vehiculo</label>
                        <input class="form-control col-6 mb-3 " disabled id="patente" type="text" name="patente" value="<?= $vehiculos['patente_vehiculo'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="Marca">Marca</label>
                        <input class="form-control mb-3" disabled id="marca" type="text" name="marca" value="<?= $vehiculos['marca_vehiculo'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="Modelo">Modelo</label>
                        <input class="form-control mb-3" disabled id="modelo" type="text" name="modelo" value=<?= $vehiculos['modelo_vehiculo'] ?>>
                    </div>
                    <div class="form-group">
                        <label for="fecha_asignacion">Fecha asignacion</label>
                        <input class="form-control mb-3" id="fecha_asignacion" type="text" name="fecha" value="<?php echo date('d-m-y') ?>">
                    </div>
                    <div class="form-group">
                        <label for="rut">Rut Empleado</label>
                        <input class="form-control mb-3" autofocus id="rut" type="text" name="rut" placeholder="Rut empleado">

                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripcion y/u observacion </label>
                        <textarea class=" form-control mb-3" name="descripcion" id="descripcion" cols="20" rows="4"></textarea>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" name="idVehiculo" value="<?= $vehiculos['id_vehiculo'] ?>">Asignar</button>
                    </div>

                </form>
            </div>
        </div>



    </section>



</body>

</html>