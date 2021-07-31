<?php

namespace controllers;

use models\UsuarioModel as UsuarioModel;

require_once("../models/UsuarioModel.php");

class CrearUsuarioController
{
    public $rut;
    public $clave;
    public $permiso;
  

    


    public function __construct()
    {
        $this->rut = $_POST['rut'];
        $this->clave= $_POST['clave'];
        $this->permiso = $_POST['permiso'];
    }

    public function registrarUsuario()
    {

        
        session_start();
        if ($this->rut == "" || $this->clave == "" || $this->permiso == "" ) {
            $_SESSION['error'] = "Complete la informacion";
            header("Location: ../views/crearUsuario.php");
            return;
        }
        $modelo = new UsuarioModel();
        $data = ['rut_usuario' => $this->rut, 'password_usuario' => $this->clave,'permiso' => $this->permiso  ];
        $count = $modelo->insertarUsuario($data);

        if ($count == 1) {
            $_SESSION['creado'] = "Usuario Creado Con Éxito";
            $this->rut == "" ;
        } else {
            $_SESSION['error'] = "Hubo un error en la base de datos";
        }
        $this->rut == "";
         $this->clave == "";
         $this->permiso == "";

        header("Location: ../views/crearUsuario.php");
    }

}//fin clase

$obj = new CrearUsuarioController();
$obj->registrarUsuario();


