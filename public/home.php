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

		<!-- link css proprio -->
		<link rel="stylesheet" type="text/css" href="def.css">
		<style>
			.cor{
				color: #fff;
			}
		</style>

		<script>
			
			function nologin(){

				alert("Você não está logado!");
				setTimeout("window.location='../index.php'");

			}

		</script>
	
	</head>
	<body>

		
		<!-- cabecalho, menu e acesso -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		    	<a class="navbar-brand" href="home.php"> Systoque </a>
		    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		    		<li class="nav-item active">
		        		<a class="nav-link" href="home.php"> Home <span class="sr-only">(current)</span></a>
		    		</li>
		    		<li class="nav-item">
		        		<a class="nav-link" href="cadastro-produto.php"> Cadastrar Produto </a>
		    		</li>
		    	</ul>

		    	<!-- //botão sair -->
		    	<a href="../App/Model/Logout.php"><input class="btn btn-primary my-sm-0" type="button" value="Sair"></input></a>

			</div>
		</nav>

		<?php

			// verificando se existe um sessão aberta

			// abrindo sessão
			session_start();

			// condiçional
			if(!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])){

				// em caso de não haver sessão aberta
				sleep(2);
				echo "<script> nologin() </script>";

			} else {

				// inserindo a conexao
				require_once '../App/Model/Classes/Conexao.php';

				//criando objeto da classe conexao
				$conn = conectar();

				// selecionado nome pessoa logada
				$nome = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
				$nome->bindValue(':usuario', $_SESSION['usuario']);
				$nome->execute();
				while($linha = $nome->fetch(PDO::FETCH_ASSOC)){
					
					// mostrando o nome de quem está logado
					echo "Bem vindo(a), " . $linha['nome'];

				}

			}

		?>





		<!-- conteudo da pagina -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					
					<center><h3> painel de adm </h3></center>

				</div>
				<div class="col-md-1"></div>
			</div>
		</div>



			
		<!-- link jquery bootstrap js , popper min js e bootstrap min js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	</body>

</html>