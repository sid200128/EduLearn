<?php

require './vendor/autoload.php';

// it should always be Dotenv\Dotenv and not Dotenv/Dotenv
$dotenv = Dotenv\Dotenv::createImmutable(realpath('./'));
$dotenv->load();

$connection = new mysqli($_ENV['HOST'], $_ENV['USER'], $_ENV['PASS'], $_ENV['DBNAME']);

if($connection->connect_error){
    die("Connection Failed: ".$connection->connect_error);
}

// echo "Connected Successfully";

?>