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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->
</head>

<body style="background-image: url(../asset/img/job-people.jpg);">


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
            <a class="dropdown-item" href="./herramienta/listarHerramienta.php">Herramienta</a>
            <a class="dropdown-item" href="#">Tecnologia</a>
            <a class="dropdown-item" href="./vehiculo/listarVehiculos.php">Vehiculos</a>
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



    <section style="background-color: slategrey; opacity: 0.9;height: 80vh;margin-top: 50px;" >



        
    <p class="red-success">
     
     <?php if (isset($_SESSION['creado'])) {
     echo $_SESSION['creado'];
     unset ($_SESSION['creado']);
     
     }?>
     
     </p>   
         
     
     
        
         <p class="red-success">
             <?php
     
             if (isset($_SESSION['actualizado'])) {
                 echo $_SESSION['actualizado'];
                 //$miarr  =  $_SESSION['creado'];
                 echo var_dump($_SESSION['actualizado']);
                 unset($_SESSION['actualizado']);
             }
             ?>
         </p>
         <p class="red-success">
             <?php
     
             if (isset($_SESSION['eliminado'])) {
                 echo $_SESSION['eliminado'];
                 //$miarr  =  $_SESSION['creado'];
                 //echo var_dump($miarr);
                 unset($_SESSION['eliminado']);
             }
             ?>
         </p>
         <p class="red-success">
             <?php
     
             if (isset($_SESSION['errorDb'])) {
                 echo $_SESSION['errorDb'];
                 //$miarr  =  $_SESSION['creado'];
                 //echo var_dump($miarr);
                 unset($_SESSION['errorDb']);
             }
             ?>
         </p>
     

    
       
    <div class="col-md-8 container p-3">
        <div class="bg-primary p-2 text-dark ">
        <h1>PERSONAL SALFA</h1>
         <a href="./crearEmpleado.php" class="btn btn-info btn-outline-success col-4 mb-3">Crear</a>
         </div>
        <table class="table">

            <thead class="table-success table-striped">
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                   
                </tr>
            </thead>

            <tbody style="background-color: snow;">
                <?php
                foreach ($empleados as $e) {
                ?>
                    <tr>
                        <th><?= $e['rut_empleado'] ?></th>
                        <th><?= $e['nombre_empleado'] ?></th>
                        <th><?= $e['apellido_empleado'] ?></th>
                        <th><?= $e['email_empleado'] ?></th>
                        <th><a href="./actualizarEmpleado.php?id=<?= $e['id_empleado'] ?>" class="btn btn-info">Editar</a></th>
                        <th><a href="../controllers/EliminarEmpleadoController.php?id=<?= $e['id_empleado'] ?>" class="btn btn-danger">Eliminar</a></th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>