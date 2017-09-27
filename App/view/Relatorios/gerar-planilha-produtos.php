<?php

	// conectando com db
	require_once "../../Model/Classes/Conexao.php";
	$conn = conectar();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		
		<!-- pagina para gerar relatório -->
		<?php

			// definição de arquivo
			$arquivo = 'produtos.xls';

			// criando a tabela em excel
			$html = '';
			$html .='<table border="1"';
			$html .= '<tr>';
			$html .= '<td colspan="3"> Planilha Produtos Cadastrados </tr>';
			$html .= '</tr>';

			$html .= '<tr>';
			$html .= '<td><b> Produto </b></td>';
			$html .= '<td><b> Quantidade </b></td>';
			$html .= '</tr>';

			// abrindo sessao
			session_start();
			$prod = $_SESSION['sproduto'];

			// consultando banco de dados
			$consult = $conn->prepare("SELECT * FROM produtos WHERE produto LIKE '%$prod%'");
			$consult->execute();

			// listando dados
			while($linha = $consult->fetch(PDO::FETCH_ASSOC)){

				$html .= '<tr>';
				$html .= '<td>' . $linha["produto"] . '</td>';
				$html .= '<td>' . $linha["quantidade"] . '</td>';
				$html .= '</tr>'; 

			}

			// Configurações header para forçar o download
			header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
			header ("Cache-Control: no-cache, must-revalidate");
			header ("Pragma: no-cache");
			header ("Content-type: application/x-msexcel");
			header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
			header ("Content-Description: PHP Generated Data" );
			// Envia o conteúdo do arquivo
			echo $html;
			exit;

		?>

	</body>
</html>