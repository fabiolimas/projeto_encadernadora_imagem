<?php

		include('conexao.php');

			
				
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script type="text/javascript">
		
		function volta(){

			setTimeout("history.back()",2000);
		}

		
	</script>
	<title>Saida Albuns</title>
</head>
<body >
	<img src="imagens/logo.png" id="logo">
	<div id="interface">



	<h1>Saida de albuns</h1>
	<h3>Histórico</h3>

	<?php

			$os=$_POST['os'];
			$data_env=date('d-m-Y');
			$status=$_POST['status'];
			$loja=$_POST['loja_val'];


				$busca="SELECT * FROM entrega_alb WHERE os_alb='$os'";
				$query_busca=mysqli_query($conecta, $busca);

				$row=mysqli_num_rows($query_busca);
				

				if($row >=1){

					echo "Os ja cadastrada anteriormente.";
					echo "<script>volta()</script>";
					die;
				}

				else{


					$insert="INSERT INTO `entrega_alb` (`entrega_id`, `loja_id`, `os_alb`, `data_envio_loja`, `status`, `data_recebe_lab`,`status_receb`, `data_recebe_enca`, `data_envio_enca`, `observacao`) VALUES(NULL,'$loja','$os','$data_env','$status','','<span class=stat1>Não Recebido</span>','','','')";
		$query_insert=mysqli_query($conecta, $insert);

		if ($query_insert){

			echo"";

		}
		else{
			echo mysqli_error($conecta);
		}


		$listar_envios="SELECT entrega_alb.loja_id, lojas.loja_nome, entrega_alb.os_alb, entrega_alb.data_envio_loja, entrega_alb.status,  entrega_alb.status_receb FROM entrega_alb join lojas on lojas.loja_id=entrega_alb.loja_id and entrega_alb.loja_id='$loja' order by data_envio_loja desc";
		$query_envios=mysqli_query($conecta, $listar_envios);

		

		echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td  ><b>Loja</td>";
		echo"<td><b>Os</td>";
		echo"<td><b>Data de Envio</td>";
		echo"<td><b>Status da OS</td>";
		echo"<td><b>Recebido</td>";
		echo"</tr>";

		while ($lista_de_envios=mysqli_fetch_array($query_envios)){

			$lojan=$lista_de_envios['loja_nome'];
			$loja=$lista_de_envios['loja_id'];
			$os=$lista_de_envios['os_alb'];
			$data_envs=$lista_de_envios['data_envio_loja'];
			$status_env=$lista_de_envios['status'];
			$recebido=$lista_de_envios['status_receb'];


			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-Y',strtotime($data_envs))."</td>";
			echo"<td>$status_env</td>";
			echo"<td>$recebido</td>";
			

					}



				}

			
$rows=mysqli_num_rows($query_envios);

		echo " $rows Albuns Enviados - $lojan<hr> ";

		
	?>
	<p><br>
<a href="index_loja.php"><button id="btn">Lançar Novo</button></a>
<br><br>
</div>
</body>
</html>