<?php
		include('conexao.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Consulta de Os's</title>
</head>
<body>
	
	
	<img src="imagens/logo.png" id="logo">
	<div id="interface">
<a href="menu_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>
	<h1>Consulta de Os's</h1>
	
		<form name="form_lojas" action="consultar_os.php" method="post" id="form">
		Selecione sua loja: <select name='lojas'><option>Selecionar Loja</option>
								<?php

									$lista="SELECT * FROM lojas";
									$query_lista=mysqli_query($conecta,$lista);

									while($mostralista=mysqli_fetch_array($query_lista)){

											$loja=$mostralista['nome_loja'];
											$loja_id=$mostralista['id_loja'];


											echo "<option value='$loja_id'>$loja</option>";


									}

									


								?>
		</select>	
		<input type="submit" value="Consultar" id="btn">	
			
	</form>
</div>
</body>
</html>