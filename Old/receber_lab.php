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


				$id_l=$busca_lista['loja_id'];
				$nome_loja=$busca_lista['loja_nome'];

				echo "<option value='$id_l'>$nome_loja</option>";
			}
		?>
	</select>

	
	<input type="submit" value="Buscar" id="btn">
</fieldset>
</form>
<a href="processa_recebimento_lab.php"><button id="btn">Recebidas</button></a>

<br><br>
	<table>

<?php
	

	$listar_envios="SELECT entrega_alb.loja_id, lojas.loja_nome, entrega_alb.os_alb, entrega_alb.data_envio_loja, entrega_alb.status,entrega_alb.data_recebe_lab, entrega_alb.status_receb FROM entrega_alb join lojas on lojas.loja_id=entrega_alb.loja_id  and entrega_alb.status_receb='<span class=stat1>Não Recebido</span>'order by entrega_alb.data_envio_loja desc  ";
		$query_envios=mysqli_query($conecta, $listar_envios);

		$row=mysqli_num_rows($query_envios);

		if ($row == 0){


			echo "Nenhuma OS pendente para recebimento.";
		}
		else{

			echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</b></td>";
		echo"<td><b>Os</b></td>";
		echo"<td><b>Data de Envio</b></td>";
		echo"<td><b>Status da OS</b></td>";
		echo"<td><b>Status</b></td>";
		#echo"<td><b>Recebimento Minilab";
		echo"<td><b>Receber</b></td>";
		echo"<td><b>Observações</td>";
		echo"</tr>";

		while ($lista_de_envios=mysqli_fetch_array($query_envios)){

			$lojan=$lista_de_envios['loja_nome'];
			$loja=$lista_de_envios['loja_id'];
			$os=$lista_de_envios['os_alb'];
			$data_envs=$lista_de_envios['data_envio_loja'];
			$status_env=$lista_de_envios['status'];
			#$recebe_lab=$lista_de_envios['data_recebe_lab'];
			$receber=$lista_de_envios['status_receb'];



			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-Y', strtotime($data_envs))."</td>";
			echo"<td>$status_env</td>";
			echo"<td>$receber</td>";
			#echo"<td>$recebe_lab</td>";
			echo"<td><a href='minilab.php?os=$os'><img src='imagens/seta.png' width=10px id='bt'></a></td>";
			echo"<td><a href='observacao.php?os=$os'><img src='imagens/edit.png' id='edit'></td>";

			
					}

			
		}

		
?>


	</table>


	
</div>
</body>
</html>