<?php
// Connect to MySQL
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('No se pudo conectar');

// Make sure you're using the correct database
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Insert data into the 'movie' table
$query = 'INSERT INTO movie
    (movie_name, movie_type, movie_year, movie_leadactor, movie_director)
VALUES
    ("Torrente", 1, 1998, 1, 2),
    ("Pulp Fiction", 2, 1994, 3, 4),
    ("Saw X", 3, 2023, 5, 6)';

mysqli_query($db, $query) or die(mysqli_error($db));

// Insert data into the 'movietype' table
$query = 'INSERT INTO movietype 
    (movietype_label)
VALUES 
    ("Comedia"),
    ("Drama"),
    ("Terror")';

mysqli_query($db, $query) or die(mysqli_error($db));

// Insert data into the 'people' table
$query = 'INSERT INTO people
    (people_fullname, people_isactor, people_isdirector)
VALUES
    ("Santiago Segura", 1, 1),
    ("Samuel L Jackson", 1, 0),
    ("Quentin Tarantino", 0, 1),
    ("Tobin Bell", 1, 0)';

mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Añadido correctamente';
?>