<?php

namespace controllers;

use models\VehiculoModels;

require_once("../../models/vehiculo-models/VehiculoModels.php");

class CrearEmpleadoController
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
        $this->telefono = $_POST['telefono'];
        $this->descripcion = $_POST['descripcion'];
       
    }

    public function registrarVehiculo()
    {

        $modelo = new VehiculoModels();
        session_start();
        if ($this->patente == "" || $this->marca == "" || $this->modelo == "" || $this->stock == "" || $this->descripcion == "" ) {
            $_SESSION['error'] = "Complete la informacion";
            $_SESSION['impresion'] = $this->rut;
            header("Location: ../../views/vehiculo/crearVehiculo.php");
            return;
        }
        
        $data =['patente_vehiculo' => $_POST['patente'],
                'marca_vehiculo' => $_POST['marca'],
                'modelo_vehiculo' => $_POST['modelo'] ,
                'stock_vehiculo' => $_POST['stock'],
                'descripcion_vehiculo' => $_POST['descripcion']
    ];



        $count = $modelo->insertarVehiculo($data);

        if ($count == 1) {

            $_SESSION['creado'] = "Vehiculo Creado Con Éxito";

            //***********  ZONA DE PRUEBAS METODOS EMPLEADO ***//

            //$modelo->actualizarEmpleado(5);
          

        //***************************************************** */

            $this->patente == "";$this->marca == "";$this->modelo == ""; $this->stock == ""; $this->descripcion == "";
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }

        header("Location: ../../views/vehiculo/listarvehiculos.php");
    }
}

$obj = new CrearEmpleadoController();
$obj->registrarVehiculo();


