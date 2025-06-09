<?php

// Define o tipo de conteúdo como JSON
header('Content-Type: application/json');

// Ativa a exibição de erros para desenvolvimento (remova em produção)
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos foram preenchidos
    if (empty($_POST['name']) || empty($_POST['email'])) {
        echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos.']);
        exit;
    }

    // Sanitiza os dados recebidos
    $nome = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Validação simples do email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Formato de email inválido.']);
        exit;
    }

    // Dados de conexão com o banco de dados
    $servername = getenv('DB_HOST');
    $username   = getenv('DB_USER');
    $password   = getenv('DB_PASS');
    $dbname     = getenv('DB_NAME');

    // Cria a conexão com o MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => "Erro na conexão: " . $conn->connect_error]);
        exit;
    }

    // Prepara os dados para inserção
    $stmt = $conn->prepare("INSERT INTO contatos (nome, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $email);
    if ($stmt->execute()) {
        echo json_encode(['success'=>true,'message'=>'Dados salvos com sucesso.']);
    } else {
        echo json_encode(['success'=>false,'message'=>'Erro: '.$stmt->error]);
    }
    $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Método de requisição inválido.']);
    exit;
}
?>
