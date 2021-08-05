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
        if ($this->rut == "" || $this->nombre == "" || $this->apellido == "" || $this->email == "" || $this->telefono == "" || $this->cargo == "" ) {
            $_SESSION['error'] = "Complete la informacion";
            $_SESSION['impresion'] = $this->rut;
            header("Location: ../views/crearEmpleado.php");
            return;
        }
        
        $data =['rut_empleado' => $_POST['rut'],
                'nombre_empleado' => $_POST['nombre'],
                'apellido_empleado' => $_POST['apellido'] ,
                'email_empleado' => $_POST['email'],
                'telefono_empleado' => $_POST['telefono'],
                'cargo_empleado' => $_POST['cargo'] ];



        $count = $modelo->insertarEmpleado($data);

        if ($count == 1) {

            $_SESSION['creado'] = "Usuario Creado Con Éxito";

            //***********  ZONA DE PRUEBAS METODOS EMPLEADO ***//

            //$modelo->actualizarEmpleado(5);
          

        //***************************************************** */

            $this->rut == "";$this->nombre == "";$this->apellido == ""; $this->email == ""; $this->telefono == "";$this->cargo == "";$this->password == "";
        } else {
            $_SESSION['impresion'] = $this->telefono;
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }

        header("Location: ../views/listarEmpleados.php");
    }
}

$obj = new CrearEmpleadoController();
$obj->registrarUsuario();


