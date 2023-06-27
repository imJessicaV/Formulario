<?php
session_start();
include_once('config.php');
if (!isset($_SESSION['email']) == true && !isset($_SESSION['senha']) == true) {
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location: login.php');
}

$logado = $_SESSION['email'];

$sql = "SELECT * FROM usuarios ORDER BY id DESC ";

$result = $conn->query($sql);

print_r($result);


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
            while($userData = mysqli_fetch_assoc($result)) // fetches a result row as an associative array, a numeric array, or both
            {
              echo "<tr>";
              echo "<td>".$userData['id']."</td>";
              echo "<td>".$userData['nome']."</td>";
              echo "<td>".$userData['senha']."</td>";
              echo "<td>".$userData['email']."</td>";
              echo "<td>".$userData['telefone']."</td>";
              echo "<td>".$userData['sexo']."</td>";
              echo "<td>".$userData['data_nasc']."</td>";
              echo "<td>".$userData['cidade']."</td>";
              echo "<td>".$userData['estado']."</td>";
              echo "<td>".$userData['endereco']."</td>";
              echo "<td><a href='editar.php?id=".$userData['id']."'><i class='bi bi-pencil-square'></i><i class='bi bi-x-square-fill'></i></a></td>";
              echo "</tr>";
            }
            { 

            }
          ?>
      </tbody>
    </table>
  </div>
</body>

</html>