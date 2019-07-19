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
		<a href="relatorio.php"><img src="imagens/exportar.png" id="btexport"></a>
		<h1>Albuns Enviados</h1>

<?php

	$os=isset($_POST['os'])?$_POST['os']:"";
	
	$data=date('d-m-Y');

	$atualizar="UPDATE entrega_alb set 	data_envio_enca='$data', status_receb='<span class=stat4>Enviado</span>' where os_alb='$os'";
	$query_atualiza=mysqli_query($conecta, $atualizar);



	if ($query_atualiza){


		
		#echo "<script>voltar()</script>";
	}
	else{

		echo mysqli_error($conecta);
	}



$lista_recebimento="SELECT l.loja_nome, e.os_alb, e.data_envio_loja, e.status,e.data_recebe_lab, e.data_recebe_enca, e.status_receb, e.data_envio_enca FROM entrega_alb as e join lojas as l on l.loja_id=e.loja_id and e.status_receb='<span class=stat4>Enviado</span>' order by e.data_envio_loja desc "; 

$query_recebimento=mysqli_query($conecta, $lista_recebimento);

echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</b></td>";
		echo"<td><b>Os</b></td>";
		echo"<td><b>Data de Envio</b></td>";
		echo"<td><b>Status da OS</b></td>";
		echo"<td><b>Recebimento Minilab</td>";
		echo"<td><b>Recebimento Encadernadora</b></td>";
		echo"<td><b>Data Saida</b></td>";
		echo"<td><b>Status</b></td>";

		echo"</tr>";

while($mostra_recebidos=mysqli_fetch_array($query_recebimento)){



	$loja=$mostra_recebidos['loja_nome'];
	$os=$mostra_recebidos['os_alb'];
	$dat_envio=$mostra_recebidos['data_envio_loja'];
	$status=$mostra_recebidos['status'];
	$status_rec=$mostra_recebidos['status_receb'];
	$data_receb_enca=$mostra_recebidos['data_recebe_enca'];
	$data_envio_enca=$mostra_recebidos['data_envio_enca'];
	$data_recebe_lab=$mostra_recebidos['data_recebe_lab'];


	echo"<tr>";
			echo"<td>$loja</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-Y',strtotime($dat_envio))."</td>";
			echo"<td>$status</td>";
			echo"<td>$data_recebe_lab</td>";
			echo"<td>$data_receb_enca</td>";
			echo"<td>$data_envio_enca</td>";
			echo "<td>$status_rec</td>";
			
}



?>

	

	
				
	</form>
	<a href="receber.php"><button id="btn">Voltar</button></a>

</div>
</body>
</html>