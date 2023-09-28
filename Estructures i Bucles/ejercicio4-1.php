<html>
<head>
<title> Ejercicio 3</title>
</head>
<body>

<form method="post" action="ejercicio4-2.php">
   <p>Escribe lo que quieras: 
    <textarea name="texto" id="textoID" cols="30" rows="10"></textarea>
   </p>
   <p>Escoge el color: 
    <input type="color" id="color" name="color"/>
   </p>
   <p>Escoge fuente:
    <select id="tamano" name="select">
        <option value="tnr">TNR</option>
        <option value="comic-sans" selected>Comic-sans</option>
        <option value="arial">Arial</option>
    </select>
   </p>
   <p>Escoge tamaño:
    <input type="number" id="numero" name="numero" value="Submit"/>
   </p>
   <p>Quieres guardar la información?
    <input type="checkbox" name="validar" value="valida"/>
   </p>
   <p>
    <input type="submit" name="submit" value="Submit"/>
   </p>
  </form>

  <div>
    ANTERIOR TEXTO:
    <?php
    if (isset($_COOKIE['texto_guardado'])) {
      $textoGuardado = $_COOKIE['texto_guardado'];
      echo "El texto guardado en la cookie es: " . $textoGuardado;
    }
    ?>
  </div>

<div style="text-align: center">
<?php
include "ejercicio2.php";
?>
<br/>
</div>
</body>
</html>