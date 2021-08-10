<?php


require_once("../models/UsuarioModel.php");
require_once("../models/EmpleadoModel.php");

use models\UsuarioModel as UsuarioModel;
use models\EmpleadoModel as EmpleadoModel;

session_start();

$objCargos = new UsuarioModel();
$cargos = $objCargos->getAllCargos();

$emp = new EmpleadoModel();
$editEmpleado = $_GET['id'];
$emp= $emp->buscarEmpleado($editEmpleado);

$empleados = $emp[0]; 

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

        <form action="../controllers/ActualizarEmpleadoController.php" method="POST">
            <div class="row">
                <input id="rut" autofocus type="text"  name="rut" value="<?=$empleados['rut_empleado']?>" placeholder="Rut empleado  ">

                <input id="nombre"   type="text" name="nombre" value="<?=$empleados['nombre_empleado']?>" placeholder="Nombre ">

                <input id="apellido" type="text" name="apellido" value="<?=$empleados['apellido_empleado']?>" placeholder="Apellido ">

                <input id="email" type="text" name="email" value="<?=$empleados['email_empleado']?>" placeholder="Email ">

                <input id="telefono" type="text" name="telefono" value="<?=$empleados['telefono_empleado']?>" placeholder="Telefono ">
                <input id="cargo" type="text" name="cargo" value="<?=$empleados['cargo_empleado']?>" placeholder="Cargo ">




                <!-- <select name="cargo" class="form-select " aria-label="Default select example">
                    <option selected>Seleccione Cargo</option>
                    <?php foreach ($cargos as $car) { ?>

                        <option value="<?= $car["codigo_cargo_empleado"] ?>"><?= $car["tipo_cargo_empleado"] ?></option>

                    <?php } ?>
                </select> -->

                <a id="home" href="../index.php">Home</a>

                <button id="actualizar" class="btn">Actualizar </button>

            </div>
        </form>
       

        <input id="volver" class="btn" type="submit" value="Volver">

    </section>
<?php
if(isset($_SESSION['limpiezaInput'])){
  
   echo  $_SESSION['limpiezaInput'];
   unset($_SESSION['limpiezaInput']);
  
}

?>
</body>

</html>