<?php
// Ativa exibição de erros para depuração
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

$servername = "mysql_db";
$username   = "root";
$password   = "root";
$dbname     = "projeto_dio";

// Cria a conexão com o MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql    = "SELECT * FROM contatos";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Contatos</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    table, th, td {
      border: 1px solid #333;
      border-collapse: collapse;
      padding: 8px;
    }
    .acoes a {
      margin-right: 5px;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <h2 class="mb-4">Contatos Salvos</h2>
    <?php if ($result->num_rows > 0): ?>
      <table class="table">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo htmlspecialchars($row["nome"]); ?></td>
            <td><?php echo htmlspecialchars($row["email"]); ?></td>
            <td class="acoes">
              <!-- Link para editar, passando o id via GET -->
              <a href="update_form.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
              <!-- Link para excluir, passando o id via GET -->
              <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>Nenhum contato encontrado.</p>
    <?php endif; ?>
    <p><a href="contato.html" class="btn btn-primary">Voltar ao Formulário</a></p>
  </div>
  <?php $conn->close(); ?>
</body>
</html>
