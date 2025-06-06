<?php

require_once "conexion.php";


class ModeloClientes {

    /*=============================================
    Mostrar todos los registros
    =============================================*/
    static public function index($tabla) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    Crear un registro
    =============================================*/
    static public function create($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(contraseña, correo, nombre, telefono) 
                                               VALUES (:contraseña, :correo, :nombre, :telefono)");

        $stmt->bindParam(":contraseña", $datos["contraseña"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());
        }

        $stmt->close();
        $stmt = null;
    }
}



?>