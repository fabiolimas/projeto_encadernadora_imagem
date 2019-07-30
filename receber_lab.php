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
	<div id="interface1">

		<a href='logout.php'><img src="imagens/sair.png" id="sair" title="Sair"></a>



	<h1>Entrada de Albuns - (Laboratório)</h1>

<form name="form_busca" action="busca.php" method="post" style="padding:10px;">
<fieldset style="padding: 10px;"><legend>Filtrar</legend>
	<!--Lojas: <select name="clientes"><option value="">Lojas</option>
		<?php

			$busca_l="SELECT * FROM lojas";
			$query_buscal=mysqli_query($conecta, $busca_l);

			while ($busca_lista=mysqli_fetch_array($query_buscal)){


				$id_l=$busca_lista['id_loja'];
				$nome_loja=$busca_lista['nome_loja'];

				echo "<option value='$id_l'>$nome_loja</option>";
			}
		?>
	</select>-->
	Loja/Cliente/OS: <input type="text" name="clientes">

	
	<input type="submit" value="Buscar" id="btn">
</fieldset>
</form>
<a href="processa_recebimento_lab.php"><button id="btn">Recebidas</button></a>

<br><br>
	<table>

<?php
	

	

	$listar_pedidos="SELECT p.id_pedido, p.valor, l.nome_loja, p.os, p.cliente, s.status, p.data_loja, p.data_lab, p.data_encad   FROM pedido as p join lojas as l on p.id_loja=l.id_loja join status as s on s.id_status = p.id_status where p.id_status='1'";
	$query_listar=mysqli_query($conecta, $listar_pedidos);
	$row=mysqli_num_rows($query_listar);

	if($query_listar){

echo"<table border='1'>";

	echo "<tr>";
	echo"<td><b>Loja</b></td>";
	echo "<td><b>OS</b></td>";
	echo"<td><b>Valor Total</b></td>";
	echo"<td><b>Cliente</b></td>";
	echo "<td><b>Data Saida/loja</b></td>";
	echo "<td><b>Status</b></td>";
	
	echo "<td><b>Visualizar OS</b></td>";
	echo "<td><b>Receber</b></td>

	</tr>";

	while($lista_de_pedidos=mysqli_fetch_array($query_listar)){

		$loja=$lista_de_pedidos['nome_loja'];
		$os=$lista_de_pedidos['os'];
		$data_loja=$lista_de_pedidos['data_loja'];
		$data_lab=isset($lista_de_pedidos['data_lab'])?$lista_de_pedidos['data_lab']:'';
		$data_encad=$lista_de_pedidos['data_encad'];
		$cliente=$lista_de_pedidos['cliente'];
		$id_pedido=$lista_de_pedidos['id_pedido'];
		$status=$lista_de_pedidos['status'];
		$valor=$lista_de_pedidos['valor'];


		
		echo "<td>$loja</td>";
		echo"<td>$os</td>";
		echo"<td>R$ ".$valor."</td>";
		echo"<td>".mb_strtoupper($cliente)."</td>";
		echo"<td>".date('d-m-Y', strtotime($data_loja))."</td>";
		echo"<td><span class='red'>$status</span></td>";
		
		
		echo"<td><a href='os_visualizacao.php?id=".$id_pedido."'>Visualizar</a></td>";
		echo "<td><a href='minilab.php?os=$os'><img src='imagens/edit.png' width='25px'></a></td>";
		echo"</tr>";


		
	}


	}
	else{
		echo mysqli_error($conecta);
	}



		

	



?>


	</table>


	
</div>
</body>
</html>