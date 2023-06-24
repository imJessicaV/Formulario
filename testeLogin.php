<?php
  
  //print_r($_REQUEST);

  if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){ //isset verifica se a variável existe e se não está vazia
    include_once('config.php'); //inclui o arquivo config.php
    $email = $_POST['email']; //pega o valor do input email
    $senha = $_POST['senha']; //pega o valor do input senha

    //print_r('Email: '.$email.'<br>');
    //print_r('Senha: '.$senha.'<br>');

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; //seleciona todos os dados da tabela usuarios onde o email e senha são iguais aos digitados no formulário
    $result = $conn->query($sql); //executa a query

    if(mysqli_num_rows($result) < 1){
        header('Location: login.php');
    }else{
        header('Location: sistema.php');
    }


  }else{
    header('Location: login.php');
  }

?>