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
	<script type="text/javascript">
		
		function voltar(){

			setTimeout("window.location='receber_lab.php'", 2000);

		}

	</script>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">
		<img src="imagens/sair.png" id="sair" title="Sair" onclick="voltar()">
		<a href="relatorio.php"><img src="imagens/exportar.png" id="btexport" title="Exportar"></a>
		<h1>Entrada de Albuns - (Laboratório)</h1>

<?php

	$os=isset($_POST['os'])?$_POST['os']:"";
	
	$data=isset($_POST['data_lab'])?$_POST['data_lab']:"";

	$atualizar="UPDATE pedido set 	data_lab='$data', id_status='2' where os='$os'";
	$query_atualiza=mysqli_query($conecta, $atualizar);



	if ($query_atualiza){


		
		
	}
	else{

		echo mysqli_error($conecta);
	}



$lista_recebimento="SELECT l.nome_loja, p.os, p.data_loja,  p.data_encad, sp.statuspg, s.status, p.data_lab FROM pedido as p join lojas as l on l.id_loja=p.id_loja join status as s on s.id_status=p.id_status join status_pag as sp on sp.id_pagamento= p.status_pag  where p.id_status in ('3','2') order by p.data_loja desc"; 

$query_recebimento=mysqli_query($conecta, $lista_recebimento);

echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</td>";
		echo"<td><b>Os</td>";
		echo"<td><b>Data de Envio</td>";
		echo"<td><b>Status da OS</td>";
		echo"<td><b>Status</td>";
		echo"<td><b>Recebimento Minilab</td>";
		#echo"<td><b>Recebimento Encadernadora</td>";
		#echo"<td><b>Enviar P/ Loja</td>";
		echo"</tr>";

while($mostra_recebidos=mysqli_fetch_array($query_recebimento)){



	$loja=$mostra_recebidos['nome_loja'];
	$os=$mostra_recebidos['os'];
	$dat_envio=$mostra_recebidos['data_loja'];
	$status=$mostra_recebidos['status'];
	$data_recebe_lab=$mostra_recebidos['data_lab'];
	$statuspg=$mostra_recebidos['statuspg'];
	
	


	echo"<tr>";
			echo"<td>$loja</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-Y',strtotime($dat_envio))."</td>";
			echo"<td>$statuspg</td>";
			echo"<td><span class='red'>$status</span></td>";
			echo"<td>$data_recebe_lab</td>";
			#echo"<td>$data_receb_enca</td>";
			#echo"<td><a href='envioloja.php?os=$os'><img src='imagens/seta2.png' width=10px id='bt'></a></td>";
			echo "</tr>";
}
echo "</table><br>";


?>
			

	<!--<a href="receber_lab.php"><button id="btn">Voltar</button></a><br><br>-->
	
</div>
</body>
</html>