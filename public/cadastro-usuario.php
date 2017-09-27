<!DOCTYPE html>
<html lang="en">

	<head>
	
		<meta charset="utf-8">
		<title> Cadastro de Usuário </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- link jquery do google e javascript proprio -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script type="text/javascript" src="jsperson.js"></script>
		
		<!-- link bootstrap min css -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="def.css">
	
	</head>
	<body>
	
		<!-- menu cabecalho -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		    	<a class="navbar-brand" href="home.php"> Systoque </a>
		    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		    		<li class="nav-item">
		        		<a class="nav-link" href="home.php"> Home </a>
		    		</li>
		    		<li class="nav-item active">
		        		<a class="nav-link" href="cadastro-usuario.php"> Cadastrar Usuário </a>
		    		</li>
		    	</ul>
			</div>
		</nav>

		<!-- // titulo da página -->
		<div class="jumbotron">
			
			<center><h1> Cadastro de Usuário </h1></center>

		</div>

		<!-- // conteudo da página -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">

					<h5> Cadastro de Usuário </h5>
					
					<form action="../App/Model/cad-usuario.php" method="POST">
						<input type="text" name="usuario" class="form-control marg-top" placeholder="Usuário">
						<input type="password" name="senha" class="form-control marg-top" placeholder="Senha">
						<input type="text" name="nome" class="form-control marg-top" placeholder="Nome Usuário">
						<input type="submit" value="Cadastrar" class="btn btn-primary marg-top">
					</form>

				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
			
		<!-- link jquery bootstrap js , popper min js e bootstrap min js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	</body>

</html>