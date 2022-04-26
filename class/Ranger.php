<?php
class Ranger
{
    public function buscaRanger()
    {
        include_once "Connect.php";
        $conn = new Connect();
        $cn = $conn->connect_db();
        $sql = $cn->prepare("SELECT * FROM tb_ranger WHERE ativo=1");
        $sql->execute();
		$aux = $sql->rowCount();
        if ($aux > 0) {
            $tot = $sql->rowCount();
			$dados = $sql->fetchall(PDO::FETCH_ASSOC);
            return array ($tot,$dados);
        } else{
            return false;
        }
    }
	
	public function incluirRanger($oct1,$oct2,$oct3,$desc_ranger){
		include_once "Connect.php";
        $conn = new Connect();
        $cn = $conn->connect_db();
        $sql = $cn->prepare("INSERT INTO tb_ranger (oct1,oct2,oct3,desc_ranger) VALUES (:oct1,:oct2,:oct3,:desc_ranger)");
		$sql->bindValue(':oct1',$oct1);
		$sql->bindValue(':oct2',$oct2);
		$sql->bindValue(':oct3',$oct3);
		$sql->bindValue(':desc_ranger',$desc_ranger);
		$sql->execute();
		$aux = $sql->rowCount();
		if ($aux > 0) {
            //$tot = $sql->rowCount();
			//$dados = $sql->fetchall(PDO::FETCH_ASSOC);
            return true;
        } else{
            return false;
        }
	}
}
