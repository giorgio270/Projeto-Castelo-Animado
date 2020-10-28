<?php
  include "model/mssql.class.php";
  $dbSite= new db("castelo-server.database.windows.net", "CasteloAdmin", "AdminCastelo123", "DB_CASTELO");
  echo "ok";
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $pass = md5($_POST['senha']);
  $datnas = $_POST['dataNasc'];
  $endereco = $_POST['endereco'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];
  $nmcri = $_POST['nomeCrianca'];
  $sexoM = $_POST['sexoM'];
  $sexoF = $_POST['sexoF'];
  $sexo = NULL;
  if($sexoM == "M"){​​​​​$sexo = "0"}​​​​​
  else if($sexoF == "F"){​​​​​$sexo = "1"}
  $datnascri = $_POST['dataNascCrianca'];
  $avescola = $_POST['escola'];
  $avjogos = $_POST['jogos'];
  $avmusicas = $_POST['musicas'];
  $avaniver = $_POST['aniversario'];

  $query = $dbSite->query("insert into dbo.USUARIO values ('".$nome."','".$email."','".$pass."','".$datnas."','".$endereco."','".$cidade."','".$estado."','".$cep."','".$nmcri."','".$sexo."','".$datnascri."','".$avescola."','".$avjogos."','".$avmusicas."','".$avaniver."')");
  echo $dbSite->query("insert into dbo.USUARIO values ('".$nome."','".$email."','".$pass."','".$datnas."','".$endereco."','".$cidade."','".$estado."','".$cep."','".$nmcri."','".$sexo."','".$datnascri."','".$avescola."','".$avjogos."','".$avmusicas."','".$avaniver."')");
  if($query){
    //header('location: index.html');
  }else{
    echo json_encode(false);
  }
  
?>