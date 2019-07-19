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

			setTimeout("window.location='receber_encad.php'", 2000);

		}
	

	</script>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">
		<a href="receber_encad.php"><img src="imagens/sair.png" id="sair" title="Sair" onclick="voltar()"></a>
		<a href="relatorio.php"><img src="imagens/exportar.png" id="btexport" title="Exportar"></a>
		<h1>Entrada de Albuns - (recebidos)</h1>

<?php

	$os=isset($_POST['osfoto'])?$_POST['osfoto']:"";
	
	$data=$_POST['data_encad'];
	$datalab=isset($_POST['datalab'])?$_POST['datalab']:"";

	if ($datalab == null | $datalab==0){

		echo "<center><img src='imagens/alert.png' width='50px'><p> A OS $os, ainda não foi recebida no laboratório!!</center>";
		echo"<script>voltar()</script>";
		exit();

	}else{


		$atualizar="UPDATE pedido set 	data_encad='$data', id_status='3' where os_fotografia='$os'";
	$query_atualiza=mysqli_query($conecta, $atualizar);



	if ($query_atualiza){


		
		
	}
	else{

		echo mysqli_error($conecta);
	}



$lista_recebimento="SELECT l.nome_loja, p.os, p.data_loja, s.status,p.data_lab, p.data_encad FROM pedido as p join lojas as l on l.id_loja=p.id_loja join status as s on s.id_status=p.id_status and p.id_status='3'order by p.data_loja desc"; 

$query_recebimento=mysqli_query($conecta, $lista_recebimento);

echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</td>";
		echo"<td><b>Os</td>";
		echo"<td><b>Data de Envio</td>";
		echo"<td><b>Status</td>";
		echo"<td><b>Recebimento Minilab</td>";
		echo"<td><b>Recebimento Encadernadora</b></td>";
		echo"</tr>";

while($mostra_recebidos=mysqli_fetch_array($query_recebimento)){



	$loja=$mostra_recebidos['nome_loja'];
	$os=$mostra_recebidos['os'];
	$dat_envio=$mostra_recebidos['data_loja'];
	$status=$mostra_recebidos['status'];
	$data_recebe_lab=$mostra_recebidos['data_lab'];
	

	$data_receb_enca=$mostra_recebidos['data_encad'];


	echo"<tr>";
			echo"<td>$loja</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-y',strtotime($dat_envio))."</td>";
			echo"<td><span class='red'>$status</span></td>";
			
			echo"<td>".date('d-m-Y', strtotime($data_recebe_lab))."</td>";
			echo"<td>".date('d-m-Y', strtotime($data_receb_enca))."</td>";
			echo"</tr>";
			
}


	}

	
echo"</table>";


?>
			
	
	
	
</div>
</body>
</html>