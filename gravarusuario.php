<?php
  $erro = null;
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $pass = $_POST['senha'];
  $datnas = $_POST['dataNasc'];
  $endereco = $_POST['endereco'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];
  try {
    $conexao = mssql_connect('castelo-server.database.windows.net','CasteloAdmin','AdminCastelo123','DB_CASTELO');  
    $sql = "insert into dbo.USUARIO values ('$nome','$email',$pass,'$datnas','$endereco','$cidade','$estado',$cep)";
    if($conexao!=null)
    {
        mssql_query($conexao,$sql);
        mssql_close($conexao);
    }
    else {
        Echo 'Falhou a conexão';
    }
  } catch (\Throwable $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
  }

  header('location: cadastro.html');
?>