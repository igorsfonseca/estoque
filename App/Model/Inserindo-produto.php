<?php

	//incluindo conexao com DB
	require_once 'Classes/Conexao.php';

	//usando a classe conexao
	use \App\Model\Classes\Conexao;

	//estanciando classe conexao
	$connINS = new Conexao();
	$connINS->conectar();

	$data = $_GET['data'];
	$produto = $_GET['produto'];
	$quantidade = $_GET['quant'];
	$valorunit = $_GET['valorunit'];

	if($data == "" || $produto == "" || $quant == "" || $valorunit == ""){

		//função que retorna a página de cadastro
		echo "<script> voltar() </script>";
		//mensagem de campo vazio
		echo "<center><h3> Confira e tente novamente. </h3></center>";

	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title> Inserindo Produto</title>
		<script>
			
			//função que avisa campo vazio e retorna para página de cadastro
			alert("Todos os campos devem ser preenchidos!")
			setTimeout("window.location='../../public/cadastro-produto.php'", 2000);

		</script>
	</head>
	<body>

	</body>
</html>