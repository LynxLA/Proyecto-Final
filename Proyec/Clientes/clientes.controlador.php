<?php 

class ControladorClientes{

    public function create($datos){

        // Validar nombre
        if(isset($datos["nombre"]) && !preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $datos["nombre"])){

            $json = array(
                "status" => 404,
                "detalle" => "error en el campo del nombre, permitido solo letras en el nombre"
            );

            echo json_encode($json, true);
            return;
        }

        // Validar correo
        if(isset($datos["correo"]) && !preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $datos["correo"])){

            $json = array(
                "status" => 404,
                "detalle" => "error en el campo correo"
            );

            echo json_encode($json, true);
            return;
        }

        // Validar el correo repetido
        $clientes = ModeloClientes::index("clientes");

        foreach ($clientes as $key => $value) {
            if($value["correo"] == $datos["correo"]){
                $json = array(
                    "status" => 404,
                    "detalle" => "el email está repetido"
                ); 

                echo json_encode($json, true);
                return;
            }
        }

        // Generar credenciales del cliente
        $id_cliente = str_replace("$", "c", crypt($datos["nombre"].$datos["correo"], '$2a$07$afartwetsdAD52356FEDGsfhsd$'));
        $llave_secreta = str_replace("$", "a", crypt($datos["correo"].$datos["nombre"], '$2a$07$afartwetsdAD52356FEDGsfhsd$'));

        $datos = array(
            "nombre" => $datos["nombre"],
            "correo" => $datos["correo"],
            "id_cliente" => $id_cliente,
            "llave_secreta" => $llave_secreta,
            "created_at" => date('Y-m-d h:i:s'),
            "updated_at" => date('Y-m-d h:i:s')
        );

        $create = ModeloClientes::create("clientes", $datos);

        if($create == "ok"){
            $json = array(
                "status" => 200,
                "detalle" => "se generaron sus credenciales",
                "id_cliente" => $id_cliente,
                "llave_secreta" => $llave_secreta
            );

            echo json_encode($json, true);
            return;
        }
    }
}

?>
