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
			
			// dados vazios no formulário
			function nodatas(){

				alert("Todos os dados devem ser preenchidos!");
				setTimeout("window.location='../../public/cadastro-usuario.php'", 2000);

			}

			// cadastro com êxito
			function cadusuario(){

				alert("Usuário cadastrado com sucesso!");
				setTimeout("window.location='../../public/cadastro-usuario.php'", 1000);

			}

		</script>
	
	</head>
	<body>
	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">

					<?php

						// obtendo dados formulário
						$usuario = $_REQUEST['usuario'];
						$senha = $_REQUEST['senha'];
						$nome = $_REQUEST['nome'];

						if($usuario == "" || $senha == "" || $nome == ""){

							echo "<script> nodatas() </script>";
							echo "<center><h3> Confira e tente novamente... </h3></center>";

						} else {

							//incluindo classe de conexão
							require_once "Classes/Conexao.php";

							//testando conexão e criando objeto da classe conexão
							//CONN é a variável que recebe o estancioamento da classe
							$conn = conectar();

							// inserindo dados no banco
							$insert = $conn->prepare("INSERT INTO usuarios (usuario, senha, nome) VALUES (:usuario, :senha, :nome)");
							$insert->bindValue(':usuario', $usuario);
							$insert->bindValue(':senha', $senha);
							$insert->bindValue(':nome', $nome);
							$insert->execute();

							echo "<script> cadusuario() </script>";

						}

					?>
					
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
			
		<!-- link jquery bootstrap js , popper min js e bootstrap min js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	</body>

</html>