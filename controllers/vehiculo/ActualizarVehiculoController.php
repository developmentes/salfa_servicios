<?php

namespace controllers;

use models\VehiculoModels as VehiculoModels;

require_once("../../models/vehiculo-models/VehiculoModels.php");



class ActualizarVehiculoController
{
    public $patente;
    public $marca;
    public $modelo;
    public $stock;
    public $descripcion;
    
  

    


    public function __construct()
    {
        $this->patente = $_POST['patente'];
        $this->marca = $_POST['marca'];
        $this->modelo = $_POST['modelo'];
        $this->stock = $_POST['stock'];
        $this->descripcion = $_POST['descripcion'];
       
    }

    public function updateCars()
    {

        $modelo = new VehiculoModels();
        session_start();
     
        
        $data =['rut_empleado' => $_POST['rut'],
                'nombre_empleado' => $_POST['nombre'],
                'apellido_empleado' => $_POST['apellido'] ,
                'email_empleado' => $_POST['email'],
                'telefono_empleado' => $_POST['telefono'],
                'cargo_empleado' => $_POST['cargo'] ];



        $count = $modelo->actualizarVehiculo($data);

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


