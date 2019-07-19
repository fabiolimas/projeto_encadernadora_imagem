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

			setTimeout("window.location='receber.php'", 2000);

		}

	</script>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">
		<a href='logout.php'><img src="imagens/sair.png" id="sair" title="Sair"></a>
		<a href="relatorio.php"><img src="imagens/exportar.png" id="btexport" title="Exportar"></a>
		<h1>Entrada de Albuns - (Laboratório)</h1>

<?php

	$os=isset($_POST['os'])?$_POST['os']:"";
	
	$data=date('d-m-Y');

	$atualizar="UPDATE entrega_alb set 	data_recebe_lab='$data', status_receb='<span class=stat2>Recebido-LAB</span>' where os_alb='$os'";
	$query_atualiza=mysqli_query($conecta, $atualizar);



	if ($query_atualiza){


		
		
	}
	else{

		echo mysqli_error($conecta);
	}



$lista_recebimento="SELECT l.loja_nome, e.os_alb, e.data_envio_loja, e.status, e.data_recebe_enca, e.status_receb, e.data_recebe_lab,e.observacao FROM entrega_alb as e join lojas as l on l.loja_id=e.loja_id and e.status_receb='<span class=stat2>Recebido-LAB</span>' order by e.data_envio_loja desc"; 

$query_recebimento=mysqli_query($conecta, $lista_recebimento);

echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</td>";
		echo"<td><b>Os</td>";
		echo"<td><b>Data de Envio</td>";
		echo"<td><b>Status da OS</td>";
		echo"<td><b>Status</td>";
		echo"<td><b>Recebimento Minilab</td>";
		echo"<td><b>Observações</td>";
		#echo"<td><b>Recebimento Encadernadora</td>";
		#echo"<td><b>Enviar P/ Loja</td>";
		echo"</tr>";

while($mostra_recebidos=mysqli_fetch_array($query_recebimento)){



	$loja=$mostra_recebidos['loja_nome'];
	$os=$mostra_recebidos['os_alb'];
	$dat_envio=$mostra_recebidos['data_envio_loja'];
	$status=$mostra_recebidos['status'];
	$status_enca=$mostra_recebidos['status_receb'];
	$data_recebe_lab=$mostra_recebidos['data_recebe_lab'];
	$data_receb_enca=$mostra_recebidos['data_recebe_enca'];
	$observa=$mostra_recebidos['observacao'];


	echo"<tr>";
			echo"<td>$loja</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-Y',strtotime($dat_envio))."</td>";
			echo"<td>$status</td>";
			echo"<td>$status_enca</td>";
			echo"<td>$data_recebe_lab</td>";
			echo"<td>$observa</td>";
			#echo"<td>$data_receb_enca</td>";
			#echo"<td><a href='envioloja.php?os=$os'><img src='imagens/seta2.png' width=10px id='bt'></a></td>";
}



?>
			
	</form>
	<a href="receber_lab.php"><button id="btn">Voltar</button></a><br><br>
	
</div>
</body>
</html>