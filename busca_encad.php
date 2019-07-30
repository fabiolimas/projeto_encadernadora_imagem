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
	<div id="interface1">

<button id="btn" onclick="history.back()">Voltar</button></a>

	<h1>Entrada de Albuns</h1>

<?php
	

	#$b_loja=$_POST['busca_loja'];
	$clientes=$_POST['clientes'];
	

	$listar_envios="SELECT p.id_pedido,p.id_loja, p.valor, l.nome_loja,p.cliente, p.os_fotografia, stp.statuspg, p.os, p.data_loja, s.status FROM pedido as p join lojas as l on l.id_loja=p.id_loja join status as s on s.id_status=p.id_status join status_pag as stp on stp.id_pagamento=p.status_pag  where l.nome_loja like '%$clientes%' or p.cliente like '%$clientes%' or p. os like '%$clientes%' or p.os_fotografia like '%$clientes%' order by p.data_loja desc";
		$query_envios=mysqli_query($conecta, $listar_envios);
		$rows=mysqli_num_rows($query_envios);


		echo "Registros encontrados: ".$rows."<br><br>";

		echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</b></td>";
		echo"<td><b>Os Foto</b></td>";
		echo"<td><b>Os Encad.</b></td>";
		echo"<td><b>Status OS</b></td>";
		echo"<td><b>Valor Total</b></td>";
		echo"<td><b>Cliente</b></td>";
		echo"<td><b>Data de Envio</b></td>";
		echo"<td><b>Status</b></td>";
		echo"<td><b>Visualizar OS</b></td>";
		
		
		echo"<td><b>Receber</b></td>";
		echo"</tr>";

		while ($lista_de_envios=mysqli_fetch_array($query_envios)){

			$lojan=$lista_de_envios['nome_loja'];
			$loja=$lista_de_envios['id_loja'];
			$os=$lista_de_envios['os_fotografia'];
			$data_envs=$lista_de_envios['data_loja'];
			$status_env=$lista_de_envios['status'];
			$cliente=$lista_de_envios['cliente'];
			$valor=$lista_de_envios['valor'];
			$osencad=$lista_de_envios['os'];
			$statuspg=$lista_de_envios['statuspg'];
			$idpedido=$lista_de_envios['id_pedido'];

			
			if(strlen($valor)>=6){
		$valor2=substr_replace($valor,',',3,1);
	}else if(strlen($valor)==2){
		$valor2=substr_replace($valor,',',2,1);

	}else if(strlen($pagamento)==3){
		$valor2=substr_replace($valor, ',',4,1);
	}



			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$os</td>";
			echo"<td>$osencad</td>";
			echo"<td>$statuspg</td>";
			echo"<td>R$ ".$valor2."</td>";
			echo"<td>".mb_strtoupper($cliente)."</td>";
			
			
			echo"<td>".date('d-m-Y', strtotime($data_envs))."</td>";
			echo"<td><span class='red'>$status_env</span></td>";
			echo"<td><a href='os_visualizacao.php?id=$idpedido'>Visualizar</a></td>";
		
			echo"<td><a href='encadernadora.php?os=$os'><img src='imagens/edit.png' width=10px id='bt'></a></td>";

			
					}
			




?>



	</table>

	
</div>
</body>
</html>