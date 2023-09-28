<html>
<head>
<title> Bienvenido!</title>
</head>
<body>
<div style="text-align: center">
<p> Bienvenido al ejercicio 1<br/>
<?php
date_default_timezone_set("America/New_York");
echo "Hoy es ";
echo date("d-m");
echo ", ";
echo date("Y");
echo "<br>";
echo "Ayer fue ";
echo date("d")-2;
echo date ("-m");
echo "<br>";
echo "En un mes sera ";
echo date ("m")+1;
echo "<br>";
echo "Quedan  ";
$hoy=date("d");
$mes=date("t");
$resultado=$mes-$hoy;
echo $resultado;
echo " dias en este mes";
echo "<br>";
echo "Quedan  ";
echo 12-date("n");
echo " meses en este año";



include "ejercicio2.php";
?>
<br/>
</div>
</body>
</html>
