<!DOCTYPE html>
<html lang="en">

	<head>
	
		<meta charset="utf-8">
		<title> Cadastrando Produto </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- link jquery do google e javascript proprio -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script type="text/javascript" src="jsperson.js"></script>
		
		<!-- link bootstrap min css -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

		<!-- link css proprio -->
		<link rel="stylesheet" type="text/css" href="def.css">

		<!-- //scripts de inserção -->
		<script>
			
			//função voltar, para voltar para o fomrulário de cadastro
			function voltar(){

				alert("Todos os dados devem ser preenchidos!");
				setTimeout("window.location='../../public/cadastro-produto.php'", 2000);

			}
			
			//função cadastro, confirma o cadastro e retorna ao formulário
			function cadastro(){

				alert("Produto cadastrado com sucesso!");
				setTimeout("window.location='../../public/cadastro-produto.php'", 2000);

			}

		</script>

	</head>
	<body>
		
		<?php

			//incluindo classe de conexão
			require_once "Classes/Conexao.php";

			//testando conexão e criando objeto da classe conexão
			//CONN é a variável que recebe o estancioamento da classe
			$conn = conectar();

			//recebendo dados do formulário
			$data = isset($_GET['data']) ? $_GET['data'] : 0;
			$produto = isset($_GET['produto']) ? $_GET['produto'] : 0;
			$quant = isset($_GET['quant']) ? $_GET['quant'] : 0;
			$valoru = isset($_GET['valoru']) ? $_GET['valoru'] : 0;

			//verificando se todos os dados foram preenchidos
			if($data == "" || $produto == "" || $quant == "" || $valoru == ""){

				//chamando a função voltar
				echo "<script> voltar() </script>";
				echo "<center><h3> Confira e tente novamente... </h3></center>";

			} else {

				//somando valor total
				$valort = $quant * $valoru;

				//tentando insert no DB
				try{

					//INSER é a variável que irá receber a execução do método PREPARE setado por CONN
					$inser = $conn->prepare("INSERT INTO produtos (data, produto, quantidade, valorunit, valortotal) VALUES (:data, :produto, :quant, :valoru, :valort)");
					$inser->bindValue(':data', $data);
					$inser->bindValue(':produto', $produto);
					$inser->bindValue(':quant', $quant);
					$inser->bindValue(':valoru', $valoru);
					$inser->bindValue(':valort', $valort);

					// testando se já existe o produto cadastrado
					// VALIDAR é a variável que vai armazenar os valores recuperados da base de dados
					$validar = $conn->prepare("SELECT * FROM produtos WHERE produto = :produto AND valorunit = :valoru");
					$validar->execute(array($produto));
					if($validar->rowCount() == 0){

						$inser->execute();

					} elseif($validar->rowCount() >= 1){

						$qtd = $quant + $validar['quantidade'];
						$res = $qtd + $valoru;
						$inser = $conn->prepare("INSERT INTO ");

					}

					//chamando função cadastro
					echo "<script> cadastro() </script>";
					echo "<center><h3> Voltando a página de cadastro </h3></center>";

				} catch(PDOException $e){

					//mensagem de erro de inserção
					echo "erro ao inserir";

				}

			}

			?>

		<!-- link jquery bootstrap js , popper min js e bootstrap min js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	</body>

</html>