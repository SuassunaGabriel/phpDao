<?php


//A classe sql esta herdando todos os atributos e metodos da classe nativa PDO
class Sql extends PDO {

	Private $conn;

	//Quando instanciar a classe Sql automaticamente conectara no banco de dados, isso é bom de fazer quando você tem so um banco de dados 

	public function __construct(){

		//Aqui ele esta atribuindo ao atributo conn a querystring de conexão, que fara automaticamente ao instanciar a classe 
		
		$this->conn = new PDO("mysql:dbname=dbphp8;host=localhost", "root", "");
	}


	//Aqui vai receber o statement e os dados do banco de dados,//Aqui é usado para definir os parametros de uma consulta SQL 
	private function setParams($statement, $parameters =  array()){

		//Aqui ele pega no bind param no indice que esta(representado pelo key), e o valor nesse indice que são os nossos dados.
		//Keyé o indice do array, ele esta percorrendo os campos da nossa tabela
	
		foreach ($parameters as $key => $value) {
			//Aqui esta puxando o meto setParam que fizemos abaixo, que nele vem puxando o bindParam

			$this->setParam($statement,$key, $value); 	
		}
		} 


		//Aqui é caso a gente queira pegar apenas um parametro
		private function setParam($statement, $key, $value){

			$statement->bindParam($key, $value);

		}
	
	//Aqui a gente vai usar para poder fazer os comandos prepare e tambem os bindsParams,esse método é usado para poder executar comandos no banco de dados 
	public function executeQuery($rawQuery, $params = array()){

		//statement
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);
		//para executar e voltar o valor da consulta, faremos o return do stmt execute 
		 $stmt->execute();
		 return $stmt;

	}

	//Aqui ele retornara os dados selecionados 

	public function select($rawQuery, $params = array()):array{

		//Aqui estamos usando o metodo query para tratar da nossa consulta

		$stmt = $this->executeQuery($rawQuery, $params);
		//para vir somente os dados associativos sem o index do array 
		return $stmt->fetchAll(PDO::FETCH_ASSOC);




	}



} 




?>