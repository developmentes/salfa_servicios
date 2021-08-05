<?php

namespace controllers;

use models\EmpleadoModel as EmpleadoModel;

require_once("../models/EmpleadoModel.php");



class ActualizarEmpleadoController
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
        $this->nombre = $_POST['nombre'];
        $this->apellido = $_POST['apellido'];
        $this->email = $_POST['email'];
        $this->telefono = $_POST['telefono'];
        $this->cargo = $_POST['cargo'];
       
    }

    public function updateEmploye()
    {

        $modelo = new EmpleadoModel();
        session_start();
     
        
        $data =['rut_empleado' => $_POST['rut'],
                'nombre_empleado' => $_POST['nombre'],
                'apellido_empleado' => $_POST['apellido'] ,
                'email_empleado' => $_POST['email'],
                'telefono_empleado' => $_POST['telefono'],
                'cargo_empleado' => $_POST['cargo'] ];



        $count = $modelo->actualizarEmpleado($data);

        if ($count == 1) {

            $_SESSION['actualizado'] = "Empleado actualizado exitosamente";
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

$obj = new ActualizarEmpleadoController();
$obj->updateEmploye();


