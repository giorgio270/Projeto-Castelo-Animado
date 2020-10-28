<?php
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $datnas = $_POST['dataNasc'];
  $endereco = $_POST['endereco'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];

  if($sexoM == "M"){​​​​​$sexo = "0"}​​​​​
  if($sexoF == "F"){​​​​​$sexo = "1"}​​​​​

  $sql = "insert into dbo.CRIANCA values ('$nome','$email','$datnas', '$endereco', '$cidade','$estado', $cep)";
  $conexao = mssql_connect('castelo-server.database.windows.net','CasteloAdmin','AdminCastelo123','DB_CASTELO');
  if($conexao!=null)
  {
  	mssql_query($conexao,$sql);
  	mssql_close($conexao);
  }
  header('location: cadastroCrianca.html');
?>