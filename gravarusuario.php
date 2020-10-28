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
    $sql = "insert into dbo.USUARIO values ('$nome','$email',$pass,'$datnas','$endereco','$cidade','$estado',$cep)";
    $conexao = mssql_connect('castelo-server.database.windows.net','CasteloAdmin','AdminCastelo123','DB_CASTELO');
    if($conexao!=null)
    {
        mssql_query($conexao,$sql);
        mssql_close($conexao);
    }
  } catch (\Throwable $th) {
      $erro = $th;
  }

  echo $erro;

  header('location: cadastro.html');
?>