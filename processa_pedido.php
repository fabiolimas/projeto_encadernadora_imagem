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

			setTimeout("window.location='index_loja.php'",3000);
		}
	</script>
</head>
<body>
		<meta charset="utf-8">
	<img src="imagens/logo.png" id="logo">
	<div id="interface">


<a href="index_loja.php"><img src="imagens/sair.png" id="sair2" title="Sair"></a>

	<h1>Encadernadora</h1>
			
			
<?php

	
	$cliente=$_POST['nome'];
	$idloja=$_POST['idloja'];
	$os=$_POST['os'];
	$codigo_cliente=$_POST['codigocliente'];
	$email=$_POST['mail'];
	$telefone=$_POST['fone'];
	$vendedor=$_POST['vendedor'];
	$dataloja=$_POST['dataloja'];
	$modeloalbum=$_POST['modeloalbum'];
	$tamanho=$_POST['tamanhoalbum'];
	$paginas=$_POST['paginas'];
	$lamalbum=$_POST['laminacaoalb'];
	$modelocapa=$_POST['modelocapa'];
	$lamcapa=$_POST['laminacapa'];
	$cantoneira=$_POST['cantoneira'];
	$corte=$_POST['corte'];
	$estojo=$_POST['estojo'];
	$maleta=$_POST['maleta'];
	$status=$_POST['status'];
	$pagamento=$_POST['valor'];
	
	$status_pagamento=$_POST['status_os'];
	$osfoto=$_POST['osfoto'];
	$servico_add=$_POST['servico_add'];

	

if(strlen($pagamento)>=6){
		$new_valor=substr_replace($pagamento,'.',3,1);
	}else if(strlen($pagamento)==2){
		$new_valor=substr_replace($pagamento,'.',2,1);

	}else if(strlen($pagamento)==3){
		$new_valor=substr_replace($pagamento, '.',4,1);
	}else if(strlen($pagamento)==5){
		$new_valor=substr_replace($pagamento, '.',2, 1);
	}



	$controle="SELECT * FROM pedido where id_loja='$idloja' and os ='$os'";
	$query_controle=mysqli_query($conecta, $controle);
	$row=mysqli_num_rows($query_controle);

	if ($row >= 1){

		echo "A OS: <span class='red'>".$osfoto."</span> já foi lançada em nossa base de dados anteriormente.";
		echo"<script>voltar()</script>";
		exit();
	}else{

		$processar="INSERT INTO pedido (id_pedido, id_loja,os_fotografia, os, codigo_cliente, cliente, email_cliente,  telefone_cliente, vendedor,status_pag, valor, id_status, data_loja, data_lab, data_encad, id_modelo, id_tamanhoalb, paginas, id_laminacao, id_modelocapa, id_laminacaocapa, id_cantoneira, id_corte, id_estojo, id_maleta, id_servico) VALUES(NULL, '$idloja','$osfoto', '$os', ' $codigo_cliente', '$cliente', '$email', '$telefone', '$vendedor','$status_pagamento', '$new_valor','$status', '$dataloja','','', '$modeloalbum', '$tamanho', '$paginas', '$lamalbum', '$modelocapa', '$lamcapa', '$cantoneira', '$corte', '$estojo', '$maleta', '$servico_add')";
	$query_proc=mysqli_query($conecta, $processar);

	if($query_proc){

		echo "OS <span class='red'>".$osfoto." </span> Cadastrada";
		echo"<script>voltar()</script>";
	}
	else{

		echo mysqli_error($conecta);
	}


	

	}


	
	




?>
	

</div>
</body>
</html>