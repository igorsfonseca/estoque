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
	echo "<center><h3> Confira e tente novamente </h3></center>";

}

//tentando insert no DB
try{

	//INSER é a variável que irá receber a execução do método PREPARE setado por CONN
	$inser = $conn->prepare("INSERT INTO produtos (data, produto, quantidade, valorunit) VALUES (:data, :produto, :quant, :valoru)");
	$inser->bindValue(':data', $data);
	$inser->bindValue(':produto', $produto);
	$inser->bindValue(':quant', $quant);
	$inser->bindValue(':valoru', $valoru);
	$inser->execute();

} catch(PDOException $e){

	echo "erro ao inserir";

}

?>

<!DOCTYPE html>
<html>
	<head>
		<title> Inserindo produto </title>

		<script>
			
			//função voltar, para voltar para o fomrulário de cadastro
			function(){
				alert("Todos os dados devem ser preenchidos!");
				setTimeout("window.location='../../public/cadastr-produto.php'", 2000);
			}

		</script>

	</head>
	<body>

	</body>
</html>