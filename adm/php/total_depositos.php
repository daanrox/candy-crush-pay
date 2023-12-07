<?php
include './../../conectarbanco.php';

$conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar se o parâmetro status está presente
$status = isset($_GET['status']) ? $_GET['status'] : null;

// Query de leitura com base no status
$sql = "SELECT SUM(valor) as total FROM confirmar_deposito";

// Adicionar cláusula WHERE se o parâmetro status estiver presente
if (!empty($status)) {
    $sql .= " WHERE status = ?";
}

$result = null;

// Use prepared statement se o parâmetro status estiver presente
if (!empty($status)) {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $status);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($sql);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "R$ " . $row["total"]; // Adiciona "R$ " antes do valor
} else {
    echo "R$ 0"; // Adiciona "R$ " antes de 0 se nenhum resultado for encontrado
}

$conn->close();
?>
