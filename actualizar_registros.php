<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevosRegistrosJSON = file_get_contents('php://input');

    $nuevosRegistros = json_decode($nuevosRegistrosJSON, true);

    if ($nuevosRegistros === null) {
        http_response_code(400);
        echo "Error en el formato de datos JSON.";
    } else {
        file_put_contents("registros.json", json_encode($nuevosRegistros));

        http_response_code(200);
        echo "Registros actualizados correctamente.";
    }
} else {
    http_response_code(405);
    echo "Método no permitido.";
}
?>
