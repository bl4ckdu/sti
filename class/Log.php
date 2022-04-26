<?php
/**
 * Created by PhpStorm.
 * User: leduardo
 * Date: 27/09/2018
 * Time: 15:23
 */

class Log
{
    public function buscaNivel($login)
    {
        include_once "Connect.php";
        $conn = new Connect();
        $cn = $conn->connect_ues();

        $sql = $cn->prepare("SELECT id_diretor FROM tb_diretor WHERE cpf_dir=:login and ativo=1");
        $sql->bindValue(":login", $login);
        $sql->execute();
        $id = $sql->fetch(PDO::FETCH_ASSOC);
        $id = $id['id_diretor'];
        if ($sql->rowCount() > 0) {
            $nivel = 'dir';
            return array ($nivel,$id);
        } elseif ($sql->rowCount() == 0) {
            $sql = $cn->prepare("SELECT id_secretario FROM tb_secretario WHERE cpf_sec=:login and ativo=1");
            $sql->bindValue(":login", $login);
            $sql->execute();
            $id = $sql->fetch(PDO::FETCH_ASSOC);
            $id = $id['id_secretario'];
            if ($sql->rowCount() > 0) {
                $nivel = 'sec';
                return array ($nivel,$id);
            } elseif ($sql->rowCount() == 0) {
                $sql = $cn->prepare("SELECT id_adm FROM tb_adm WHERE cpf_adm=:login and ativo=1");
                $sql->bindValue(":login", $login);
                $sql->execute();
                $id = $sql->fetch(PDO::FETCH_ASSOC);
                $id = $id['id_adm'];
                if ($sql->rowCount() > 0) {
                    $nivel = 'adm';
                    return array ($nivel,$id);
                }else{
                    return false;
                }
            }
        }
    }

    public function logon($login,$senha)
    {
        include_once "Connect.php";
        $conn = new Connect();
        $cn = $conn->connect_db();
		$sql = $cn->prepare("SELECT nome_usuario, nivel_usuario,ativo_usuario 
				FROM tb_user WHERE login_usuario=:login AND senha_usuario=:password AND ativo_usuario=:ativo");
		$sql->bindValue(":login", $login);
        $sql->bindValue(":password", $senha);
        $sql->bindValue(":ativo", 1);
		$sql->execute();
        if ($sql->rowCount()>0) {
		$dados = $sql->fetch(PDO::FETCH_ASSOC);
        	//var_dump($dados);
		$nome = $dados['nome_usuario'];
		$nivel = $dados['nivel_usuario'];
		session_start();
		$_SESSION['login']= true;
		$_SESSION['usuario']=$login;
		$_SESSION['acesso']=$nivel;
		$_SESSION['nome']=$nome;
		setcookie("login",$login);
		header("Location:home.php");
	}else{
		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='./';</script>";
		die();
	}           
}
}
