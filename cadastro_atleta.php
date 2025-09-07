<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome=$_POST['nome'] ?? '';
    $cpf=$_POST['cpf'] ?? '';
    $email=$_POST['email'] ?? '';
    $senha=$_POST['senha'] ?? '';
    $time=$_POST['time'] ?? '';
    $posicao=$_POST['posicao'] ?? '';
    $genero=$_POST['genero'] ?? '';
    $idade=$_POST['idade'] ?? '';

    if ($nome && $cpf && $email && $senha && $time && $posicao && $genero && $idade)
    {

        echo "<h1>Cadastro concluido!</h1><br>";
        echo "Nome: $nome <br>";
        echo "CPF: $cpf <br>";
        echo "Email: $email <br>";
        echo "Senha: $senha <br>";
        echo "Time: $time <br>";
        echo "Posição: $posicao <br>";
        echo "Gênero: $genero <br>";
        echo "Idade: $idade <br>";

    } else {
        echo "Todos os Campos São Obrigatórios";
    }

    $sql = "INSERT INTO atleta (nome, cpf, email, senha, time, posicao, genero, idade) 
    
    VALUES ('$nome', '$cpf', '$email', '$senha', '$time', '$posicao', '$genero', '$idade')";

    if (mysqli_query($conn, $sql)) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<div>
    <a href="login.html">Login</a>
</div>