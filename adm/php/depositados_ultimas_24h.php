<?php
include './../../conectarbanco.php';

$conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);

// Verificar a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obter a data e hora atual
$currentDateTime = date('Y-m-d H:i:s');

// Calcular a data e hora há 24 horas atrás
$twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-24 hours', strtotime($currentDateTime)));

// Query para calcular o valor total depositado
$sqlTotal = "SELECT SUM(valor) as total FROM confirmar_deposito WHERE status = 'aprovado'";

// Query para calcular o valor total depositado nas últimas 24 horas
$sqlLast24h = "SELECT SUM(valor) as total FROM confirmar_deposito WHERE status = 'aprovado' AND data_cadastro >= '$twentyFourHoursAgo'";

// Executar a consulta para o valor total
$resultTotal = $conn->query($sqlTotal);

if ($resultTotal->num_rows > 0) {
    $rowTotal = $resultTotal->fetch_assoc();
    $total = $rowTotal["total"];
} else {
    $total = 0;
}

// Executar a consulta para o valor total nas últimas 24 horas
$resultLast24h = $conn->query($sqlLast24h);

if ($resultLast24h->num_rows > 0) {
    $rowLast24h = $resultLast24h->fetch_assoc();
    $totalLast24h = $rowLast24h["total"];
} else {
    $totalLast24h = 0;
}

// Exibir os resultados
echo "Valor total depositado: R$ " . $total . "<br>";
echo "Valor total depositado nas últimas 24 horas: R$ " . $totalLast24h;

$conn->close();
?>
