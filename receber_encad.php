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
<a href="relatorio.php"><img src="imagens/exportar.png" id="btexport" title="Exportar"></a>


	<h1>Entrada de Albuns - (Encadernadora)</h1>


<form name="form_busca" action="busca_encad.php" method="post" style="padding:10px;">
<fieldset style="padding: 10px;"><legend>Filtrar</legend>
	
	Loja/Cliente/OS: <input type="text" name="clientes">
	
	<input type="submit" value="Buscar" id="btn">
</fieldset>
</form>
<a href='recebidos_enc.php'><button id='btn'>Recebidos</button></a>
<br><br>
	<table>

<?php
	

	$listar_envios="SELECT p.id_pedido, p.id_loja, l.nome_loja, p.cliente,p.os_fotografia, stp.statuspg, p.os, p.data_loja, s.status, p.data_lab FROM pedido as p join lojas as l on l.id_loja=p.id_loja join status as s on s.id_status=p.id_status join status_pag as stp on stp.id_pagamento=p.status_pag where p.id_status='2' ";
		$query_envios=mysqli_query($conecta, $listar_envios);
		$row=mysqli_num_rows($query_envios);

		if ($row == 0){

			echo "Nenhuma OS pendente para rebimento";


		}else{

			echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</b></td>";
		echo"<td><b>Os Encad.</b></td>";
		echo"<td><b>Status OS</b></td>";
		echo"<td><b>Cliente</b></td>";
		echo"<td><b>Data de Envio</b></td>";
		
		echo"<td><b>Recebimento Minilab</td>";
		echo"<td><b>Status/Recebimento</b></td>";
		echo"<td><b>Visualizar OS</b></td>";
		echo"<td><b>Receber Encadernadora</b></td>";
		
		echo"</tr>";

		while ($lista_de_envios=mysqli_fetch_array($query_envios)){

			$lojan=$lista_de_envios['nome_loja'];
			$loja=$lista_de_envios['id_loja'];
			$os=$lista_de_envios['os'];
			$data_envs=$lista_de_envios['data_loja'];
			$status_env=$lista_de_envios['status'];
			$data_recebe_lab=$lista_de_envios['data_lab'];
			$cliente=$lista_de_envios['cliente'];
			$osfoto=$lista_de_envios['os_fotografia'];
			$id=$lista_de_envios['id_pedido'];
			$statuspg=$lista_de_envios['statuspg'];


			
					

			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$os</td>";
			echo"<td>$statuspg</td>";
			echo"<td>".mb_strtoupper($cliente)."</td>";
			echo"<td>".date('d-m-Y', strtotime($data_envs))."</td>";			
			echo"<td id='datalab'>".date('d-m-Y', strtotime($data_recebe_lab))."</td>";
			echo"<td><span class='red'>".$status_env."</span></td>";
			echo"<td><a href='os_visualizacao.php?id=$id'>Visualizar</a></td>";			
			echo"<td ><a href='encadernadora.php?os=$osfoto'><img src='imagens/edit.png' width=10px id='bt' ></a></td>";
			echo"</tr>";
			

			
					

					}


		}

			

		

		

			


?>


	</table>


	
</div>
</body>
</html>