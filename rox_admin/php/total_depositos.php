<?php
include './../../conectarbanco.php';

$conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query de leitura
$sql = "SELECT SUM(valor) as total FROM confirmar_deposito WHERE status = 'PAID_OUT'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "R$ " . $row["total"]; // Adiciona "R$ " antes do valor
} else {
    echo "R$ 0"; // Adiciona "R$ " antes de 0 se nenhum resultado for encontrado
}

$conn->close();
?>
