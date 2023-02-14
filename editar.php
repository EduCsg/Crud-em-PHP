<?php

require './config.php';

// Resgata o ID pela URL
$id = filter_input(INPUT_GET, 'id');


$usuario = [];

// Verifica se o ID veio
if ($id) {

  // Seleciona todos usuários com o ID recebido
  $sql = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");

  // Altera o valor de :id dentro da query
  $sql->bindValue(':id', $id);

  // Executa a query
  $sql->execute();

  // Verifica se retornou alguma linha
  if ($sql->rowCount() > 0) {

    // Joga todo o conteúdo retornado no SQL na var Usuario
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);
  } else {
    header('Location: index.php');
    exit;
  }
} else {
  header('Location: index.php');
}
?>

<h1>Editar Usuário</h1>
<form action="editar_action.php" method="POST">
  <input type="hidden" name="id" value="<?= $usuario['id']; ?>">
  <label>
    Nome: <input type="text" name="nome" value="<?= $usuario['nome']; ?>" />
  </label>
  <label>
    Email: <input type="email" name="email" value="<?= $usuario['email']; ?>" />
  </label>

  <input type="submit" value="Atualizar" />
</form>