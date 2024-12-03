<?php
session_start();
require_once '../MYSQL/Mysql.php';

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'weight_process';
$mysql = new Mysql($host, $db, $user, $password);

$fechas = [];
$pesos = [];

foreach ($mysql->datos() as $dato) {
    $fechas[] = $dato['date_weighted'];
    $pesos[] = $dato['weight'];
}

// Generar datos para la gráfica
$data = [
    "labels" => $fechas,
    "datasets" => [
        [
            "label" => "Peso",
            "data" => $pesos,
            "borderColor" => "rgba(75, 192, 192, 1)",
            "backgroundColor" => "rgba(75, 192, 192, 0.2)",
            "borderWidth" => 2,
        ]
    ]
];

// Configurar encabezados de respuesta
header('Content-Type: application/json');
echo json_encode($data);
