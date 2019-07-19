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
	<title>Saida Albuns</title>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">

<button id="btn" onclick="history.back()">Voltar</button></a>

	<h1>Entrada de Albuns</h1>

<?php
	

	$b_loja=$_POST['busca_loja'];
	

	$listar_envios="SELECT e.loja_id, l.loja_nome, e.os_alb, e.data_envio_loja, e.status, e.status_receb FROM entrega_alb as e join lojas as l on l.loja_id=e.loja_id and e.loja_id='$b_loja' order by e.data_envio_loja desc";
		$query_envios=mysqli_query($conecta, $listar_envios);

		echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</b></td>";
		echo"<td><b>Os</b></td>";
		echo"<td><b>Data de Envio</b></td>";
		echo"<td><b>Status da OS</b></td>";
		echo"<td><b>Recebido</b></td>";
		echo"<td><b>Receber</b></td>";
		echo"</tr>";

		while ($lista_de_envios=mysqli_fetch_array($query_envios)){

			$lojan=$lista_de_envios['loja_nome'];
			$loja=$lista_de_envios['loja_id'];
			$os=$lista_de_envios['os_alb'];
			$data_envs=$lista_de_envios['data_envio_loja'];
			$status_env=$lista_de_envios['status'];
			$receber=$lista_de_envios['status_receb'];


			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$os</td>";
			echo"<td>$data_envs</td>";
			echo"<td>$status_env</td>";
			echo"<td>$receber</td>";
			echo"<td><a href='minilab.php?os=$os'><img src='imagens/seta.png' width=10px id='bt'></a></td>";

			
					}



				




?>


	</table>

	
</div>
</body>
</html>