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
	
	</head>
	<body>

		<!-- cabecalho, menu e acesso -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		    	<a class="navbar-brand" href="index.php"> Systoque </a>
		    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		    		<li class="nav-item active">
		        		<a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
		    		</li>
		    		<li class="nav-item">
		        		<a class="nav-link" href="#"> Cadastrar Usuário </a>
		    		</li>
		    	</ul>

		    	<!-- formulário de acesso ao sistema -->
		    	<div class="mr-sm-2 cor"> Login </div>
		    	<form action="App/Model/logando.php" method="POST" class="form-inline my-lg-0">
		    		<input class="form-control mr-sm-2" type="text" placeholder="Usuário" name="usuario">
		    		<input class="form-control mr-sm-2" type="password" placeholder="Senha" name="senha">
		    		<input class="btn btn-primary my-sm-0" type="submit" value="Entrar"></input>
		    	</form>
			</div>
		</nav>

		<!-- // front da página -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>

			
		<!-- link jquery bootstrap js , popper min js e bootstrap min js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	</body>

</html>