<?php

		include('conexao.php');

		$loja=isset($_POST['lojas'])?$_POST['lojas']:"";
		$busca_lojas="SELECT * FROM  lojas WHERE loja_id='$loja'";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){

			$id_loja=isset($lista_loja['loja_id'])?$lista_loja['loja_id']:"";
			$nome_loja=isset($lista_loja['loja_nome'])?$lista_loja['loja_nome']:"";
		}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Saida Albuns</title>
	<script type="text/javascript">
		

		function voltar(){

			setTimeout("history.back()",3000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	<img src="imagens/logo.png" id="logo">
	<div id="interface">


<a href="index_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>

	<h1>Saida de Albuns</h1>
			
			

	<form name="form" action="processa.php" method="POST">
		
		<?php

		if(isset ($id_loja) == null){


			echo "<center><img src='imagens/alert.png' width=50px><p>Selecione uma loja para continuar</center>";
			echo"<script>voltar()</script>";
			exit();


		}else{

			echo "<input type='hidden' value='$loja' name='loja_val'>
			Loja: <input type='text' name='n_loja' value='$nome_loja' readonly>
		Os: <input type='text' name='os' required>
		Status da Os: <select name='status'>
							<option>Pago</option>
							<option>Captado</option>
							<option>Precificado</option>
		</select>   ";

}

		?>


		
			
	
				
		
				<input type="submit" value="Enviar" id="btn2">
	</form>


</div>
</body>
</html>