<?php

require __DIR__ . '/vendor/autoload.php';
require 'App/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Validamos as principais variaveis de ambiente aqui

?>