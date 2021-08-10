<?php

namespace controllers;

use models\EmpleadoModel as EmpleadoModel;

require_once("../models/EmpleadoModel.php");

class CrearEmpleadoController
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

    public function registrarUsuario()
    {

        $modelo = new EmpleadoModel();
        session_start();
        if (is_string($this->cargo)) {
            $_SESSION['errorCargo'] = "Debe seleccionar el cargo";
            header("Location: ../views/crearEmpleado.php");
        } else if ($this->rut == "" || $this->nombre == "" || $this->apellido == "" || $this->email == "" || $this->telefono == "") {
            $_SESSION['error'] = "Complete la informacion";
            header("Location: ../views/crearEmpleado.php");
            return;
        }

        $data = [
            'rut_empleado' => $_POST['rut'],
            'nombre_empleado' => $_POST['nombre'],
            'apellido_empleado' => $_POST['apellido'],
            'email_empleado' => $_POST['email'],
            'telefono_empleado' => $_POST['telefono'],
            'cargo_empleado' => $_POST['cargo']
        ];



        $count = $modelo->insertarEmpleado($data);

        if ($count == 1) {

            $_SESSION['creado'] = " Creado con exito";
            header("Location: ../views/listarEmpleados.php");

        } else {
            $_SESSION['errorDb'] = "Hubo un error en la base de datos";
            header("Location: ../views/crearEmpleado.php");
        }
    }
}

$obj = new CrearEmpleadoController();
$obj->registrarUsuario();
