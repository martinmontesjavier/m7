<?php
// Connect to MySQL
$db = mysqli_connect('localhost', 'root', 'root') or die('Unable to connect. Check your connection parameters.');

// Make sure you're using the correct database
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Define the SQL query to fetch movie information along with director and lead actor names
$query = 'SELECT 
    movie.movie_name AS movie_name,
    director.people_fullname AS director_name,
    lead_actor.people_fullname AS lead_actor_name
FROM 
    movie
LEFT JOIN 
    people AS director ON movie.movie_director = director.people_id
LEFT JOIN 
    people AS lead_actor ON movie.movie_leadactor = lead_actor.people_id';

// Execute the query
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// Print the results
echo '<table border="1">';
echo '<tr><th>Movie</th><th>Director</th><th>Lead Actor</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['movie_name'] . '</td>';
    echo '<td>' . $row['director_name'] . '</td>';
    echo '<td>' . $row['lead_actor_name'] . '</td>';
    echo '</tr>';
}
echo '</table>';

// Close the database connection
mysqli_close($db);
?>