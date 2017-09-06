<!DOCTYPE html>
<html>
	<head>
		<title> Saindo... </title>

		<script>
			
			function sair(){

				// saindo...
				setTimeout("window.location='../../index.php'", 2000);

			}

		</script>

	</head>
	<body>
		
		<?php

			// página destruição da sessão
			sleep(2);
			session_start();
			session_destroy();
			echo "<script> sair() </script>";
			echo "<center><h3> Saindo... </h3></center>";

		?>

	</body>
</html>