<?php

namespace controllers;

use models\VehiculoModels as VehiculoModels;

require_once("../../models/vehiculo-models/VehiculoModels.php");



class ActualizarVehiculoController
{
    public $id;
    public $patente;
    public $marca;
    public $modelo;
    public $stock;
    public $descripcion;






    public function __construct()
    {

        $this->id = $_POST['idVehiculo'];
        $this->patente = $_POST['patente'];
        $this->marca = $_POST['marca'];
        $this->modelo = $_POST['modelo'];
        $this->stock = $_POST['stock'];
        $this->descripcion = $_POST['descripcion'];
    }

    public function updateCars()
    {


        if($this->patente = "" || $this->marca = "" || $this->modelo = "" || $this->stock ="" || $this->descripcion = ""  ){

            $_SESSION['error'] = 'Complete los campos vacios';

            header("Location: ../../views/vehiculo/actualizarVehiculo.php");
        }


        $modelo = new VehiculoModels();
        session_start();


        $data = [
            'patente_vehiculo' => $_POST['patente'],
            'marca_vehiculo' => $_POST['marca'],
            'modelo_vehiculo' => $_POST['modelo'],
            'stock_vehiculo' => $_POST['stock'],
            'descripcion_vehiculo' => $_POST['descripcion']
        ];



        $count = $modelo->actualizarVehiculo($data,$this->id);

        if ($count == 1) {

            $_SESSION['actualizado'] = "Vehiculo actualizado exitosamente";
        } else {
            $_SESSION['impresion'] = $this->telefono;
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }

        header("Location: ../../views/vehiculo/listarVehiculos.php");
    }
}

$obj = new ActualizarVehiculoController();
$obj->updateCars();
