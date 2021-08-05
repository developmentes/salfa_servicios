<?php

namespace models;

require_once("../../models/Conexion.php");



class VehiculoModels
{

    public function insertarVehiculo($data)
    {
        //[email=>valor, nombre=>valor, clave=>value]
        $stm = Conexion::conector()->prepare("INSERT INTO vehiculo (patente_vehiculo,marca_vehiculo,modelo_vehiculo,stock_vehiculo,descripcion_vehiculo) 
        VALUES(:A,:B,:C,:D,:E)");

        $stm->bindParam(':A', $data['patente_vehiculo']);
        $stm->bindParam(':B', $data['marca_vehiculo']);
        $stm->bindParam(':C', $data['modelo_vehiculo']);
        $stm->bindParam(':D', $data['stock_vehiculo']);
        $stm->bindParam(':E', $data['descripcion_vehiculo']);


        return $stm->execute();
    }


    public function actualizarVehiculo($data)
    {



        $stm = Conexion::conector()->prepare("UPDATE  vehiculo  SET patente_vehiculo=:A,marca_vehiculo=:B,modelo_vehiculo=:C,stock_vehiculo=:D,descripcion_vehiculo=:E WHERE patente_vehiculo=:A ");

        $stm->bindParam(':A', $data['patente_vehiculo']);
        $stm->bindParam(':B', $data['marca_vehiculo']);
        $stm->bindParam(':C', $data['modelo_vehiculo']);
        $stm->bindParam(':D', $data['stock_vehiculo']);
        $stm->bindParam(':E', $data['descripcion_vehiculo']);


        return $stm->execute();
    }


    public function eliminarVehiculo($patente)
    {
        $stm = Conexion::conector()->prepare("DELETE FROM vehiculo WHERE patente_vehiculo = :A ");

        $stm->bindParam(':A', $id);
        return $stm->execute();
    }



    public function buscarVehiculo($id)
    {

        $stm = Conexion::conector()->prepare("SELECT * FROM vehiculo WHERE id_vehiculo = :A ");
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

    public function getAllVehiculos(){

        $stm = Conexion::conector()->prepare("SELECT * FROM vehiculo");
        $stm ->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);


    }
}
