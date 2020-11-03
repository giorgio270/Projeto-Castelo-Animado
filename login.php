<?php
    include "model/mssql.class.php";
    $dbSite= new db("castelo-server.database.windows.net", "CasteloAdmin", "AdminCastelo123", "DB_CASTELO");
    
    $login = $_POST['email'];
    $entrar = $_POST['entrar'];
    $senha = md5($_POST['senha']);

    if (isset($entrar)) {

        $verifica = mssql_query("SELECT * FROM usuarios WHERE login =
        '$login' AND senha = '$senha'") or die("erro ao selecionar");
        if (mssql_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='login.html';</script>";
            die();
        }else{
            setcookie("login",$login);
            header("Location:index.php");
        }
    }
?>