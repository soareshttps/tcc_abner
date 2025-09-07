<?php
$servername = "conexao";
$username = "root";
$password = "";
$dbname = "VolleyConnect";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}