<?php
session_start();

//Check username and password information
if ($_SESSION['authuser'] != 1){
    echo "No puedes estal aqui brothel";

    exit();     
}
?>
<html>
 <head>
  <title>Mi pelicula favorita y su director <?php echo $_GET['favmovie'];?></title>
 </head>
 <body>
<?php
$nombre_usuario = $_GET['username'] ?? 'nadie';
echo "Mi nombre es, ";
echo $_SESSION["username"];
echo "! <br/>";
echo "tengo, ";
echo $_SESSION["edad"];
echo "años y ojos  <br/>";
echo $_SESSION["ojos"];

echo $_COOKIE["pelota"];
echo $_COOKIE["bebida"];

echo "Mi pelicula favorita es ";
echo $_GET['favmovie'];
echo "<br/>";

date_default_timezone_set("America/New_York");
$currentDate = date('Y-m-d H:i:s');
echo "La fecha de ahora es";
echo $currentDate;


//echo "Del director ";
//echo $_GET['persona'];

?>
 </body>
</html>
