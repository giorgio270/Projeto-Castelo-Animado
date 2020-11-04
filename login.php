<?php
    include "model/mssql.class.php";
    $dbSite= new db("castelo-server.database.windows.net", "CasteloAdmin", "AdminCastelo123", "DB_CASTELO");
    
    $login = $_POST['email'];
    $entrar = $_POST['entrar'];
    $senha = md5($_POST['senha']);

    if (isset($entrar)) {

        $verifica = $dbSite->query("SELECT * FROM dbo.USUARIO WHERE NM_EMAIL =
        '".$login."' AND PASSWORD_HASH = '".$senha."'");
        $retorno = $dbSite->fetch_array();
        if (count($retorno) == 0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos.');window.location
            .href='login.html';</script>";
        }else{
            session_start();
            $_SESSION['login'] = $login;
            header("Location:index.php");
        }
    }
?>