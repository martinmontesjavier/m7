<?php
// Database connection
$db = mysqli_connect('localhost', 'root', 'root') or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Add reviews for three different movies
$query = <<<ENDSQL
INSERT INTO reviews
    (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
VALUES
    (6, "2023-10-11", "Paco", "Mu xula", 5),
    (6, "2023-10-12", "Jose", "Po a mi no me ha gustado", 1),
    (6, "2023-10-13", "Manuel", "Sin mas", 3)
ENDSQL;

mysqli_query($db, $query) or die(mysqli_error($db));

echo 'Se han añadido las reseñas';
?>