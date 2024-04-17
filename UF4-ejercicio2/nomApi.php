<?php

// Datos obtenidos de la API
$html = file_get_contents("https://api.nasa.gov/DONKI/CME?startDate=2017-01-03&endDate=2017-01-03&api_key=bGPs3APa5hufHWYWGIC6GBY8b2JZq1mqNPYVqX3l");
$json = json_decode($html);

// Acceder a los datos del JSON
$activityID = $json[0]->activityID;
$startTime = $json[0]->startTime;
$link = $json[0]->link;
$note = $json[0]->note;
$instrument1 = $json[0]->instruments[0]->displayName;

// Mostrar los datos
// echo "Activity ID: " . $activityID . "<br>";
// echo "Start Time: " . $startTime . "<br>";
// echo "Link: " . $link . "<br>";
// echo "Note: " . $note . "<br>";
// echo "Instrument 1: " . $instrument1 . "<br>";

// Conexión a la base de datos
$host = 'localhost';
$dbname = 'usuaris';
$username = 'postgres';
$password = 'root';

try {
    // Conexión a la base de datos usando PDO
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

    // Preparar la consulta SQL para insertar los datos
    $stmt = $conn->prepare("INSERT INTO nasa (activity_id, start_time, link, note, instrument) VALUES (:activityID, :startTime, :link, :note, :instrument1)");

    // Bind de los parámetros
    $stmt->bindParam(':activityID', $activityID);
    $stmt->bindParam(':startTime', $startTime);
    $stmt->bindParam(':link', $link);
    $stmt->bindParam(':note', $note);
    $stmt->bindParam(':instrument1', $instrument1);

    // Ejecutar la consulta
    $stmt->execute();

    echo "Datos insertados correctamente.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;

?>
