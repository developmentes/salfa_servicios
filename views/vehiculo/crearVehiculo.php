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

// 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <link rel="stylesheet" href="../../css/style.css">

    <style>
        .bg-img {
            background-color: #4A00E0;
            /* opacity: 0.7; */
        }

        body {
            background-image: url(../../asset/img/job-people.jpg);
        }

        .degradado {
            background-color: #000;
            opacity: 0.9;
            padding: 10px;
        }
    </style>

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
    </div>

    <div class="degradado">

        <div class="container">
           
                <section class="card bg-img " style="width: 80%;height:80vh; margin:0 auto;">




                        <div class="row mt-3" >
                            <form class="form container col-6" action="../../controllers/vehiculo/crearVehiculoController.php" method="POST">
                            <div>
                                <h1>Crear Vehiculo</h1>
                                </div>
                                <div>
                                    <input class="form-control col-12-lg mb-3" id="patente" type="text" name="patente" placeholder="Patente vehiculo ">
                                </div>
                                <div>
                                    <input class="form-control col-12 mb-3" id="marca" type="text" name="marca" placeholder="Marca ">
                                </div>
                                <div>
                                    <input class="form-control col-12 mb-3" id="modelo" type="text" name="modelo" placeholder="Modelo ">
                                </div>
                                <div>
                                    <input class="form-control col-12 mb-3" id="stock" type="text" name="stock" placeholder="Stock ">
                                </div>
                                <div>
                                    <textarea class="col-12 mb-3" name="descripcion" id="descripcion" cols="50" rows="5">Descripcion</textarea>
                                </div>

                                <div style="background-color: white;">
                                    <button id="guardar" class="btn btn-success mb-2 btn-block ">Guardar</button>
                                </div>



                            </form>

                        </div>



                </section>
            </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $().alert('close')
    </script>
</body>

</html>