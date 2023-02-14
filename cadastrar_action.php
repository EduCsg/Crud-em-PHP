<?php

require './config.php';

// seleciona os inputs
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
// o Filter_Validate não retorna nada caso seja falso, ou seja, nao atribui valor a variável 

// verifica se o email já está cadastrado
if ($nome && $email) {

  // faz o select nos emails já existentes
  $sql = $pdo->prepare('SELECT * FROM usuario WHERE email = :email');

  // altera o :email na query sql
  $sql->bindValue(':email', $email);
  $sql->execute();


  // se o select dos emails não retornar nenhuma row, continua
  if ($sql->rowCount() === 0) {
    $sql = $pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");

    // altera o :nome e :email na query sql
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);

    // roda a query sql
    $sql->execute();

    // retorna p/ index
    header("Location: index.php");
    exit;
  } else {

    // retorna p/ cadastrar
    header('Location: cadastrar.php');
  }
} else {

  // retorna p/ cadastrar
  header("Location: cadastrar.php");
  exit;
};
