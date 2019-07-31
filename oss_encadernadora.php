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
	
	<div id="interface1">
		<img src="imagens/logo.png" id="logo">

		<a href='logout.php'><img src="imagens/sair.png" id="sair" title="Sair"></a>


	<?php

	$total="SELECT * FROM pedido";
	$query_total=mysqli_query($conecta, $total);
	$rows=mysqli_num_rows($query_total);

	for($i=0;$i<=6;$i++){

		$loja[$i]="SELECT * FROM pedido where id_loja='$i'";
		$query_loja[$i]=mysqli_query($conecta, $loja[$i]);
		$row_loja[$i]=mysqli_num_rows($query_loja[$i]);
	}




	?>

	<h1>DashBoard</h1>

	<div id="contadores">
		<ul id="conts">
			<center><li class='total'>Albuns<br>
				<?php echo "<br><center><h1>$rows</h1></center>";?>

			</li><br></center>
			<li class="petrolina">Petrolina Centro
			<?php echo "<br><br><center><h1>$row_loja[3]</h1></center>";?>

			</li>
			<li class="river">River
				<?php echo "<br><br><center><h1>$row_loja[4]</h1></center>";?>
			</li>
			<li class='juaziero'>Juazeiro
				<?php echo "<br><br><center><h1>$row_loja[2]</h1></center>";?>
			</li>
			<li class='bonfim'>Senhor do Bonfim
				<?php echo "<br><br><center><h1>$row_loja[6]</h1></center>";?></li>
			<li class="capimg">Capim Grosso
			<?php echo "<br><br><center><h1>$row_loja[5]</h1></center>";?>
			</li>
			<li class="jacobina">Jacobina
				<?php echo "<br><br><center><h1>$row_loja[1]</h1></center>";?>
			</li>



		</ul>
	</div>
<a href="relatorio.php"><img src="imagens/exportar.png" id="btexport" title="Exportar"></a>
<form name="form_busca" action="busca_encad.php" method="post" style="padding:10px;">
<fieldset style="padding: 10px;"><legend>Filtrar</legend>
	
	Loja/Cliente/OS: <input type="text" name="clientes">
	
	<input type="submit" value="Buscar" id="btn">
</fieldset>
</form>

<br><br>
	<table>

<?php
	

	$listar_envios="SELECT p.id_pedido, p.id_loja, l.nome_loja, p.cliente,p.os_fotografia,p.valor, stp.statuspg, p.os, p.data_loja, s.status, p.data_lab FROM pedido as p join lojas as l on l.id_loja=p.id_loja join status as s on s.id_status=p.id_status join status_pag as stp on stp.id_pagamento=p.status_pag order by p.id_pedido desc LIMIT 50 ";
		$query_envios=mysqli_query($conecta, $listar_envios);
		$row=mysqli_num_rows($query_envios);

		if ($row == 0){

			echo "<p>Nenhuma OS pendente para rebimento</p>";


		}else{

			echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</b></td>";
		echo "<td><b>Os Fotografia</b></td>";
		echo"<td><b>Os Encad.</b></td>";
		echo"<td><b>Valor</b></td>";
		echo"<td><b>Status OS</b></td>";
		echo"<td><b>Cliente</b></td>";
		echo"<td><b>Data de Envio</b></td>";
		echo"<td><b>Status/Recebimento</b></td>";
		echo"<td><b>Visualizar OS</b></td>";
		
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
			$valor=$lista_de_envios['valor'];


			if(strlen($valor)>=6){
		$valor2=substr_replace($valor,',',3,1);
	}else if(strlen($valor)==2){
		$valor2=substr_replace($valor,',',2,1);

	}else if(strlen($valor)==3){
		$valor2=substr_replace($valor, ',',4,1);
	}


	$new_cliente=explode(' ', $cliente)[0];
			
					

			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$osfoto</td>";
			echo"<td>$os</td>";
			echo"<td>R$ $valor2</td>";
			echo"<td>$statuspg</td>";
			echo"<td>".mb_strtoupper($new_cliente)."</td>";
			echo"<td>".date('d-m-Y', strtotime($data_envs))."</td>";			
			echo"<td><span class='red'>".$status_env."</span></td>";
			echo"<td><a href='os_visualizacao.php?id=$id'>Visualizar</a></td>";			
			
			echo"</tr>";
			

			
					

					}


		}

			

		

		

			


?>


	</table>


	
</div>
</body>
</html>