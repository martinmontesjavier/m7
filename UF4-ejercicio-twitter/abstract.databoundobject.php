<?php

require_once('TwitterAPIExchange.php');
//require_once('connection.php'); // Asegúrate de tener la conexión a la base de datos aquí

// Clase TwitterData
class TwitterData extends DataBoundObject {
    private $authorName;
    private $authorUrl;
    private $tweetHtml;
    private $photoUrl;

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
    }

    protected function DefineTableName() {
        return "twitter_data"; // Nombre de la tabla en la base de datos
    }

    protected function DefineRelationMap() {
        return array(
            "id" => "ID",
            "author_name" => "authorName",
            "author_url" => "authorUrl",
            "tweet_html" => "tweetHtml",
            "photo_url" => "photoUrl"
        );
    }

    // Métodos set para establecer los valores de las propiedades
    public function setAuthorName($authorName) {
        $this->authorName = $authorName;
    }

    public function setAuthorUrl($authorUrl) {
        $this->authorUrl = $authorUrl;
    }

    public function setTweetHtml($tweetHtml) {
        $this->tweetHtml = $tweetHtml;
    }

    public function setPhotoUrl($photoUrl) {
        $this->photoUrl = $photoUrl;
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

// Filtrar los datos relevantes y establecerlos utilizando los métodos set
$twitterData = new TwitterData($pdo);
$twitterData->setAuthorName($data['author_name']);
$twitterData->setAuthorUrl($data['author_url']);
$twitterData->setTweetHtml($data['html']);
$twitterData->setPhotoUrl('https://pbs.twimg.com/media/Bwni7DgCQAABVQh?format=jpg&name=small'); // URL de la foto (por ahora dejaremos una URL de ejemplo)

// Guardar los datos en la base de datos
$twitterData->Save();

// Mostrar los datos que se han insertado en la base de datos
echo "Datos insertados en la base de datos:<br>";
echo "Nombre del autor: " . $twitterData->getAuthorName() . "<br>";
echo "URL del autor: " . $twitterData->getAuthorUrl() . "<br>";
echo "HTML del tweet: " . $twitterData->getTweetHtml() . "<br>";
echo "URL de la foto: " . $twitterData->getPhotoUrl() . "<br>";

?>