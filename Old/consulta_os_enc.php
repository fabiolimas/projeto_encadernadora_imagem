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

			setTimeout("history.back()",5000);
		}

		function voltav(){

			history.back();
		}
	</script>
	<title>Os's Enviadas</title>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	<div id="interface">


<a href="#"><img src="imagens/sair.png" id="sair2" title="Sair"  onclick="voltav()"></a>
	<h1>Os's Enviadas</h1>

	<h3>Histórico</h3>

	
	<?php

				$os=$_POST['numero_os'];

		$select_loja="SELECT e.loja_id, l.loja_nome, e.os_alb, e.data_envio_loja,e.status,e.data_recebe_lab, e.status_receb, e.data_recebe_enca, e.data_envio_enca  FROM entrega_alb as e join lojas as l on e.loja_id = l.loja_id and e.os_alb='$os' order by e.data_envio_loja desc";
		$query_select=mysqli_query($conecta, $select_loja);
		$row=mysqli_num_rows($query_select);

		if ($row == 0){


			echo "Número de OS desconhecido. OS informada ($os)";
			echo "<script>volta()</script>";


		}else{


		

		
		

		echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<b><tr>";
		echo"<td><b>Loja</td>";
		echo"<td><b>Os</td>";
		echo"<td><b>Enviado</td>";
		echo"<td><b>Status da OS</td>";
		echo"<td><b>Status</td>";
		echo"<td><b>Recebido no Laboratório</td>";
		echo"<td><b>Recebido na Encadernadora </td>";
			echo"<td><b>Enviar P/Loja</td>";
		echo"</tr></b>";

		while ($lista_de_envios=mysqli_fetch_array($query_select)){

			$lojan=$lista_de_envios['loja_nome'];
			$loja=$lista_de_envios['loja_id'];
			$os=$lista_de_envios['os_alb'];
			$data_envs=$lista_de_envios['data_envio_loja'];
			$status_env=$lista_de_envios['status'];
			$recebido=$lista_de_envios['status_receb'];
			$recebido_d=$lista_de_envios['data_recebe_enca'];
			$enviado=isset($lista_de_envios['data_envio_enca'])?$lista_de_envios['data_envio_enca']:"";
			$receb_lab=$lista_de_envios['data_recebe_lab'];


			echo"<tr>";
			echo"<td>$lojan</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-y',strtotime($data_envs))."</td>";
			echo"<td>$status_env</td>";
			echo"<td>$recebido</td>";
			echo"<td>$receb_lab</td>";
			echo"<td>$recebido_d</td>";
			echo"<td><a href='envioloja.php?os=$os'><img src='imagens/seta2.png' width=10px id='bt'></a></td>";			}



				

			

}
		
	?>
	<p><br>

<br><br>
</div>
</body>
</html>