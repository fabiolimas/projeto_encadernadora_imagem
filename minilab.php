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

		
		$busca_lojas="SELECT p.id_loja, l.nome_loja,p.os_fotografia, p.os, p.data_loja,s.status,p.data_lab FROM  pedido as p join lojas as l on l.id_loja=p.id_loja and  os='$os' join status as s on s.id_status= p.id_status order by p.data_loja desc";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){
			
			$lojan=$lista_loja['nome_loja'];
			$id_loja=$lista_loja['id_loja'];
			$oss=$lista_loja['os'];
			$data_env_lj=$lista_loja['data_loja'];
			$statuss=$lista_loja['status'];
			$data_receb_lab=$lista_loja['data_lab'];
			$data_receb_enc=isset($lista_loja['data_encad'])?$lista_loja['data_encad']:" ";
			$data_envia_enc=isset($lista_loja['data_encad'])?$lista_loja['data_encad']:" ";
			$osfoto=$lista_loja['os_fotografia'];
		}
?>
<!DOCTYPE html>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Entrada Albuns</title>
	<script type="text/javascript">
		

		function voltar(){

			setTimeout("history.back()",1000);
		}
	</script>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">
		<img src="imagens/sair.png" id="sair2" title="Sair" onclick="voltar()">



	<h1>Entrada de Albuns (Laboratório)</h1>

	<form name="form" action="processa_recebimento_lab.php" method="POST" id="encadernadora">
		
		<?php
			
	
				echo "<input type='hidden' value='$id_loja' name='idloja'>

		Loja: <input type='text' name='n_loja' value='$lojan ' readonly size='25'><br>
		Os da Fotografia: <input type='text' name='osfoto' value='$osfoto' readonly required><br>
		Os da Encadernadora: <input type='text' name='os' value='$oss' readonly required size='8'><br>
		Data de Envio: <input type='text' name='data_envio'  value=".date('d-m-Y',strtotime($data_env_lj))." readonly required><br>
		Entrada no Minilab: <input type='date' name='data_lab' required>
		Status da Os: <input type='text' value='$statuss' readonly size='25'>
			<hr>				
		<br><br>
		<span class='red'>Confirma Recebimento:</span> <button id='bt'><img src='imagens/visto.png' width=20px></button>";
		?>
		<br><br>
				
	</form>
</div>
</body>
</html>