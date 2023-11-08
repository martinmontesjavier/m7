<?php
$valor1 = $_POST['1'];
$valor2 = $_POST['2']; 

if(isset($_POST['suma'])){
    $resultado = $valor1 + $valor2;
    echo "Las selecciones son: ";
    echo <<<ENDHTML
        <label>$valor1 + $valor2 = $resultado</label>
    ENDHTML;
}
if(isset($_POST['resta'])){
    $resultado = $valor1 - $valor2;
    echo "Las selecciones son: ";
    echo <<<ENDHTML
        <label>$valor1 - $valor2 = $resultado</label>
    ENDHTML;
}
if(isset($_POST['multi'])){
    $resultado = $valor1 * $valor2;
    echo "Las selecciones son: ";
    echo <<<ENDHTML
        <label>$valor1 * $valor2 = $resultado</label>
    ENDHTML;
}
if(isset($_POST['dividir'])){
    $resultado = $valor1 / $valor2;
    echo "Las selecciones son: ";
    echo <<<ENDHTML
        <label>$valor1 / $valor2 = $resultado</label>
    ENDHTML;
}

?>