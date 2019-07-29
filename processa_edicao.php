<?php

		include('conexao.php');

		$loja=isset($_POST['lojas'])?$_POST['lojas']:"";
		$busca_lojas="SELECT * FROM  lojas WHERE id_loja='$loja'";
		$query_lojas=mysqli_query($conecta, $busca_lojas);

		while ($lista_loja=mysqli_fetch_array($query_lojas)){

			$id_loja=isset($lista_loja['id_loja'])?$lista_loja['id_loja']:"";
			$nome_loja=isset($lista_loja['nome_loja'])?$lista_loja['nome_loja']:"";
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

			setTimeout("history.back()",1000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	<img src="imagens/logo.png" id="logo">
	<div id="interface">


<img src="imagens/sair.png" id="sair2" title="Sair" onclick="voltar()">

	<h1>Encadernadora</h1>
			
			
<?php


	$status=$_POST['new_stat'];
	$pedido=$_POST['pedido'];

	$atualizar=" UPDATE pedido set status_pag = '$status' where id_pedido='$pedido' ";
	$query_atualiza=mysqli_query($conecta, $atualizar);

	if($query_atualiza){

		echo "Status de pagamento do pedido foi atualizado.";
		echo "<script>voltar()</script>";
	}
	else{

		echo mysqli_error($conecta);
		echo "erro ao tentar atualizar pedido";
	}




	

	
	
?>

	
</div>
</body>
</html>