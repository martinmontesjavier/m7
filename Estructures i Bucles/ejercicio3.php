<html>
<head>
<title> Ejercicio 3</title>
</head>
<body>
<div style="text-align: center">
<?php



date_default_timezone_set("America/New_York");

$dia = date("z");


if($dia>80 and $dia<171){
    echo "Good primavera!";
}

if($dia>172 and $dia<262){
    echo "Good verano!";
}

if($dia>263 and $dia<354){
    echo "Good Otoño!";
}

if(($dia>355 and $dia<365) || ($dia>=0 and $dia<80)){
    echo "Good Invierno!";
}

/*
if ((date("m") >= '03') and
    (date("d") >= '21') and 
    (date("m") < '06') and
    (date('d') <'21')) {
    echo "Good Primavera !";
}

if ((date("m") >= '06') and
    (date("d") >= '21') and 
    (date("m") < '09') and 
    (date("d") < '23')) {
    echo "Good summer!";
}

if ((date("m") >= '09') and
    (date("d") >= '23') and
    (date("m") < '12') and
    (date('d') < '22')) {
    echo "Good Otoño!";
}


if ((date("m") >= '12') and
    (date("d") >= '22') and 
    (date("m") < '03') and
    (date('d') < '21')) {
    echo "Good winter!";
}
*/


include "ejercicio2.php";
?>
<br/>
</div>
</body>
</html>