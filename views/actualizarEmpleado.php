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
    <script src="../../js/main.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <nav class="menu">
        <label class="logo"><img src="img/pngegg.png" alt=""></label>
        <ul class="menu-items">
            <li class="active"><a href="">Inicio</a></li>
            <li><a href="">Asignaciones</a></li>
            <li><a href="">Activos</a></li>
            <li><a href="">informes</a></li>
            <li><a href="">Vehiculos</a></li>
            <li><a href="">Tecnologias</a></li>
            <li><a href="">Herramientas</a></li>
        </ul>
        <span class="btn-menu">
            <i class="fa fa-bars"></i>
        </span>
    </nav>

    <!-- <div id="mesagge"></div> -->



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