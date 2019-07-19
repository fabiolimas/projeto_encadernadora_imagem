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
	<title>Entrada de Albuns</title>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">

		<a href='logout.php'><img src="imagens/sair.png" id="sair" title="Sair"></a>



	<h1>Entrada de Albuns - (Laboratório)</h1>

<form name="form_busca" action="busca.php" method="post" style="padding:10px;">
<fieldset style="padding: 10px;"><legend>Filtrar</legend>
	Lojas: <select name="busca_loja"><option value="">Lojas</option>
		<?php

			$busca_l="SELECT * FROM lojas";
			$query_buscal=mysqli_query($conecta, $busca_l);

			while ($busca_lista=mysqli_fetch_array($query_buscal)){


				$id_l=$busca_lista['id_loja'];
				$nome_loja=$busca_lista['nome_loja'];

				echo "<option value='$id_l'>$nome_loja</option>";
			}
		?>
	</select>

	
	<input type="submit" value="Buscar" id="btn">
</fieldset>
</form>
<a href="processa_recebimento_lab.php"><button id="btn">Recebidas</button></a>

<br><br>
	

<?php
		
		
		$id=1;

		$listar_pedidos="SELECT p.id_pedido, l.nome_loja, p.os, p.cliente, p.data_loja, s.status  FROM pedido as p join lojas as l on p.id_loja=l.id_loja join status as s on s.id_status=p.id_status and p.id_pedido='$id'";
	$query_listar=mysqli_query($conecta, $listar_pedidos);


		

			while($lista_de_pedidos=mysqli_fetch_array($query_listar)){

		$loja=$lista_de_pedidos['nome_loja'];
		$os=$lista_de_pedidos['os'];
		$data_loja=$lista_de_pedidos['data_loja'];
		$data_lab=isset($lista_de_pedidos['data_lab'])?$lista_de_pedidos['data_lab']:'';
		$data_encad=$lista_de_pedidos['data_encad'];
		$cliente=$lista_de_pedidos['cliente'];
		$id_pedido=$lista_de_pedidos['id_pedido'];



		echo "<tr><td>$loja</td>";
		echo"<td>$os</td>";
		echo"<td>".mb_strtoupper($cliente)."</td>";
		echo"<td>".date('d-m-Y', strtotime($data_loja))."</td>";
		echo"<td>".$data_lab."</td>";
		echo"<td>".$data_encad."</td>";
		echo"<td><a href='os_visualizacao.php?id=$id_pedido'>Visualizar</a></td>";
		echo"</tr>";


		
	}
		

		echo"<form method='post' action='recebeu_lab.php'>";
		echo"Loja: <input type='text' name='loja' value='$loja'";






	


	

	

	?>
		</form>
</div>
</body>
</html>