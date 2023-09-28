<?php
session_start();

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    $_SESSION['contador']++; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contador</title>
</head>
<body>
    <h1>Contador de visitas</h1>
    <p>Se ha visitado <?php echo $_SESSION['contador']; ?> veces</p>
</body>
</html>