<?php

require_once("../models/UsuarioModel.php");
require_once("../models/EmpleadoModel.php");

use models\UsuarioModel as UsuarioModel;
use models\EmpleadoModel as EmpleadoModel;

session_start();

$objCargos = new UsuarioModel();

$cargos = $objCargos->getAllCargos();

$emp = new EmpleadoModel();
$empleados = $emp->getAllEmpleados();

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
    <link href="../asset/css/crearEmpleado.css" rel="stylesheet">


</head>

<body class="bg-body">

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




    <p class="error">
        <?php

        if (isset($_SESSION['errorCargo'])) {
            echo $_SESSION['errorCargo'];
            // $miarr  =  $_SESSION['error'];
            // echo var_dump($miarr);
            unset($_SESSION['errorCargo']);
        }
        ?>
    </p>




    <p class="error">
        <?php

        if (isset($_SESSION['errorDb'])) {
            echo $_SESSION['errorDb'];
            // $miarr  =  $_SESSION['error'];
            // echo var_dump($miarr);
            unset($_SESSION['errorDb']);
        }
        ?>
    </p>




   



        <form class="form container " action="../controllers/CrearEmpleadoController.php" method="POST">



        <div class="row mb-4">


        <h1>Crear empleado</h1>
            <!-- <label for="patente">Patente vehiculo</label> -->
            <div class="form-group col-md-6 ">
                <input class="form-control  mb-3" id="rut" type="text" name="rut" placeholder="Rut empleado ">
            </div>
            <div class="form-group col-md-6">
                <!-- <label for="patente">Patente vehiculo</label> -->
                <input class="form-control mb-3" id="nombre" type="text" name="nombre" placeholder="Nombre ">
            </div>
            <div class="form-group col-md-6 ">
                <!-- <label for="patente">Patente vehiculo</label> -->
                <input class="form-control mb-3" id="apellido" type="text" name="apellido" placeholder="Apellido ">
            </div>
            <div class="form-group col-md-6 ">
                <!-- <label for="patente">Patente vehiculo</label> -->
                <input class="form-control mb-3" id="email" type="text" name="email" placeholder="Email ">
            </div>
            <div class="form-group col-md-6 ">
                <!-- <label for="patente">Patente vehiculo</label> -->
                <input class="form-control mb-3" id="telefono" type="text" name="telefono" placeholder="Telefono ">
            </div>



            <div class="form-group col-md-3">
                <select name="cargo" class="form-select " aria-label="Default select example">
                    <option >Seleccione Cargo</option>
                    <?php foreach ($cargos as $car) { ?>

                        <option value="<?= $car["codigo_cargo_empleado"] ?>"><?= $car["tipo_cargo_empleado"] ?></option>
                    <?php } ?>
                </select>

            </div>
            <div class="col-md-6">

            <button class="btn btn-outline-primary col-md-6">Crear</button>
            </div>


          
            </div>
                    <img class="logo" src="../asset/img/pngegg.png" alt="">

        </form>

        
         
        

    





</body>

</html>