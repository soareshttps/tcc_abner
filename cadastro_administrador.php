<?php
include 'conexao.php';

// Inicia o buffer de saída para capturar o HTML
ob_start();

// Inclui o CSS no cabeçalho HTML
echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status do Cadastro</title>
    <link rel="stylesheet" href="style_administrador2.css">
</head>
<body>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $credencial = $_POST['credencial'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Verifica se todos os campos obrigatórios foram preenchidos
    if ($nome && $cpf && $credencial && $email && $senha) {
        $conexao = conecta();
        $sql = "INSERT INTO administrador (nome, cpf, credencial, email, senha) VALUES ('$nome', '$cpf', '$credencial', '$email', '$senha')";

        echo '<div class="container">';

        if (mysqli_query($conexao, $sql)) {
            echo '<h1>Cadastro concluído</h1>';
            echo '<p class="welcome-message">Seja bem vindo(a)!</p>';
            echo '<div class="info-cadastro">';
            echo '<p><strong>Nome:</strong> ' . htmlspecialchars($nome) . '</p>';
            echo '<p><strong>CPF:</strong> ' . htmlspecialchars($cpf) . '</p>';
            echo '<p><strong>Credencial:</strong> ' . htmlspecialchars($credencial) . '</p>';
            echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
            echo '<p><strong>Senha:</strong> ' . str_repeat('*', strlen($senha)) . '</p>'; // Não exibir a senha real
            echo '</div>';
            echo '<strong><p class="sucesso">Novo registro criado com sucesso!</p></strong>';
        } else {
            echo '<h1>Erro no Cadastro</h1>';
            echo '<p class="erro-banco">Erro ao registrar: ' . htmlspecialchars(mysqli_error($conexao)) . '</p>';
        }

        desconecta($conexao);

        echo '<div class="link-login">';
        echo '<a href="login.html" class="nav-button">Comece a navegar...</a>';
        echo '</div>';
        echo '</div>'; // Fecha .container

    } else {
        // Mensagem de erro para campos não preenchidos
        echo '<div class="container">';
        echo '<h1>Erro no Cadastro</h1>';
        echo '<p class="erro">Todos os campos são obrigatórios.</p>';
        echo '<div class="link-login">';
        echo '<a href="login.html" class="nav-button">Voltar para o Login</a>';
        echo '</div>';
        echo '</div>'; // Fecha .container
    }
} else {
    // Caso a página seja acessada diretamente sem POST
    echo '<div class="container">';
    echo '<h1>Acesso Inválido</h1>';
    echo '<p class="erro">Por favor, preencha o formulário de cadastro.</p>';
    echo '<div class="link-login">';
    echo '<a href="cadastro.html" class="nav-button">Ir para o Cadastro</a>';
    echo '</div>';
    echo '</div>'; // Fecha .container
}

// Fecha o corpo e o HTML
echo '</body>
</html>';
ob_end_flush();
?>