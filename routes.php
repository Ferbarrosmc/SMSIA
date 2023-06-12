<?php

// Ruta para la solicitud del token
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apiKey']) && isset($_POST['apiSecret'])) {
    $apiKey = $_POST['apiKey'];
    $apiSecret = $_POST['apiSecret'];

    // Aquí puedes realizar la lógica para generar el token utilizando las variables $apiKey y $apiSecret

    // Suponiendo que ya has generado el token, devolvemos la respuesta en formato JSON
    $response = [
        'token' => 'Token generado'
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Ruta para la ejecución del JSON
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jsonMetadata'])) {
    $jsonMetadata = $_POST['jsonMetadata'];

    // Aquí puedes realizar la lógica para ejecutar el JSON utilizando los datos ingresados

    // Devuelve una respuesta de éxito en formato JSON
    $response = [
        'success' => true
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
