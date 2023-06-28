<?php

include_once("config.php"); // Inclui o arquivo de configuração do banco de dados

if (isset($_POST['update'])) { // Se o botão de atualizar for clicado
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nasc = $_POST['data_nasc'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    // Atualiza os dados do usuário no banco de dados
    $sqlUpdate = "UPDATE usuarios SET nome='$nome', senha='$senha', email='$email', telefone='$telefone', sexo='$genero', data_nasc='$data_nasc', cidade='$cidade', estado='$estado', endereco='$endereco' WHERE id=$id";

    $result = $conn->query($sqlUpdate); // Executa a query de atualização


}

header('location: sistema.php') // Redireciona para a página de sistema
?>