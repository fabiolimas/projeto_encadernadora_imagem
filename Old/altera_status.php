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
		function redirect(){

			setTimeout("window.location='consulta_envios.php'", 3000);
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
			
			$status=$_POST['status'];
			$os=$_POST['os'];

			$atualiza="UPDATE entrega_alb SET status='$status' where os_alb='$os'";
			$query_atualiza=mysqli_query($conecta, $atualiza);


			if ($query_atualiza){


				echo "O status da OS foi atualizado";
				echo"<script>redirect()</script>";
			}
			else{

				echo"erro";
			}


?>

	
				
		
				
	</form>
	<br><br>

	
</div>
</body>
</html>