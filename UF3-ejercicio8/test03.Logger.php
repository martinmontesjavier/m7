<?php

//$connectionString = "file:c:\\Users\Admin\Desktop\jordi\test\prova.log";
// $connectionString = "file:parse\prova.log";

// $connectionString = "postgres:dbname=usuaris;host=localhost;port=5432;user=postgres;password=postgres";

// $urlData = parse_url($connectionString);

// var_dump($urlData);

// if (!isset($urlData['scheme'])) {
//   throw new Exception("Invalid scheme connection.\n");
// }

// $fileName = 'Logger/class.' . $urlData['scheme'] . 'LoggerBackend.php';

// include_once($fileName);

// $className = $urlData['scheme'] . 'LoggerBackend';

// print "Class Name: " . $className . "\n";

// if (!class_exists($className)) {
//   throw new Exception("No loggind bakend available for " . $urlData['scheme']);
// }

// $log = $className::getInstance();
// $log->logMessage('MENSAJE NUMERO 1.', $className::DEBUG);
// $log->logMessage('MENSAJE NUMERO 2.', $className::DEBUG);
// $log->logMessage('MENSAJE NUMERO 3.', $className::DEBUG);

// print "Logger " . $urlData['scheme'] . " created. [END]\n";

include_once("class.pdofactory.php");
include_once("abstract.databoundobject.php");
include_once("class.logdata.php");

$connectionString = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";


$urlData = parse_url($connectionString);

var_dump($urlData);

if (!isset($urlData['scheme'])) {
  throw new Exception("Invalid scheme connection.\n");
}

$fileName = 'Logger/class.' . $urlData['scheme'] . 'LoggerBackend.php';

include_once($fileName);

$className = $urlData['scheme'] . 'LoggerBackend';

print "Class Name: " . $className . "\n";

if (!class_exists($className)) {
  throw new Exception("No loggind bakend available for " . $urlData['scheme']);
}

$log = $className::getInstance();
$log->logMessage('MENSAJE 1 CON DEBUG.', $className::DEBUG);
$log->logMessage('MENSAJE 2 CON INFO.', $className::INFO);
$log->logMessage('MENSAJE 3 CON WARNING.', $className::WARNING);

print "Logger " . $urlData['scheme'] . " created. [END]\n";

