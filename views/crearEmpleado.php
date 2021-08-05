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


        <h1>Crear empleado</h1>

    <form action="../controllers/CrearEmpleadoController.php" method="POST">

            <div class="row">

                <input id="rut" type="text" name="rut" placeholder="Rut empleado ">

                <input id="nombre" type="text" name="nombre" placeholder="Nombre ">

                <input id="apellido" type="text" name="apellido" placeholder="Apellido ">

                <input id="email" type="text" name="email" placeholder="Email ">

                <input id="telefono" type="text" name="telefono" placeholder="Telefono ">




                <select name="cargo" class="form-select " aria-label="Default select example">
                    <option selected>Seleccione Cargo</option>
                    <?php foreach ($cargos as $car) { ?>

                        <option value="<?= $car["codigo_cargo_empleado"] ?>"><?= $car["tipo_cargo_empleado"] ?></option>
                    <?php } ?>
                </select>





                <a id="home" href="../../index.html">Home</a>

                <button id="guardar" class="btn">Guardar </button>

            </div>
        </form>
        </div>
        </div>

        <input id="volver" class="btn" type="submit" value="Volver">

    </section>


  
</body>

</html>