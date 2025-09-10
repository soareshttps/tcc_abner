<?php

function conecta() : mysqli
{
    $servidor = 'localhost';
    $banco = 'volleyconnect';
    $port = 3306;
    $usuario = 'root';
    $senha = '';
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco, $port);

    if(!$conexao)
    {
        echo 'Erro: Não foi possível conectar ao MySql.' . PHP_EOL;
        echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
        //echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
    }
        return $conexao;
}

function desconecta($conexao)
{
    mysqli_close($conexao);
}
?>