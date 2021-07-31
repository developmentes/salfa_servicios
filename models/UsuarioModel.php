<?php

namespace models;

require_once("Conexion.php");



class UsuarioModel
{

    public function insertarUsuario($data)
    {
        //[email=>valor, nombre=>valor, clave=>value]
        $stm = Conexion::conector()->prepare("INSERT INTO usuario (rut_usuario,password_usuario,permiso) VALUES(:A,:B,:C)");

        $stm->bindParam(':A', $data['rut_usuario']);
        $stm->bindParam(':B', $data['password_usuario']);
        $stm->bindParam(':C', $data['permiso']);
        
        
        return $stm->execute();
    }


    public function buscarUsuarioLogin($rut,$clave)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM usuario WHERE rut_usuario=:A AND password_usuario=:B");
        $stm->bindParam(":A", $rut);
        $stm->bindParam(":B", $clave);

     
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
       
    }
  
    public function getAllUsuarios(){

        $stm = Conexion::conector()->prepare("SELECT * FROM usuario");
        $stm ->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);


    }
    
    public function getAllCargos(){

        $stm = Conexion::conector()->prepare("SELECT * FROM cargo_empleado");
        $stm ->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);


    }
    public function buscarAsignacionRut(){

        $stm = Conexion::conector()->prepare("SELECT u.nombre_usuario ,u.rut_usuario FROM  usuario u   inner join activo a   where u.rut_usuario= '1-1'; 
        -- INNER JOIN tecnologia t 
        -- ON u.id_usuario=t.id_tecnologia
        -- where u.nombre_usuario='felipe' and t.nombre_tecnologia='TELEFONO';
        
        ");
        $stm ->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
      

    }
    
}