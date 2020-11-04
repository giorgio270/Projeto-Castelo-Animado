<?php
  include "model/mssql.class.php";
  $dbSite= new db("castelo-server.database.windows.net", "CasteloAdmin", "AdminCastelo123", "DB_CASTELO");
  
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $pass = md5($_POST['senha']);
  $datnas = $_POST['dataNasc'];
  $endereco = $_POST['endereco'];
  $cidade = $_POST['cidade'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];
  $nmcri = $_POST['nomeCrianca'];
  $sexo = $_POST['sexo'];
  $datnascri = $_POST['dataNascCrianca'];
  $avescola = $_POST['escola'];
  $avjogos = $_POST['jogos'];
  $avmusicas = $_POST['musicas'];
  $avaniver = $_POST['aniversario'];

  $query_select = "SELECT NM_EMAIL FROM dbo.USUARIO WHERE NM_EMAIL = '".$email."'";
  $select = $dbSite->query($query_select);
  $array = $dbSite->fetch_array($select);

  if($email == "" || $email == null){
    echo "<script language='javascript' type='text/javascript'>
    alert('O campo email deve ser preenchido');window.location.href='
    cadastro.html';</script>";
    }else{
      if(count($array) != 0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Essa conta já existe.');window.location.
        href='cadastro.html'</script>";
      }else{
        $query = $dbSite->query("insert into dbo.USUARIO values ('".$nome."','".$email."','".$pass."','".$datnas."','".$endereco."','".$cidade."','".$estado."','".$cep."','".$nmcri."','".$sexo."','".$datnascri."','".$avescola."','".$avjogos."','".$avmusicas."','".$avaniver."')");
        if($query){
          echo"<script language='javascript' type='text/javascript'>
          alert('Cadastrado com sucesso!');window.location.
          href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";
        }
      }
    }
?>