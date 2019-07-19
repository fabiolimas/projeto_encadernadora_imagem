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
				history.back();
		}

	</script>
	<title>Os's Enviadas</title>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">


<img src="imagens/sair.png" id="sair2" title="Sair" onclick="volta()">
	<h1>Os's Enviadas</h1>

	<h3>Histórico</h3>

	<form name="consulta" action="consulta_os.php" method="post">

		<fieldset style="padding:10px;"><legend>Buscar OS</legend>

			Número da Os: <input type="text" name="numero_os">

			<input type="submit" value="Buscar" id="btn"><br>


		</fieldset>

	</form>
	<br><br>

	<?php

				$loja=isset($_POST['lojas'])?$_POST['lojas']:"";

		$select_loja="SELECT e.loja_id, l.loja_nome, e.os_alb, e.data_envio_loja,e.status, e.status_receb,e.data_recebe_lab, e.data_recebe_enca, e.data_envio_enca  FROM entrega_alb as e join lojas as l on e.loja_id = l.loja_id and e.loja_id='$loja' order by e.data_envio_loja desc";
		$query_select=mysqli_query($conecta, $select_loja);
		
		

		echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td  ><b>Loja</td>";
		echo"<td><b>Os</td>";
		echo"<td><b>Envio P/ Encadernadora</td>";
		echo"<td><b>Status da OS</td>";
		echo"<td><b>Status</td>";
		echo"<td><b>Recebido no Laboratório</td>";
		echo"<td><b>Recebido na Encadernadora </td>";
			echo"<td><b>Enviado da Encadernadora </td>";
			echo"<td><b>Alterar Status OS</td>";
		echo"</tr></b>";

		while ($lista_de_envios=mysqli_fetch_array($query_select)){

			$lojan=isset($lista_de_envios['loja_nome'])?$lista_de_envios['loja_nome']:"";
			$loja=$lista_de_envios['loja_id'];
			$os=$lista_de_envios['os_alb'];
			$data_envs=$lista_de_envios['data_envio_loja'];
			$status_env=$lista_de_envios['status'];
			$recebido=$lista_de_envios['status_receb'];
			$recebido_d=$lista_de_envios['data_recebe_enca'];
			$enviado=isset($lista_de_envios['data_envio_enca'])?$lista_de_envios['data_envio_enca']:"";
			$recebe_lab=$lista_de_envios['data_recebe_lab'];


			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-Y',strtotime($data_envs))."</td>";
			echo"<td>$status_env</td>";
			echo"<td>$recebido</td>";
			echo"<td>$recebe_lab</td>";
			echo"<td>$recebido_d</td>";
			echo"<td>$enviado</td>";
			echo"<td><a href='edita_status.php?os=$os'><img src='imagens/edit.png' id='edit'></a></td>";		}



				

			
$rows=mysqli_num_rows($query_select);

if($rows == 0){

	echo"Nenhuma OS encontrada";
}else{
	echo " $rows Albuns Enviados - $lojan<hr> ";
}

	

		
	?>
	<p><br>

<br><br>
</div>
</body>
</html>