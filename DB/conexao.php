<?php
include('config.php');

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco) or die("ERRO NA CONEXAO COM O SERVIDOR " . mysqli_connect_error());

function limpaPost($dados){
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}
