<?php

require_once("mssql.class.php");

class info
{
    
    private $db;
    public $login;
    public $name;
    public $password;
    public $userID;
	
    public function info ($host, $user, $pass, $data){
        $this->dbSite = new db($host, $user, $pass, $data);
        if($_SESSION['login']){
            $query = $this->dbSite->query("SELECT a.* FROM site_usuarios a WHERE a.LOGIN = '".$_SESSION['login']."' and INATIVO='F'");
            if($query){
            
                while($row = $this->dbSite->fetch_array()) {         
                    $this->login            = $row[0]['LOGIN'];
                    $this->name             = $row[0]['NOME'];
                    $this->password         = $row[0]['SenhaSite'];
                    $this->userID           = $row[0]['USERID'];
					$this->mult             = $_SESSION['usuario'];
					$this->multID           = $_SESSION['IdMult'];
					$this->Tipo           = $_SESSION['Tipo'];
                }
            }
        }
	}
    
    public function startSession($_login, $_password) {
        
        $_login = stripslashes($_login);
        $_password = stripslashes($_password);
		
        $query = $this->dbSite->query("SELECT a.* FROM dbo.USUARIO a WHERE a.NM_EMAIL = '".$_login."' AND a.PASSWORD_HASH = '".$_password."'");
        if($query){
            while($row = $this->dbSite->fetch_array()) {         
                $_SESSION['login']        = $row[0]['NM_EMAIL'];
            }            
            return true;
        }else{
            return false;
        }
    }
	
	public function startSessionMultipla($_login, $_password, $_usuario, $_senha) {
        
        $_login = stripslashes($_login);
        $_password = stripslashes($_password);
		$_usuario = stripslashes($_usuario);
		$_senha = stripslashes($_senha);
		
        $query = $this->dbSite->query("SELECT a.*, b.Nome as Mult, b.UserId as IdMult, b.Tipo
									FROM site_usuarios a
									INNER JOIN site_usuario_Clientes b on a.LOGIN = b.Empresa
									WHERE a.LOGIN = '".$_login."' AND a.SenhaSite = '".$_password."' and INATIVO='F'
									and b.UserId = '".$_usuario."' and Senha='".$_senha."'");
        if($query){
            while($row = $this->dbSite->fetch_array()) {         
                $_SESSION['login']        = $row[0]['LOGIN'];
				$_SESSION['usuario']        = $row[0]['Mult'];
				$_SESSION['IdMult']        = $row[0]['IdMult'];
				$_SESSION['Tipo']        = $row[0]['Tipo'];
            }            
            return true;
        }else{
            return false;
        }
    }
    
    public function alterPass($newpassword) {
        $senha = $newpassword;
        
        $query = $this->dbSite->query("UPDATE site_usuarios set SenhaSite = '".$senha."' WHERE USERID = '".$this->userID."'");
        
        if($query){
            return true;
        }else{
            return false;
        }
    }
}
