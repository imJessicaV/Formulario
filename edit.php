<?php
if (!empty($_GET['id'])) //verifica se o id passado na url não está vazio
{

  include_once("config.php"); //inclui o arquivo config.php que contém as informações de conexão com o banco de dados

  $id = $_GET['id']; //pega o id passado na url

  $sqlSelect = "SELECT * FROM usuarios WHERE id = $id"; //seleciona todos os dados da tabela usuarios onde o id for igual ao id passado na url

  $result = $conn->query($sqlSelect); //query() executa uma consulta ao banco de dados, retornando um objeto do tipo mysqli_result para consultas SELECT, SHOW, DESCRIBE ou EXPLAIN. Retorna TRUE para outras consultas SQL executadas com sucesso. Retorna FALSE em caso de falha.

  if($result -> num_rows > 0){    //num_rows retorna o número de linhas do conjunto de resultados.
    while($userData = mysqli_fetch_assoc($result)){ //fetch_assoc() retorna uma matriz associativa representando a próxima linha do conjunto de resultados representado pelo objeto de resultado, onde cada chave representa o nome de uma das colunas do conjunto de resultados.
      $nome = $userData['nome']; 
      $email = $userData['email'];
      $telefone = $userData['telefone'];
      $genero = $userData['sexo'];
      $data_nasc = $userData['data_nasc'];
      $cidade = $userData['cidade'];
      $estado = $userData['estado'];
      $endereco = $userData['endereco'];
      $senha = $userData['senha'];
    }
  }else{
    header("Location: sistema.php"); //redireciona para a página sistema.php
  }
}else{
  header("Location: sistema.php"); //redireciona para a página sistema.php
}
?>

<!DOCTYPE html>
<html lang="PT-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="./css/styleEdit.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;400;700;900&display=swap"
    rel="stylesheet" />
  <title>Projeto | Formulário</title>
</head>

<body>
  
    <a href="sistema.php">Voltar</a>
  
  <div class="box">
    <form action="saveEdit.php" method="post">
      <fieldset>
        <legend><b>Formulário de Cadastro</b></legend>
        <br />
        <div class="inputBox">
          <input type="text" name="nome" id="nome" required class="inputUser" value="<?php echo $nome ?>" />
          <label for="nome" class="labelInput">Nome Completo</label>
        </div>
        <br>
        <div class="inputBox">
          <input type="text" name="senha" id="senha" required class="inputUser" value="<?php echo $senha ?>"/>
          <label for="senha" class="labelInput">Senha</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="text" name="email" id="email" required class="inputUser" value="<?php echo $email ?>"/>
          <label for="text" class="labelInput">E-mail</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="text" name="telefone" id="telefone" required class="inputUser" value="<?php echo $telefone ?>"/>
          <label for="telefone" class="labelInput">Telefone</label>
        </div>
        <br />
        <p>Sexo</p>
        <div class="sexo">
          <input type="radio" name="genero" id="feminino" value="Feminino" <?php echo ($genero=='Feminino')?'checked' : '' ?> required class="inputUser" />
          <br />
          <label for="feminino">Feminino</label>
          <input type="radio" name="genero" id="msculino" value="Masculino" <?php echo ($genero=='Masculino')?'checked' : '' ?> required class="inputUser"/>
          <br />
          <label for="masculino">Masculino</label>
          <input type="radio" name="genero" id="outro" value="Outro" <?php echo ($genero=='Outro')?'checked' : '' ?> required class="inputUser"/>
          <label for="outro">Outro</label>
        </div>
        <br />

        <label for="data_nasc"><b>Data de Nascimento</b></label>
        <input type="date" name="data_nasc" id="data_nasc" required value="<?php echo $data_nasc ?>" />
        <br />
        <br>
        <br>
        <div class="inputBox">
          <input type="text" name="cidade" id="cidade" required class="inputUser" value="<?php echo $cidade ?>" />
          <label for="cidade" class="labelInput">Cidade</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="text" name="estado" id="estado" required class="inputUser"  value="<?php echo $estado ?>"/>
          <label for="estado" class="labelInput">Estado</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="text" name="endereco" id="endereco" required class="inputUser"  value="<?php echo $endereco ?>"/>
          <label for="endereco" class="labelInput">Endereço</label>
        </div>
        <br />
        <div class="inputBox">
          <input type="hidden" name="id" value="<?php echo $id ?>"/> <!--//cria um campo oculto com o id do usuário-->
          <button type="submit" name="update" id="update">Enviar</button>
        </div>
      </fieldset>
    </form>
  </div>
</body>

</html>