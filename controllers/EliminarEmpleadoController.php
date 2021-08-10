<?php

namespace controllers;

use models\EmpleadoModel as EmpleadoModel;

require_once("../models/EmpleadoModel.php");



class EliminarEmpleadoController
{
    public $id;
   

    


    public function __construct()
    {
        $this->id = $_GET['id'];
     
       
    }

    public function deleteEmploye()
    {

        $modelo = new EmpleadoModel();
        session_start();
     
        $count = $modelo->eliminarEmpleado($this->id);

        if ($count == 1) {

            $_SESSION['eliminado'] = "Empleado eliminado exitosamente";
            $_SESSION['actualizado'] =$_GET;


        } else {

            $_SESSION['error'] = "Hubo un error en la base de datos";
        }

        header("Location: ../views/listarEmpleados.php");
    }
}

$obj = new EliminarEmpleadoController();
$obj->deleteEmploye();


