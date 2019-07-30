<?php
		include('conexao.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Envio de Albuns</title>
	

</head>
<body>
	
	<img src="imagens/logo.png" id="logo">
	<div id="interface1">
<a href="menu_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>
	<h1>Envio de Albuns</h1>
		
		<form name="form_lojas" action="cad_os.php" method="post" id="form">
		Selecione sua loja: <select name='lojas''><option id="selecao" value="">Selecionar Loja</option>
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
		<input type="submit" value="Ok" id="btn" onmouseover="selecao()">	
			
	</form>
</div>
</body>
</html>