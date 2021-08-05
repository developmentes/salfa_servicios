<?php

namespace controllers;

use models\EmpleadoModel as EmpleadoModel;

require_once("../models/EmpleadoModel.php");



class EliminarEmpleadoController
{
    public $rut;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $cargo;
    
  

    


    public function __construct()
    {
        $this->rut = $_POST['rut'];
     
       
    }

    public function deleteEmploye()
    {

        $modelo = new EmpleadoModel();
        session_start();
     
        $count = $modelo->eliminarEmpleado($this->rut);

        if ($count == 1) {

            $_SESSION['eliminado'] = "Empleado eliminado exitosamente";
            $_SESSION['limpiezaInput'] =' <script src="../asset/js/actualizar.js"></script>';
            if(isset($empleado)){unset($empleado);}

            if(isset($editEmpleado)){unset($editEmpleado);}
            
            
                
           


        } else {
            $_SESSION['impresion'] = $this->telefono;
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }

        header("Location: ../views/listarEmpleados.php");
    }
}

$obj = new EliminarEmpleadoController();
$obj->deleteEmploye();


