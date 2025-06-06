<?php

require_once "conexion.php";


class ModeloEmpleados {

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

        // Encriptar la contraseña antes de guardarla
        $passwordHash = password_hash($datos["contraseña"], PASSWORD_DEFAULT);

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(contraseña, correo, nombre, telefono) 
                                               VALUES (:contraseña, :correo, :nombre, :telefono)");

        $stmt->bindParam(":contraseña", $passwordHash, PDO::PARAM_STR);
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

    /*=============================================
    Verificar login del empleado
    =============================================*/
    static public function login($tabla, $correoIngresado, $contrasenaIngresada) {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :correo");

        $stmt->bindParam(":correo", $correoIngresado, PDO::PARAM_STR);
        $stmt->execute();

        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->close();
        $stmt = null;

        // Verificamos si existe el empleado y si la contraseña es válida
        if ($empleado && password_verify($contrasenaIngresada, $empleado["contraseña"])) {
            return $empleado; // Login exitoso, devolvemos los datos
        } else {
            return null; // Login fallido
        }
    }
}




?>