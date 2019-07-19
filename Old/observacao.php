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

		
		$busca_lojas="SELECT e.loja_id, l.loja_nome, e.os_alb, e.data_envio_loja,e.status,e.data_recebe_lab,e.status_receb,e.observacao FROM  entrega_alb as e join lojas as l on l.loja_id=e.loja_id and  os_alb='$os' order by e.data_envio_loja desc";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){
			
			$lojan=$lista_loja['loja_nome'];
			$id_loja=$lista_loja['loja_id'];
			$oss=$lista_loja['os_alb'];
			$data_env_lj=$lista_loja['data_envio_loja'];
			$statuss=$lista_loja['status'];
			$stat=$lista_loja['status_receb'];
			$data_receb_lab=$lista_loja['data_recebe_lab'];
			$data_receb_enc=isset($lista_loja['data_recebe_enca'])?$lista_loja['data_recebe_enca']:" ";
			$data_envia_enc=isset($lista_loja['data_envio_enca'])?$lista_loja['data_envio_enca']:" ";
			$observa=isset($lista_loja['observacao'])?$lista_loja['observacao']:"";
		}
?>
<!DOCTYPE html>
<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Entrada Albuns</title>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">

<a href="receber_lab.php"><button id="btnx" style="margin-top:10px;">X</button></a>

	<h1>Entrada de Albuns (Laboratório)</h1>

	<form name="form" action="processa_devolucao.php" method="POST" id="formobs">
		
		<?php
			
	
				echo "<input type='hidden' value='$id_loja' name='idloja'>
		Loja: <input type='text' name='n_loja' value='$lojan ' readonly size='25'><br><br>
		Os: <input type='text' name='os' value='$oss' readonly required size='8'><br><br>
		Data de Envio: <input type='date' name='data_envio'  value='$data_env_lj'readonly required><br><br>
		Status da Os: <select name='status'><option value='$stat'>$stat</option>
		<option value='Recebido'>Recebido</option>
											<option value='Devolvido'>Devolvido</option>
											</select><br><br>
		Observações: <textarea name='observa' id='txtarea' placeholder='$observa'></textarea>
			<hr>				
		<br><br>
		Confirma alteração: <button id='bt'><img src='imagens/visto.png' width=20px></button>";
		?>
		<br><br>
				
	</form>
</div>
</body>
</html>