<?php

require './config.php';


// // Query que vai rodar no SQL
// $sql = $pdo->query('SELECT * FROM usuario');

// // faz a requisição do banco de dados e retorna na var $dados
// $dados = $sql->fetchAll(pdo::FETCH_ASSOC);
// // $dados armazena a query e configs do BD
// // fetchAll -> envia a requisição e retorna os dados solicitados na query
// // pdo::FETCH_ASSOC -> Mostra os dados sem o índice (mais organizado)

// echo '<pre>';
// print_r($dados);
// // mostra o resultado da Query no Navegador

$lista = [];
$sql = $pdo->query("SELECT * FROM usuario");

if ($sql->rowCount() > 0) {

  // passa todos conteúdos do SQL para a var Lista
  $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>
<h1>Listagem de Usuários</h1>

<table border="1">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Ações</th>
  </tr>

  <?php foreach ($lista as $usuario) : ?>

    <tr>
      <td><?= $usuario['id']; ?></td>
      <td><?= $usuario['nome']; ?></td>
      <td><?= $usuario['email']; ?></td>

      <td>
        <a href="editar.php?id=<?= $usuario['id']; ?>">[ Editar ]</a>
        <a href="excluir.php?id=<?= $usuario['id']; ?>">[ Excluir ]</a>
      </td>
    </tr>

  <?php endforeach; ?>

</table>

<a href="./cadastrar.php">Cadastrar Usuário</a>