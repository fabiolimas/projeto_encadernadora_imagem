<?php

include("conexao.php");

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
	<div id="interface1">

<button id="btn" onclick="history.back()">Voltar</button></a>

	<h1>Entrada de Albuns</h1>

<?php
	

	#$b_loja=$_POST['busca_loja'];
	$clientes=$_POST['clientes'];
	

	$listar_envios="SELECT p.id_pedido, p.id_loja, p.valor, l.nome_loja,p.cliente, p.os, p.data_loja, statp.statuspg, s.status FROM pedido as p join lojas as l on l.id_loja=p.id_loja join status as s on s.id_status=p.id_status join status_pag as statp on statp.id_pagamento=p.status_pag  where l.nome_loja like '%$clientes%' or p.cliente like '%$clientes%' or p. os like '%$clientes%' or p.os_fotografia like '%$clientes%' order by p.data_loja desc";
		$query_envios=mysqli_query($conecta, $listar_envios);
		$rows=mysqli_num_rows($query_envios);


		echo "Registros encontrados: ".$rows."<br><br>";

		echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</b></td>";
		echo"<td><b>Os</b></td>";
		echo"<td><b>Valor Total</b></td>";
		echo"<td><b>Cliente</b></td>";
		echo"<td><b>Data de Envio</b></td>";
		echo"<td><b>Status da OS</b></td>";
		echo"<td><b>Status</b></td>";
		
		
		echo"<td><b>Visualizar OS</b></td>";
		echo"</tr>";

		while ($lista_de_envios=mysqli_fetch_array($query_envios)){

			$lojan=$lista_de_envios['nome_loja'];
			$loja=$lista_de_envios['id_loja'];
			$os=$lista_de_envios['os'];
			$data_envs=$lista_de_envios['data_loja'];
			$status_env=$lista_de_envios['status'];
			$cliente=$lista_de_envios['cliente'];
			$valor=$lista_de_envios['valor'];
			$id_pedido=$lista_de_envios['id_pedido'];
			$status_pagamento=$lista_de_envios['statuspg'];

			if(strlen($valor)>=6){
		$valor2=substr_replace($valor,',',3,1);
	}else if(strlen($valor)==2){
		$valor2=substr_replace($valor,',',2,1);

	}else if(strlen($valor)==3){
		$valor2=substr_replace($valor, ',',4,1);
	}




			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$os</td>";
			echo"<td>R$ ".$valor2."</td>";
			echo"<td>".mb_strtoupper($cliente)."</td>";
			
			
			echo"<td>".date('d-m-Y', strtotime($data_envs))."</td>";
			echo"<td>$status_pagamento</td>";
			echo"<td><span class='red'>$status_env</span></td>";
		
			echo"<td><a href='os_visualizacao.php?id=$id_pedido'>Visualizar</a></td>";

			
					}
			




?>



	</table>

	
</div>
</body>
</html>