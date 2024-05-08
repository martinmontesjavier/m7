<?php

require_once('TwitterAPIExchange.php');

// Clase TwitterData
class TwitterData {
    private $authorName;
    private $authorUrl;
    private $tweetHtml;
    private $photoUrl;

    public function __construct($authorName, $authorUrl, $tweetHtml, $photoUrl) {
        $this->authorName = $authorName;
        $this->authorUrl = $authorUrl;
        $this->tweetHtml = $tweetHtml;
        $this->photoUrl = $photoUrl;
    }

    public function saveToDatabase() {
        // Establecer conexión con la base de datos
        $pdo = new PDO('pgsql:host=localhost;dbname=twitter', 'postgres', 'root');

        // Preparar la consulta SQL
        $stmt = $pdo->prepare("INSERT INTO twitter_data (author_name, author_url, tweet_html, photo_url) VALUES (:authorName, :authorUrl, :tweetHtml, :photoUrl)");

        // Ejecutar la consulta con los datos del objeto
        $stmt->execute([
            ':authorName' => $this->authorName,
            ':authorUrl' => $this->authorUrl,
            ':tweetHtml' => $this->tweetHtml,
            ':photoUrl' => $this->photoUrl
        ]);
    }
}

// Configuración de la API de Twitter
$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

// Realizar la solicitud a la API de Twitter
$url = 'https://publish.twitter.com/oembed';
$getfield = '?url=https://twitter.com/Interior/status/507185938620219395';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

// Procesar la respuesta JSON
$data = json_decode($response, true);

// Filtrar los datos relevantes
$authorName = $data['author_name']; // Nombre del autor
$authorUrl = $data['author_url']; // URL del autor
$tweetHtml = $data['html']; // HTML del tweet
$photoUrl = 'https://pbs.twimg.com/media/Bwni7DgCQAABVQh?format=jpg&name=small'; // URL de la foto (por ahora dejaremos una URL de ejemplo)

// Crear un objeto TwitterData y guardarlo en la base de datos
$twitterData = new TwitterData($authorName, $authorUrl, $tweetHtml, $photoUrl);
$twitterData->saveToDatabase();


// Mostrar los datos que se van a insertar en la base de datos
echo "Datos a insertar en la base de datos:\n";
echo "Nombre del autor: $authorName\n";
echo "URL del autor: $authorUrl\n";
echo "HTML del tweet: $tweetHtml\n";
echo "URL de la foto: $photoUrl\n";