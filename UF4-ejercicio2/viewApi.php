<?php

$html = file_get_contents("https://api.nasa.gov/DONKI/CME?startDate=2017-01-03&endDate=2017-01-03&api_key=bGPs3APa5hufHWYWGIC6GBY8b2JZq1mqNPYVqX3l");

//phpinfo();

$json = json_decode($html);

// Acceder a los datos del JSON
$activityID = $json[0]->activityID;
$startTime = $json[0]->startTime;
$link = $json[0]->link;
$note = $json[0]->note;
$instrument1 = $json[0]->instruments[0]->displayName;

// Crear la tabla en una variable
$table = '<table>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Activity ID</td>
                <td>' . $activityID . '</td>
            </tr>
            <tr>
                <td>Start Time</td>
                <td>' . $startTime . '</td>
            </tr>
            <tr>
                <td>Link</td>
                <td><a href="' . $link . '" target="_blank">' . $link . '</a></td>
            </tr>
            <tr>
                <td>Note</td>
                <td>' . $note . '</td>
            </tr>
            <tr>
                <td>Instrument 1</td>
                <td>' . $instrument1 . '</td>
            </tr>
        </table>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de la API de NASA</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Datos de la API de NASA</h2>

<?php echo $table; ?>

</body>
</html>
