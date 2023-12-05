<?php
try {
    include './../../conectarbanco.php';

    $conn = new mysqli('localhost', $config['db_user'], $config['db_pass'], $config['db_name']);
    
    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }
    
    // Consulta SQL para obter dados da tabela, ordenados pela hora em ordem ascendente
    $sql = "SELECT id, data_cadastro, email, senha, telefone, saldo, linkafiliado, plano, depositou, bloc, saldo_comissao, percas, ganhos, cpa, cpafake, comissaofake 
            FROM appconfig 
            ORDER BY 
                CASE 
                    WHEN data_cadastro IS NULL THEN 1  -- Coloca registros com data_cadastro vazia por último
                    ELSE 0
                END,
                STR_TO_DATE(data_cadastro, '%H:%i:%s') ASC";
    
    $result = $conn->query($sql);
    
    // Verificar se a consulta foi bem-sucedida
    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }
    
    // Inicializar um array para armazenar os dados
    $data = array();
    
    // Extrair dados da consulta
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    // Fechar a conexão com o banco de dados
    $conn->close();
    
    // Enviar os dados como JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} catch(Exception $e) {
    var_dump($e);
    http_response_code(200);
}
?>
