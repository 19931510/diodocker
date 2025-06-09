<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['email'])) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    $id = intval($_POST['id']);
    $nome = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Formato de email inválido.";
        exit;
    }

    $servername = getenv('DB_HOST');
    $username   = getenv('DB_USER');
    $password   = getenv('DB_PASS');
    $dbname     = getenv('DB_NAME');



    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $nomeEsc = $conn->real_escape_string($nome);
    $emailEsc = $conn->real_escape_string($email);

    $stmt = $conn->prepare("UPDATE contatos SET nome = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $nome, $email, $id);
    if ($stmt->execute()) {
        header("Location: list.php");
        exit;
    } else {
        echo "Erro ao atualizar: ".$stmt->error;
}
$stmt->close();
?>
