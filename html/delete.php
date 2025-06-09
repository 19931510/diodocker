<?php
// IMPORTANTE: Certifique-se que não haja espaços antes de <?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $servername = getenv('DB_HOST');
    $username   = getenv('DB_USER');
    $password   = getenv('DB_PASS');
    $dbname     = getenv('DB_NAME');


    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("DELETE FROM contatos WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: list.php");
        exit;
    } else {
        echo "Erro ao excluir: ".$stmt->error;
    }
    $stmt->close();
?>
