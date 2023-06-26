<?php
if (isset($_POST['submit'])) 
{
  //print_r('Nome: '. $_POST['nome']);
  //print_r('<br>');
  //print_r('E-mail: '.$_POST['email']);
  //print_r('<br>');
  //print_r('Telefone: '.$_POST['telefone']);
  //print_r('<br>');
  //print_r('Genero: '.$_POST['genero']);
  //print_r('<br>');
  //print_r('Data de Nascimento: '.$_POST['data_nasc']);
  //print_r('<br>');
  //print_r('Cidade: '.$_POST['cidade']);
  //print_r('<br>');
  //print_r('Estado: '. $_POST['estado']);
  //print_r('<br>');
  //print_r('Endereço: '.$_POST['endereço']);
  //print_r('<br>');

  include_once("config.php");

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $genero = $_POST['genero'];
  $data_nasc = $_POST['data_nasc'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $endereco = $_POST['endereco'];
  $senha = $_POST['senha'];

  $result = mysqli_query($conn, "INSERT INTO usuarios (nome, email, telefone, sexo, data_nasc, cidade, estado, endereco, senha) VALUES ('$nome', '$email', '$telefone', '$genero', '$data_nasc', '$cidade', '$estado', '$endereco', '$senha')");
  echo "<script>alert('Cadastro realizado com sucesso!');window.location.href='formulario.php';</script>";

  header("Location: login.php");
  

}
?>

<!DOCTYPE html>
<html lang="PT-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="./css/styleForm.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;400;700;900&display=swap"
    rel="stylesheet" />
  <title>Projeto | Formulário</title>
</head>

<body>
  
    <a href="home.php">Voltar</a>
  
  <div class="box">
    <form action="formulario.php" method="post">
      <fieldset>
        <legend><b>Formulário de Cadastro</b></legend>
        <br />
        <div class="inputBox">
          <input type="text" name="nome" id="nome" required class="inputUser" />
          <label for="nome" class="labelInput">Nome Completo</label>
        </div>
        <br>
        <div class="inputBox">
          <input type="password" name="senha" id="senha" required class="inputUser" />
          <label for="senha" class="labelInput">Senha</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="text" name="email" id="email" required class="inputUser" />
          <label for="text" class="labelInput">E-mail</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="text" name="telefone" id="telefone" required class="inputUser" />
          <label for="telefone" class="labelInput">Telefone</label>
        </div>
        <br />
        <p>Sexo</p>
        <div class="sexo">
          <input type="radio" name="genero" id="feminino" required value="Feminino" required class="inputUser" />
          <br />
          <label for="feminino">Feminino</label>
          <input type="radio" name="genero" id="msculino" required value="Masculino" required class="inputUser" />
          <br />
          <label for="masculino">Masculino</label>
          <input type="radio" name="genero" id="outro" required value="Outro" required class="inputUser" />
          <label for="outro">Outro</label>
        </div>
        <br />

        <label for="data_nasc"><b>Data de Nascimento</b></label>
        <input type="date" name="data_nasc" id="data_nasc" required />
        <br />
        <br>
        <br>
        <div class="inputBox">
          <input type="text" name="cidade" id="cidade" required class="inputUser" />
          <label for="cidade" class="labelInput">Cidade</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="text" name="estado" id="estado" required class="inputUser" />
          <label for="estado" class="labelInput">Estado</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="text" name="endereco" id="endereco" required class="inputUser" />
          <label for="endereco" class="labelInput">Endereço</label>
        </div>
        <br />
        <div class="inputBox">
          <button type="submit" name="submit" id="submit">Enviar</button>
        </div>
      </fieldset>
    </form>
  </div>
</body>

</html>