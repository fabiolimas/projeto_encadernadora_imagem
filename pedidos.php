<?php

		include('conexao.php');

		$loja=isset($_POST['lojas'])?$_POST['lojas']:"";
		$busca_lojas="SELECT * FROM  lojas WHERE id_loja='$loja'";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){

			$id_loja=isset($lista_loja['id_loja'])?$lista_loja['id_loja']:"";
			$nome_loja=isset($lista_loja['nome_loja'])?$lista_loja['nome_loja']:"";
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Saida Albuns</title>
	<script type="text/javascript">
		

		function voltar(){

			setTimeout("history.back()",3000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	<img src="imagens/logo.png" id="logo">
	<div id="interface">


<a href="index_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>

	<h1>Encadernadora</h1>
			
			
<?php

	$listar_pedidos="SELECT p.id_pedido, l.nome_loja, p.os, p.cliente, p.data_loja, p.data_lab, p.data_encad   FROM pedido as p join lojas as l on p.id_loja=l.id_loja";
	$query_listar=mysqli_query($conecta, $listar_pedidos);

	if($query_listar){

echo"<table border='1'>";
	echo "<tr><td>Loja</td>";
	echo "<td>OS</td>";
	echo"<td>Cliente</td>";
	echo "<td>Data Saida/loja</td>";
	echo "<td>Data Entrada/Lab</td>";
	echo "<td>Data Entrada/Encadernadora</td>";
	echo "<td>Visualizar OS</td></tr>";

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


	}
	else{
		echo mysqli_error($conecta);
	}



		

	



?>
	

</div>
</body>
</html>