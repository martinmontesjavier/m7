<?php

// require_once('TwitterAPIExchange.php'); 

// $settings = array( 
// 'oauth_access_token' => "1753893874957791232-UDosjo98UQRSCLs5otRsJCPPwVrV2Y", 
// 'oauth_access_token_secret' => "Ye0Y1KUpUv6h69ivVl30gbhPh5LO292UBzST7s9wjH5z7", 
// 'consumer_key' => "86wGVcqnXZAMRgU38xwr714al", 
// 'consumer_secret' => "WLN0jclzxwIAdXLevKlfcM7x5TcpeTzqQ8gYhDeLrV6Q0QOynG" );

// // $url = 'https://publish.twitter.com/oembed';
// // $requestMethod = 'POST';

// // $postfields = array(
// //     'screen_name' => 'usernameToBlock', 
// //     'skip_status' => '1'
// // );

// // $twitter = new TwitterAPIExchange($settings);
// // echo $twitter->buildOauth($url, $requestMethod)
// //              ->setPostfields($postfields)
// //              ->performRequest();

// echo '<br><br>';
// $url = 'https://publish.twitter.com/oembed';
// $getfield = '?url=https://twitter.com/Interior/status/507185938620219395';
// $requestMethod = 'GET';
// $twitter = new TwitterAPIExchange($settings);
// echo $twitter->setGetfield($getfield)
//              ->buildOauth($url, $requestMethod)
//              ->performRequest();


ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => "",
    'consumer_secret' => ""
);

echo '<br><br>';
$url = 'https://publish.twitter.com/oembed';
$getfield = '?url=https://twitter.com/Interior/status/507185938620219395';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

