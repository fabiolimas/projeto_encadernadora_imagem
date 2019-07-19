<?php
session_start();
		include('conexao.php');

		if((!isset ($_SESSION['usuario'])== true) and (!isset ($_SESSION['senha'])== true)){

			unset ($_SESSION['usuario']);
			unset($_SESSION['senha']);
			header('location:index.php');


		}
		$logado=$_SESSION['usuario'];
		
				
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript">
		
	
		
	</script>
	<title>Entrada de Albuns</title>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">

		<a href='logout.php'><img src="imagens/sair.png" id="sair" title="Sair"></a>



	


	
</div>
</body>
</html>