<?php

namespace models;

require_once("Conexion.php");



class EmpleadoModel
{

    public function insertarEmpleado($data)
    {
        //[email=>valor, nombre=>valor, clave=>value]
        $stm = Conexion::conector()->prepare("INSERT INTO empleado (rut_empleado,nombre_empleado,apellido_empleado,email_empleado,telefono_empleado,cargo_empleado) VALUES(:A,:B,:C,:D,:E,:F)");

        $stm->bindParam(':A', $data['rut_empleado']);
        $stm->bindParam(':B', $data['nombre_empleado']);
        $stm->bindParam(':C', $data['apellido_empleado']);
        $stm->bindParam(':D', $data['email_empleado']);
        $stm->bindParam(':E', $data['telefono_empleado']);
        $stm->bindParam(':F', $data['cargo_empleado']);
        
        
        return $stm->execute();
    }



    public function actualizarEmpleado($id,$rut)
    {
        //[email=>valor, nombre=>valor, clave=>value]
        $stm = Conexion::conector()->prepare("UPDATE empleado SET rut_empleado=:B WHERE id_empleado = :A ");

        $stm->bindParam(':A',$id);
        $stm->bindParam(':B',$rut);

        return $stm->execute();
    }
   

    public function EliminarEmpleado($rut)
    {
        $stm = Conexion::conector()->prepare("DELETE FROM empleado WHERE rut_empleado = :A ");

        $stm->bindParam(':A',$rut);
        return $stm->execute();
    }



    public function buscarEmpleado($id)
    {
      
        $stm = Conexion::conector()->prepare("SELECT * FROM empleado WHERE id_empleado = :A ");
        $stm->bindParam(":A",$id);

       
        
        
        return $stm->execute();
    }


  
    public function buscarAsignacionRut(){

        $stm = Conexion::conector()->prepare("SELECT u.nombre_usuario ,u.rut_usuario FROM usuario u inner join activo a where u.rut_usuario= '1-1'; 
        -- INNER JOIN tecnologia t 
        -- ON u.id_usuario=t.id_tecnologia
        -- where u.nombre_usuario='felipe' and t.nombre_tecnologia='TELEFONO';
        
        ");


        $stm ->execute();

        return $stm->fetchAll(\PDO::FETCH_ASSOC);
      

    }
    
}