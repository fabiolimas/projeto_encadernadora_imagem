<?php
session_start();
		include('conexao.php');

		if((!isset ($_SESSION['usuario'])== true) and (!isset ($_SESSION['senha'])== true)){

			unset ($_SESSION['usuario']);
			unset($_SESSION['senha']);
			header('location:index.php');


		}
		$logado=$_SESSION['usuario'];
		
				

		

		$os=isset($_GET['os'])?$_GET['os']:"";

		
		$busca_lojas="SELECT e.loja_id, l.loja_nome, e.os_alb, e.data_envio_loja, e.status,e.data_recebe_lab FROM  entrega_alb as e join lojas  as l on l.loja_id=e.loja_id and  os_alb='$os' order by e.data_envio_loja desc";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){
			
			$lojan=$lista_loja['loja_nome'];
			$id_loja=$lista_loja['loja_id'];
			$oss=$lista_loja['os_alb'];
			$data_env_lj=$lista_loja['data_envio_loja'];
			$statuss=$lista_loja['status'];
			$datalab=$lista_loja['data_recebe_lab'];
			$data_receb_enc=isset($lista_loja['data_recebe_enca'])?$lista_loja['data_recebe_enca']:" ";
			$data_envia_enc=isset($lista_loja['data_envio_enca'])?$lista_loja['data_envio_enca']:" ";
		}
?>
<!DOCTYPE html>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Saida Albuns</title>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">



	<h1>Entrada de Albuns</h1>

	<form name="form" action="processa_recebimento.php" method="POST">
		
		<?php
			
	
				echo "<input type='hidden' value='$id_loja' name='idloja'>
		Loja: <input type='text' name='n_loja' value='$lojan ' readonly size='25'>
		Os: <input type='text' name='os' value='$oss' readonly required size='8'>
		Data de Envio: <input type='text' name='data_envio'  value=".date('d-m-Y',strtotime($data_env_lj))." size='8' readonly >
		Entrada Lab: <input type='text' name='datalab' value='$datalab'size='8' readonly>
		Status da Os: <input type='text' value='$statuss' readonly size='8'>
		
			<hr>				
		<br><br>
		Confirma Recebimento: <button id='bt'><img src='imagens/visto.png' width=20px></button>";
		?>
		<br><br>
				
	</form>
</div>
</body>
</html>