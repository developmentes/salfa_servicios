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


    public function actualizarEmpleado($data)
    {



        $stm = Conexion::conector()->prepare("UPDATE  empleado  SET rut_empleado=:A,nombre_empleado=:B,apellido_empleado=:C,email_empleado=:D,telefono_empleado=:E,cargo_empleado=:F WHERE rut_empleado=:A ");

        $stm->bindParam(':A', $data['rut_empleado']);
        $stm->bindParam(':B', $data['nombre_empleado']);
        $stm->bindParam(':C', $data['apellido_empleado']);
        $stm->bindParam(':D', $data['email_empleado']);
        $stm->bindParam(':E', $data['telefono_empleado']);
        $stm->bindParam(':F', $data['cargo_empleado']);


        return $stm->execute();
    }


    public function eliminarEmpleado($id)
    {
        $stm = Conexion::conector()->prepare("DELETE FROM empleado WHERE id_empleado = :A ");

        $stm->bindParam(':A', $id);
        return $stm->execute();
    }



    public function buscarEmpleado($id)
    {

        $stm = Conexion::conector()->prepare("SELECT * FROM empleado WHERE id_empleado = :A ");
        $stm->bindParam(":A", $id);




        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function buscarEmpleadoRut($rut)
    {

        $stm = Conexion::conector()->prepare("SELECT * FROM empleado WHERE rut_empleado = :A ");
        $stm->bindParam(":A", $rut);




        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }



    public function buscarAsignacionRut()
    {

        $stm = Conexion::conector()->prepare("SELECT u.nombre_usuario ,u.rut_usuario FROM usuario u inner join activo a where u.rut_usuario= '1-1'; 
        -- INNER JOIN tecnologia t 
        -- ON u.id_usuario=t.id_tecnologia
        -- where u.nombre_usuario='felipe' and t.nombre_tecnologia='TELEFONO';
        
        ");


        $stm->execute();

        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllEmpleados(){

        $stm = Conexion::conector()->prepare("SELECT * FROM empleado");
        $stm ->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);


    }
}
