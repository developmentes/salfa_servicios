<?php

namespace controllers;
namespace models;

use models\VehiculoModels;
use models\EmpleadoModels;

require_once("../../models/vehiculo-models/VehiculoModels.php");
require_once("../../models/EmpleadoModel.php");

class AsignarVehiculoController
{
    public $id_vehiculo;
    public $fecha;
    public $rut;
    public $descripcion;
    
  

    


    public function __construct()
    {
        $this->id_vehiculo = $_POST['idVehiculo'];
        $this->fecha = $_POST['fecha'];
        $this->rut = $_POST['rut'];
        $this->descripcion = $_POST['descripcion'];
       
    }

    public function asignarActivoVehiculo()
    {

        $modelo = new VehiculoModels();
        session_start();
        if ($this->id_vehiculo == "" || $this->fecha == "" || $this->rut == "" || $this->descripcion == "" ) {
            $_SESSION['error'] = $_POST;
            $_SESSION['impresion'] = $this->rut;
            header("Location: ../../views/asignaciones/listarAsignaciones.php");
            return;
        }

        $empleado = new EmpleadoModel();
        $rutEmpleado = $empleado->buscarEmpleadoRut($this->rut)[0];

        $_SESSION['empleado']= $rutEmpleado;

        
        
        $data =[
                
                
                'id_vehiculo' => $_POST['idVehiculo'],
                'fecha_entrega' => $_POST['fecha'],
                'id_empleado' => $rutEmpleado['id_empleado'],
                'descripcion_activo' => $_POST['descripcion']
    ];



        $count = $modelo->asignarVehiculo($data);

        if ($count == 1) {

            $_SESSION['creado'] = "Vehiculo Asignado Con Éxito";
            $_SESSION['error'] = $_POST;
            //***********  ZONA DE PRUEBAS METODOS EMPLEADO ***//

            //$modelo->actualizarEmpleado(5);
          

        //***************************************************** */

           
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }

        header("Location: ../../views/asignaciones/listarAsignaciones.php");
    }
}

$obj = new AsignarVehiculoController();
$obj->asignarActivoVehiculo();


