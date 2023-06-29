<?php
session_start();
include_once('config.php');
if (!isset($_SESSION['email']) == true && !isset($_SESSION['senha']) == true) { // isset verifica se a variável existe
  unset($_SESSION['email']); // unset destroi a variável especificada
  unset($_SESSION['senha']); // unset destroi a variável especificada
  header('Location: login.php'); // redireciona para a página especificada
}

$logado = $_SESSION['email']; // atribui o valor da variável especificada a outra variável

if(!empty($_GET['search'])){
  $data = $_GET['search'];
  $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' OR senha LIKE '%$data%' OR nome LIKE '%$data%' OR email LIKE '%$data%' OR telefone LIKE '%$data%' OR sexo LIKE '%$data%' OR data_nasc LIKE '%$data%' OR cidade LIKE '%$data%' OR estado LIKE '%$data%' OR endereco LIKE '%$data%' ORDER BY id DESC ";
  // seleciona todos os dados da tabela usuarios e ordena pelo id de forma decrescente

}else{
  $sql = "SELECT * FROM usuarios ORDER BY id DESC "; // seleciona todos os dados da tabela usuarios e ordena pelo id de forma decrescente
}

 

$result = $conn->query($sql); // executa a query especificada



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/styleSistema.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;400;700;900&display=swap" rel="stylesheet">
  <style>
    .box-search {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.4%;
    }
  </style>
  <title>Projeto Formulário</title>
</head>

<body>
  <nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Projeto Formulário</a>
      <div class="d-flex">
        <a href="sair.php" class="btn btn-outline-light me-5">Sair</a>
      </div>
    </div>
  </nav>
  <?php
  echo "<h1 class='text-center mt-5'>$logado, bem vindo a sua sessão!</h1>";
  ?>
  <br>
  <div class="box-search">
    <input type="search" name="search" id="pesquisar" class="form-control w-25" placeholder="Pesquisar">
    <button class="btn btn-primary" onClick="searchData()">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
        viewBox="0 0 16 16">
        <path
          d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
      </svg>
    </button>
  </div>

  <div class="m-5">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Senha</th>
          <th scope="col">E-mail</th>
          <th scope="col">Telefone</th>
          <th scope="col">Sexo</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
          <th scope="col">Endereço</th>
          <th scope="col">...</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        while ($userData = mysqli_fetch_assoc($result)) // fetches a result row as an associative array, a numeric array, or both
        {
          echo "<tr>";
          echo "<td>" . $userData['id'] . "</td>";
          echo "<td>" . $userData['nome'] . "</td>";
          echo "<td>" . $userData['senha'] . "</td>";
          echo "<td>" . $userData['email'] . "</td>";
          echo "<td>" . $userData['telefone'] . "</td>";
          echo "<td>" . $userData['sexo'] . "</td>";
          echo "<td>" . $userData['data_nasc'] . "</td>";
          echo "<td>" . $userData['cidade'] . "</td>";
          echo "<td>" . $userData['estado'] . "</td>";
          echo "<td>" . $userData['endereco'] . "</td>";
          echo "<td><a href='edit.php?id=" . $userData['id'] . "'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
              <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
              <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
            </svg></a>
            <a href='delete.php?id=" . $userData['id'] . "'>  <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='red' class='bi bi-x-square-fill' viewBox='0 0 16 16'>
            <path d='M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z'/>
          </svg></a>
            </td>";
          echo "</tr>";
        } 
        ?>
      </tbody>
    </table>
  </div>
</body>
<script>
    var search = document.getElementById('pesquisar'); //pega o elemento pelo id
    
    search.addEventListener('keydown', function(event){ //adiciona um evento de click no botão
      if(event.key === "Enter") //verifica se a tecla apertada é o enter
      {
        searchData(); //chama a função de pesquisa
      }
    });

    function searchData(){ //função de pesquisa
      window.location.href = 'sistema.php?search=' + search.value; //redireciona para a página de pesquisa com o valor do input
    }
</script>
</html>