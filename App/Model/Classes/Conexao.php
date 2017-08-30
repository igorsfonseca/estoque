<?php

//namespace da classe
namespace App\Model\Classes;

//classe de conexão
class Conexao
{

	// função conectar
	public function conectar()
	{

		//iniciando try catch
		try{

			// criando objeto da conexão
			$pdo = new \PDO("mysql:host=localhost;dbname=estoque", "root", "");
			echo "Conectado!";

		} catch (PDOException $e){

			//mensagem a ser exibida em casa de falha de conexão
			echo $e->getMessage();

		}
		
		//retorno da função
		return $pdo;

	}

}