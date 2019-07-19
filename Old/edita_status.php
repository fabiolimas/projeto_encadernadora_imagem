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
	<h1>Alteração de Status</h1>

	

	<form name="form_altera" action="altera_status.php" method="post">

		<?php
			
			$os=$_GET['os'];

			$edita="SELECT e.loja_id, l.loja_nome, e.os_alb, e.data_envio_loja, e.status FROM  entrega_alb as e join lojas as l on e.loja_id=l.loja_id WHERE os_alb='$os'";
			$queri_edit=mysqli_query($conecta,$edita);

			while($edit_loja=mysqli_fetch_array($queri_edit)){

				$id=$edit_loja['loja_id'];
				$loja=$edit_loja['loja_nome'];
				$os_a=$edit_loja['os_alb'];
				$daten=$edit_loja['data_envio_loja'];
				$stat=$edit_loja['status'];


				echo "<input type='hidden' value='$id' name='loja_val'>
		Loja: <input type='text' name='n_loja' value='$loja' readonly>
		Os: <input type='text' name='os'value ='$os_a' readonly>
		Data de Envio: <input type='date' name='data_envio' value='$daten' readonly>
		Status da Os: <select name='status'>
							<option>Pago</option>
							<option>Captado</option>
							<option>Precificado</option>
		</select>   ";

			}
?>

	
				
		
				<input type="submit" value="Enviar" id="btn2">
	</form>
	<br><br>

	
</div>
</body>
</html>