<?php

//classe de conexao com DB

//establecendo a função conectar
function conectar(){

	//tentando conectar com try
	try{

		//criando objeto da Classe PDO  nativa do PHP
		$pdo = new PDO("mysql:host=localhost;dbname=estoque", "root", "");

		//mensagem de conexão bem sucedida
		echo "Conectado!";

	//em caso de erro
	} catch (PDOException $e){

		//mensagem de erro de conexão
		echo $e->getMessage();

	}

	//retorno da função
	return $pdo;

}