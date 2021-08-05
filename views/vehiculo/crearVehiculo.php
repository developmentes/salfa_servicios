<?php

// require_once("../models/UsuarioModel.php");
// require_once("./models/vehiculo-models/VehiculoModels.php");

// use models\VehiculoModels as VehiculoModels;
// use models\EmpleadoModel as EmpleadoModel;

// session_start();

// $objCargos = new VehiculoModels();

// $vehiculos = $objCargos->getAllVehiculos();

// $emp = new EmpleadoModel();
// $empleados = $emp->getAllEmpleados();

// ?>


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
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>

    <!-- <div id="mesagge"></div> -->



    <p class="red-success">
        <?php

        if (isset($_SESSION['creado'])) {
            echo $_SESSION['creado'];
            //$miarr  =  $_SESSION['creado'];
            //echo var_dump($miarr);
            unset($_SESSION['creado']);
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


        <h1>Crear Vehiculo</h1>

    <form class="form container col-6" action="../../controllers/vehiculo/crearVehiculoController.php" method="POST">

            <div class="row">

                <input class="form-control col-6 mb-3" id="patente" type="text" name="patente" placeholder="Patente vehiculo ">

                <input class="form-control mb-3" id="marca" type="text" name="marca" placeholder="Marca ">

                <input class="form-control mb-3" id="modelo" type="text" name="modelo" placeholder="Modelo ">

                <input class="form-control mb-3" id="stock" type="text" name="stock" placeholder="Stock ">

                <textarea name="descripcion" id="descripcion" cols="20" rows="5">Descripcion</textarea>


                <a id="home" href="../../../salfa-corp/index.php">Home</a>

                <button id="guardar" class="btn btn-primary mb-2">Guardar </button>

            </div>
        </form>
        </div>
        </div>

        <input id="volver" class="btn" type="submit" value="Volver">

    </section>


  
</body>

</html>