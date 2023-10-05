<?php
// Connect to MySQL
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('No se puede conectar');

// Make sure you're using the correct database
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Define the SQL query to add a foreign key constraint
$query = 'ALTER TABLE movie
    ADD CONSTRAINT fk_leadactor
    FOREIGN KEY (movie_leadactor)
    REFERENCES people(people_id)';

// Execute the query
mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Se ha añadido correctamente!';
?>