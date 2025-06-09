<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $servername = "mysql_db";
    $username   = "root";
    $password   = "root";
    $dbname     = "projeto_dio";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM contatos WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $contato = $result->fetch_assoc();
    } else {
        echo "Contato não encontrado.";
        exit;
    }
    $conn->close();
} else {
    echo "ID inválido.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Contato</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h2>Editar Contato</h2>
    <form action="update.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $contato['id']; ?>">
      <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($contato['nome']); ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($contato['email']); ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Atualizar</button>
      <a href="list.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
