<?php
		include('conexao.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Consulta de Os's</title>
</head>
<body>
	
	
	<img src="imagens/logo.png" id="logo">
	<div id="interface">
<a href="menu_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>
	<h1>Consulta de Os's</h1>
	<?php

		$id_loja=$_POST['lojas'];
		$envios="SELECT l.loja_nome, e.os_alb, e.data_envio_loja, e.status_receb, e.data_recebe_lab, e.data_recebe_enca FROM entrega_alb as e join lojas as l where e.loja_id=l.loja_id";
		$querys=mysqli_query($conecta, $envios);


		echo "<table border=1 colspan='0'>";
		echo"<tr>";
		echo"<td>Loja</td>";
		echo"<td>Os</td>";
		echo"<td>Envio Loja</td>";
		echo"<td>Status</td>";
		echo"<td>Recebimento Lab</td>";
		echo"<td>Recebimento Encadernadora</td>";
		echo"<td>Estimativa de Entrega</td>";
		echo"</tr>";

	while($lista_envio=mysqli_fetch_array($querys)){

		$loja=$lista_envio['loja_nome'];
		$os=$lista_envio['os_alb'];
		$data_loja=$lista_envio['data_envio_loja'];
		$data_lab=$lista_envio['data_recebe_lab'];
		$data_enca=$lista_envio['data_recebe_enca'];
		$status=$lista_envio['status_receb'];
		
		$estimativa= $data_enca + $data_loja;

		echo"<tr>";
		echo"<td>$loja</td>";
		echo"<td>$os</td>";
		echo"<td>$data_loja</td>";
		echo"<td>$status</td>";
		echo"<td>$data_lab</td>";
		echo"<td>$data_enca</td>";
		echo"<td>$estimativa</td>";
		
		echo "</tr>";

	}

echo"</table>";


	?>
</div>
</body>
</html>