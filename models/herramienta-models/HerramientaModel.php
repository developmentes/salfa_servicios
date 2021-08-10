<?php

namespace models;

require_once("../../models/Conexion.php");



class HerramientaModel
{

    public function insertarHerramienta($data)
    {
        //[email=>valor, nombre=>valor, clave=>value]
        $stm = Conexion::conector()->prepare("INSERT INTO herramienta (nombre_herramienta,marca_herramienta,modelo_herramienta,stock_herramienta,,descripcion_herramienta
        ) VALUES (:A,:B,:C,:D,:E)");

        $stm->bindParam(':A', $data['nombre_herramienta']);
        $stm->bindParam(':B', $data['marca_herramienta']);
        $stm->bindParam(':C', $data['modelo_herramienta']);
        $stm->bindParam(':D', $data['stock_herramienta']);
        $stm->bindParam(':E', $data['descripcion_herramienta']);


        return $stm->execute();
    }
    public function asignarHerramienta($data)
    {
        $stm = Conexion::conector()->prepare("INSERT INTO activo (id_herramienta,fecha_entrega,id_empleado,descripcion_activo) 
        VALUES(:A,:B,:C,:D)");

        $stm->bindParam(':A', $data['id_herramienta']);
        $stm->bindParam(':B', $data['fecha_entrega']);
        $stm->bindParam(':C', $data['id_empleado']);
        $stm->bindParam(':D', $data['descripcion_activo']);


        return $stm->execute(); //es solo el execute porque no ocupamos los valores que nos devuelve el PDO
    }


    public function actualizarHerramienta($data, $id)
    {



        $stm = Conexion::conector()->prepare("UPDATE  herramienta  SET nombre_herramienta=:A,marca_herramienta=:B,modelo_herramienta=:C,stock_herramienta=:D,descripcion_herramienta=:E WHERE id_herramienta=$id");

        $stm->bindParam(':A', $data['nombre_herramienta']);
        $stm->bindParam(':B', $data['marca_herramienta']);
        $stm->bindParam(':C', $data['modelo_herramienta']);
        $stm->bindParam(':D', $data['stock_herramienta']);
        $stm->bindParam(':E', $data['descripcion_herramienta']);


        return $stm->execute();
    }


    public function eliminarHerramienta($id)
    {
        $stm = Conexion::conector()->prepare("DELETE FROM herramienta WHERE id_herramienta = :A ");

        $stm->bindParam(':A', $id);
        return $stm->execute();
    }



    public function buscarHerramienta($id)
    {

        $stm = Conexion::conector()->prepare("SELECT * FROM herramienta WHERE id_herramienta = :A ");
        $stm->bindParam(":A", $id);




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

    public function getAllHerramientas()
    {

        $stm = Conexion::conector()->prepare("SELECT * FROM herramienta");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
