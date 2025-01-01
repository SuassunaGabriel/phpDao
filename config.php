<?php
//EStamos aqui criando uma forma de validar a classe aql, para ver se não tem nenhum erro
spl_autoload_register(function($class_name){

$filename = "class" .DIRECTORY_SEPARATOR .  $class_name . ".php";

if (file_exists(($filename))){

	require_once($filename);


}



});






?>