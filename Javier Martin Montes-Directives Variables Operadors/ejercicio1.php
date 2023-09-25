<?php
session_start();
$_SESSION['username'] = "Javi";
$_SESSION['authuser'] = 1;
$_SESSION['edad'] = "19";
$_SESSION['ojos'] = "marrones";
setcookie("pelota","futbol",time()+120);
setcookie("bebida","fanta",time()+120);
?>
<html>
 <head>
  <title>Pelicula favorita</title>
 </head>
 <body>
<?php
$myfavmovie = urlencode("Abre jaime");
// $director = urlencode("David elMamado Teruel")
// echo "<a href='ejercicio1.2.php?favmovie=$myfavmovie&persona=$director'>";
echo "<a href='ejercicio1.2.php?favmovie=$myfavmovie'>";
echo "Click here to see information about my favorite movie!"; 
echo "</a>";
?>
 </body>
</html>
