<?php



		include('conexao.php');

		
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Encadernadora - Login</title>
</head>
<body>
	<img src="imagens/logo.png" id="logo">
	
	<div class="nova">
<a href="index.php"><button id="btnxl">X</button></a>


	<h1 id="logh1">Login</h1>

	<form name="form_login" action="autentica.php" method="post" id="form_logins">
		<img src="imagens/login.png" id="imglogin">
		Usuário: <input type="text" name="usuario" required><br><br>
		Senha: <input type="password" name="senha" required><br><br>
		<input type="submit" value="Entrar" id="btn">

				
	</form>
</div>
</body>
</html>