<?php

	//incluindo conexao com DB
	require_once 'Classes/Conexao.php';

	//usando a classe conexao
	use \App\Model\Classes\Conexao;

	//estanciando classe conexao
	$connINS = new Conexao();
	$connINS->conectar();

	//recebendo dados do formulário
	$data = $_GET['data'];
	$produto = $_GET['produto'];
	$quant = $_GET['quant'];
	$valorunit = $_GET['valorunit'];

	//verificando se todos os campos foram preenchidos
	if($data == "" || $produto == "" || $quant == "" || $valorunit == ""){

		//função que retorna a página de cadastro
		echo "<script> voltar() </script>";
		echo "<center><h3> Confira e tente novamente. </h3></center>";

	} else {

		//obtendo o valor total
		$res = $quant * $valorunit;

		//fazendo a inserção no DB
		$insertProd = $connINS->prepare("INSERT INTO produtos (data, produto, quantidade, valorunit, valortotal) VALUES ('$data', '$produto', '$quant', '$valorunit', '$res')");

		//mensagem de retorno a página de cadastro e chamando a função insert
		echo "<script> insert() </script>";
		echo "<center><h3> Voltado para página de cadastro </h3></center>";

	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title> Inserindo Produto</title>
		<script>
			
			function voltar(){

				//função que avisa campo vazio e retorna para página de cadastro
				alert("Todos os campos devem ser preenchidos!")
				setTimeout("window.location='../../public/cadastro-produto.php'", 2000);

			}

			function insert(){

				//função confirma cadastro e volta para página de cadastro
				alert("Produto cadastrado com sucesso!");
				settimeout("window.location='../../public/cadastro-produto.php'", 2000);

			}

		</script>
	</head>
	<body>

	</body>
</html>