<?php

class Usuario {

	Private $idusuario;
	Private $deslogin;
	Private $dessenha;
	Private $dtcadastro;

	Public function getIdusuario(){

	return $this->idusuario;

	}

	Public function setIdusuario($value){
		$this->idusuario = $value;

	}

	Public function getDeslogin(){

		return $this->deslogin;

	}

	Public function setDeslogin($value){

		$this->deslogin = $value;

	}
	Public function getDessenha () {

		return $this->dessenha;
	}
	Public function setDessenha($value){

		$this->dessenha = $value;

	}
	Public function getDtcadastro (){

		return $this->dtcadastro;


	}
	Public function setDtcadastro ($value){

		$this->dtcadastro = $value;



	}

	Public function loadById($id){


		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID",  array (
			":ID" =>$id
		));

		if (count($results ) > 0 ){

			$row = $results[0];
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));


		}

	}

	public function __toString(){
		return json_encode(array(

			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));

	}

}



?>