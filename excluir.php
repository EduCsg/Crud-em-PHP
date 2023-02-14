<?php

require './config.php';

// recebe o id da url
$id = filter_input(INPUT_GET, 'id');

if ($id) {
  $sql = $pdo->prepare('DELETE FROM usuario WHERE id = :id');

  $sql->bindValue(':id', $id);

  $sql->execute();

  header("Location: index.php");
  exit;
} else {
  header("Location: index.php");
}
