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

		<link rel="stylesheet" type="text/css" href="def.css">

		<script>
			
			function datavazia(){

				alert("Todas as datas devem ser preenchidas!");
				setTimeout("window.location='../../../public/relatorios.php'");

			}

		</script>
	
	</head>
	<body>

		<!-- cabecalho, menu e acesso -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		    	<a class="navbar-brand" href="../../../public/home.php"> Systoque </a>
		    	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		    		<li class="nav-item">
		        		<a class="nav-link" href="../../../public/home.php"> Home <span class="sr-only">(current)</span></a>
		    		</li>
		    		<li class="nav-item active">
		        		<a class="nav-link"> Relatório por Data </a>
		    		</li>
		    	</ul>
			</div>
		</nav>

		<!-- // classe jumbotron - titulo da pagina -->
		<div class="jumbotron">
			
			<center><h1> Relatório por Data </h1></center>

		</div>

		<?php

			//recebendo dados do relatório por data
			$dataini = $_POST['datai'];
			$datafin = $_POST['dataf'];

			if($dataini == 0 || $datafin == 0){

				echo "<script> datavazia() </script>";

			}

		?>

		<!-- conteudo da página  -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					
					<!-- // titulo do relatorio -->
					Relatório de Produtos entre os dias <?php echo $dataini; ?> e <?php echo $datafin; ?>

					<br><br>

					<!-- // botoes de geracao de arquivo -->
					<a href="gerar-planilha.php"><button class="btn btn-success"> Gerar Excel </button></a>
					<button class="btn btn-danger"> Gerar PDF </button>

					<?php

						// abrindo sessão
						session_start();
						$_SESSION['datai'] = $dataini;
						$_SESSION['dataf'] = $datafin;

						// conectando com db
						require_once "../Classes/Conexao.php";
						$conn = conectar();

						// consultando banco de dados
						$consult = $conn->prepare("SELECT * FROM produtos WHERE data >= :dataini AND data <= :datafin");
						$consult->bindValue(':dataini', $_SESSION['datai']);
						$consult->bindValue(':datafin', $_SESSION['dataf']);
						$consult->execute();

					?>

					<!-- // montando uma tabela com os dados do db -->
					<table class="table marg-top">
						<thead class="thead-inverse">
							<tr>

								<th> Data </th>
								<th> Produto </th>
								<th> Quantidade </th>
								<th> Valor Unit (R$) </th>
								<th> Valor Total (R$) </th>

							</tr>
						</thead>
						<tbody>
							
							<?php while($linha = $consult->fetch(PDO::FETCH_ASSOC)){ ?>

								<tr>

									<td> <?php echo $linha['data']; ?> </td>
									<td> <?php echo $linha['produto']; ?> </td>
									<td> <?php echo $linha['quantidade']; ?> </td>
									<td> <?php echo $linha['valorunit']; ?> </td>
									<td> <?php echo $linha['valortotal']; ?> </td>

								</tr>

							<?php } ?>

						</tbody>
					</table>

					<!-- // botao para voltar -->
					<a href="../../../public/relatorios.php"><button class="btn btn-primary"> <- Voltar </button></a>

				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
			
		<!-- link jquery bootstrap js , popper min js e bootstrap min js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	</body>

</html>