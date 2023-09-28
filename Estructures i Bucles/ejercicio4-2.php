<html>
<head>
<title> Ejercicio 3</title>
</head>
<body>
<h1 style="text-align: center">Tu texto ha quedado asi</h1>

<?php
$texto = $_POST['texto']; // Cambiado de $_POST['textoID']
$color = $_POST['color'];
$fuente = $_POST['select'];
$tamano = $_POST['numero'];
$validar = $_POST['validar'];

if ($validar == true){
    setcookie('texto_guardado', '<div style="color:' . $color . '; font-size:' . $tamano . '; font-family:' . $fuente . ';">' . $texto . '</div>', time() + 10);
    echo "Has decidido guardarlo en coockies";
    
}else{
    echo "No has decidido guardarlo en coockies";
}
echo '<div style="color:' . $color . '; font-size:' . $tamano . '; font-family:' . $fuente . ';">' . $texto . '</div>';

?>

<div style="text-align: center">
<?php
include "ejercicio2.php";
?>
<br/>
</div>
</body>
</html>