<!DOCTYPE html>
<html lang="en">

	<head>
	
		<meta charset="utf-8">
		<title> Sistema de Busca sem refresh </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- link jquery do google e javascript proprio -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script type="text/javascript" src="jsperson.js"></script>
		
		<!-- link bootstrap min css -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

		<script>
			
			function preench(){

				//mensagem para preencher todos os dados
				alert("Preencha todos os dados!");
				//voltando a pagina de login
				setTimeout("window.location='../../index.php'");

			}

			function noexiste(){

				//mensagem que informa usuário não existente
				alert("Usuário não enconrtado, confira e tente novamente.");
				//voltando a pagina de login
				setTimeout("window.location='../../index.php'");

			}

			function login(){

				// indo para o painel de adms
				setTimeout("window.location='../../public/home.php'", 2000);

			}

		</script>
	
	</head>
	<body>

		<?php

			// inserindo a conexao
			require_once 'Classes/Conexao.php';

			//criando objeto da classe conexao
			$conn = conectar();

			//recebendo valores do formulário de login
			$usuario = $_REQUEST['usuario'];
			$senha = $_REQUEST['senha'];

			//verificando se valores estão vazios
			if($usuario == "" || $senha == ""){

				//chamando função preencher
				echo "<script> preench() </script>";

			} else {

				//verificando de usuario existe no banco de dados
				$validing = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario and senha = :senha");
				$validing->bindValue(':usuario', $usuario);
				$validing->bindValue(':senha', $senha);
				$validing->execute();
				//verificando se alguma linha é retornada da consulta
				if($validing->rowCount() == 0){

					// chamando função NOEXISTE
					echo "<script> noexiste() </script>";

				} else {

					// iniciando sessão
					session_start();
					$_SESSION['usuario'] = $_SESSION['usuario'];
					$_SESSION['senha'] = $_SESSION['senha'];

					// chamando função de entrada no painel
					echo "<script> login() </script>";

				}

			}

		?>

		<!-- link jquery bootstrap js , popper min js e bootstrap min js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	</body>

</html>