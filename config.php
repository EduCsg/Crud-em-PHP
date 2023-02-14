<?php

$db_name = 'test';
$db_host = 'localhost:3306';
$db_user = 'root';
$db_pass = '';


$pdo = new PDO("mysql:dbname=" . $db_name . ";host=" . $db_host, $db_user, $db_pass);


// $pdo = new PDO("mysql:dbname=test;host:localhost:3306", "root", "");

// PDO é o padrão para conexão com o MySQL
// parâmetros
// mysql:dbname=test - nome do banco que quero acessar (No caso, test)
// host:localhost:3306 - porta que o bd está aberto (No caso, 3306)
// root - Nome do usuário (No caso, root)
// "" - Senha do usuário (No caso, não tem)

// Resumindo, o PDO guarda as configurações para acesso ao Banco de Dados