<?php
$valor1 = $_POST['1'];
$valor2 = $_POST['2']; 
$valor3 = $_POST['3']; 
$valor4 = $_POST['4']; 
$valor5 = $_POST['5']; 
echo "Las selecciones son: ";
echo <<<ENDHTML
    <form action="N4P113formprocess.php" method="post">
        <select id="valoracion" name="valoracion" required>
            <option value="$valor1">$valor1</option>
            <option value="$valor2">$valor2</option>
            <option value="$valor3">$valor3</option>
            <option value="$valor4">$valor4</option>
            <option value="$valor5">$valor5</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
ENDHTML;
?>