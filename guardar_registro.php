<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["tipoDocumento"]) && isset($_POST["numeroDocumento"]) && isset($_POST["fechaNacimiento"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["tipoDocumento"]) && !empty($_POST["numeroDocumento"]) && !empty($_POST["fechaNacimiento"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $tipoDocumento = $_POST["tipoDocumento"];
        $numeroDocumento = $_POST["numeroDocumento"];
        $fechaNacimiento = $_POST["fechaNacimiento"];

        $usuario = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "tipoDocumento" => $tipoDocumento,
            "numeroDocumento" => $numeroDocumento,
            "fechaNacimiento" => $fechaNacimiento
        ];

        $registros = [];
        if (file_exists("registros.json")) {
            $registrosJSON = file_get_contents("registros.json");
            $registros = json_decode($registrosJSON, true);
        }

        $registros[] = $usuario;

        $registrosJSON = json_encode($registros);

        file_put_contents("registros.json", $registrosJSON);

        header("Location: index.html");
        exit();
    } else {
        echo "Por favor, complete todos los campos obligatorios.";
    }
}
?>
