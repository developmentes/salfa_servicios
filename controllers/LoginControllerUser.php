<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class LoginControllerUser
{
    public $rut;
    public $clave;


    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave = $_POST['clave'];
    }

    public function iniciarSesion()
    {
        session_start();
        if ($this->rut == "" || $this->clave == "") {
            $_SESSION['error'] = "rut o clave incorrectos";
            header("Location: ../index.php");
            return;
        }
        $modelo = new UsuarioModel();
        $array = $modelo->buscarUsuarioLogin($_POST['rut'],$_POST['clave']);
       
         if(count($array) == 0) {
            $_SESSION['error'] = "usuario no existe intentelo nuevamente";
            header("Location: ../index.php");
            return;
        }

        // $_SESSION['usuario'] = $array[0];


        header("Location: ../views/listarEmpleados.php");
    }
}

$obj = new LoginControllerUser();
$obj->iniciarSesion();
