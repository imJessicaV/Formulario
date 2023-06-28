<?php
if (!empty($_GET['id'])) //verifica se o id passado na url não está vazio
{

  include_once("config.php"); //inclui o arquivo config.php que contém as informações de conexão com o banco de dados

  $id = $_GET['id']; //pega o id passado na url

  $sqlSelect = "SELECT * FROM usuarios WHERE id = $id"; //seleciona todos os dados da tabela usuarios onde o id for igual ao id passado na url

  $result = $conn->query($sqlSelect); //query() executa uma consulta ao banco de dados, retornando um objeto do tipo mysqli_result para consultas SELECT, SHOW, DESCRIBE ou EXPLAIN. Retorna TRUE para outras consultas SQL executadas com sucesso. Retorna FALSE em caso de falha.

  if($result -> num_rows > 0){    //num_rows retorna o número de linhas do conjunto de resultados.
    $sqlDelete = "DELETE FROM usuarios WHERE id = $id";
    $resultDelete = $conn->query($sqlDelete);
    }
  }
    header("Location: sistema.php"); //redireciona para a página sistema.php
?>