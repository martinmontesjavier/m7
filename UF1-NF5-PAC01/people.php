<?php
// Conectarse a la base de datos
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('No se puede conectar. Verifica los parámetros de conexión.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Verificar si la acción es 'edit' para obtener la información del registro
if ($_GET['action'] == 'edit') {
    // Consultar la información del registro
    $query = 'SELECT
            people_fullname, people_isactor, people_isdirector
        FROM
            people
        WHERE
            people_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result)); // Extraer los resultados a variables individuales
} else {
    // Establecer valores predeterminados en caso de que la acción no sea 'edit'
    $people_fullname = '';
    $people_isactor = 0;
    $people_isdirector = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Persona</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=people"
   method="post">
   <table>
    <tr>
     <td>Nombre Completo</td>
     <td><input type="text" name="people_fullname"
      value="<?php echo $people_fullname; ?>"/></td>
    </tr><tr>
     <td>¿Es Actor?</td>
     <td><select name="people_isactor">
        <option value="1" <?php if ($people_isactor == 1) echo 'selected="selected"'; ?>>Sí</option>
        <option value="0" <?php if ($people_isactor == 0) echo 'selected="selected"'; ?>>No</option>
      </select></td>
    </tr><tr>
     <td>¿Es Director?</td>
     <td><select name="people_isdirector">
        <option value="1" <?php if ($people_isdirector == 1) echo 'selected="selected"'; ?>>Sí</option>
        <option value="0" <?php if ($people_isdirector == 0) echo 'selected="selected"'; ?>>No</option>
      </select></td>
    </tr><tr>
     <td colspan="2" style="text-align: center;">
<?php
// Agregar un campo oculto con el ID en caso de que la acción sea 'edit'
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="people_id" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>