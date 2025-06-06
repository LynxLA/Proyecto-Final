<?php 

class ControladorEmpleados {

    public function create($datos) {

        // Validar nombre
        if (isset($datos["nombre"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["nombre"])) {
            $json = array(
                "status" => 404,
                "detalle" => "error en el campo del nombre, permitido solo letras en el nombre"
            );
            echo json_encode($json, true);
            return;
        }

        // Validar correo
        if (isset($datos["correo"]) && !preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $datos["correo"])) {
            $json = array(
                "status" => 404,
                "detalle" => "error en el campo correo"
            );
            echo json_encode($json, true);
            return;
        }

        // Validar correo repetido
        $empleados = ModeloEmpleados::index("empleados");

        foreach ($empleados as $key => $value) {
            if ($value["correo"] == $datos["correo"]) {
                $json = array(
                    "status" => 404,
                    "detalle" => "el email está repetido"
                );
                echo json_encode($json, true);
                return;
            }
        }

        // Generar credenciales del empleado
        $id_empleado = str_replace("$", "c", crypt($datos["nombre"].$datos["correo"], '$2a$07$afartwetsdAD52356FEDGsfhsd$'));
        $llave_secreta = str_replace("$", "a", crypt($datos["correo"].$datos["nombre"], '$2a$07$afartwetsdAD52356FEDGsfhsd$'));

        // Generar password hash
        if (!isset($datos["password"]) || empty($datos["password"])) {
            $json = array(
                "status" => 404,
                "detalle" => "el campo password es obligatorio"
            );
            echo json_encode($json, true);
            return;
        }

        $password_hash = password_hash($datos["password"], PASSWORD_BCRYPT);

        // Crear array con los datos
        $datos = array(
            "nombre" => $datos["nombre"],
            "correo" => $datos["correo"],
            "id_empleado" => $id_empleado,
            "llave_secreta" => $llave_secreta,
            "password_hash" => $password_hash,
            "created_at" => date('Y-m-d h:i:s'),
            "updated_at" => date('Y-m-d h:i:s')
        );

        $create = ModeloEmpleados::create("empleados", $datos);

        if ($create == "ok") {
            $json = array(
                "status" => 200,
                "detalle" => "se generaron sus credenciales",
                "id_empleado" => $id_empleado,
                "llave_secreta" => $llave_secreta
            );
            echo json_encode($json, true);
            return;
        }
    }
}

?>
