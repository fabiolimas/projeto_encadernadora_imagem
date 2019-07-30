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
	<div id="interface1">


<img src="imagens/sair.png" id="sair2" title="Sair" onclick="voltar()">

	<h1>Encadernadora</h1>
			
			
<?php

$id=$_GET['id'];



	$listar_pedidos="SELECT 
				 p.id_pedido,
				 l.nome_loja,
				 p.os_fotografia,
				 p.os, 
				 p.cliente,
				 p.email_cliente,
				 p.vendedor,
				 sp.statuspg,
				 sp.id_pagamento,
				 p.status_pag,
				 p.valor,
				 s.status,
				 p.telefone_cliente,
				 p.data_loja,
				 p.data_lab,
				 p.data_encad,
				 moda.nome_modelo,
				 tamanho.nome_tamanho_album,
				 p.paginas,
				 modc.nome_modelo_capa,
				 c.nome_cantoneira,
				 corte.nome_corte, 
				 lampag.nome_laminacao, 
				 lamcap.nome_laminacaocapa, 
				 modest.nome_modelo_estojo, 
				 modmal.nome_modelo_maleta, 
				 sa.servico_nome  
				 FROM pedido as p join lojas as l on p.id_loja=l.id_loja join modelo_de_album as moda on moda.id_modelo= p.id_modelo join modelo_de_capa modc on modc.id_modelo_capa = p.id_modelocapa join tipo_laminacao as lampag on lampag.id_laminacao= p.id_laminacao join tamanho_de_album as tamanho on tamanho.id_tamanho_album = p.id_tamanhoalb join cantoneira as c on c.id_cantoneira= p.id_cantoneira join corte on corte.id_corte=p.id_corte  join laminacaocapa as lamcap on lamcap.id_laminacaocapa=p.id_laminacaocapa join modelo_estojo as modest on modest.id_modelo_estojo=p.id_estojo join modelo_maleta as modmal on modmal.id_modelo_maleta=p.id_maleta join status as s on s.id_status=p.id_status join status_pag as sp on sp.id_pagamento=p.status_pag join servico_adicional as sa on sa.id_servico=p.id_servico where p.id_pedido='$id'";
	$query_listar=mysqli_query($conecta, $listar_pedidos);
	$row=mysqli_num_rows($query_listar);
	


if($row == 1){

	

	while($mostra_pedido=mysqli_fetch_array($query_listar)){

		

		$cliente=mb_strtoupper($mostra_pedido['cliente']);
		$email=$mostra_pedido['email_cliente'];
		$telefone=$mostra_pedido['telefone_cliente'];
		$vendedor=mb_strtoupper($mostra_pedido['vendedor']);
		$data_loja=$mostra_pedido['data_loja'];
		$modeloalbum=$mostra_pedido['nome_modelo'];
		$tamanho=$mostra_pedido['nome_tamanho_album'];
		$laminacaoalb=$mostra_pedido['nome_laminacao'];
		$id_pedido=$mostra_pedido['id_pedido'];
		$modelocapa=$mostra_pedido['nome_modelo_capa'];
		$cantoneira=$mostra_pedido['nome_cantoneira'];
		$corte=$mostra_pedido['nome_corte'];
		$laminacaocapa=$mostra_pedido['nome_laminacaocapa'];
		$estojo=$mostra_pedido['nome_modelo_estojo'];
		$maleta=$mostra_pedido['nome_modelo_maleta'];
		$paginas=$mostra_pedido['paginas'];
		$os=$mostra_pedido['os'];
		$loja=$mostra_pedido['nome_loja'];
		$status=$mostra_pedido['status'];
		$status_pag=$mostra_pedido['statuspg'];
		$preco=$mostra_pedido['valor'];
		$osfotog=$mostra_pedido['os_fotografia'];
		$data_lab=$mostra_pedido['data_lab'];
		$data_encadd=isset($mostra_pedido['data_encad'])?$mostra_pedido['data_encad']:'';
		$servico_add=$mostra_pedido['servico_nome'];
		$id_status_pag=$mostra_pedido['status_pag'];


	if(strlen($preco)>=6){
		$new_valor=substr_replace($preco,',',3,1);
	}else if(strlen($preco)==2){
		$new_valor=substr_replace($preco,',',2,1);

	}else if(strlen($preco)==3){
		$new_valor=substr_replace($preco, ',',4,1);
	}else if(strlen($preco)==5){
		$new_valor=substr_replace($preco, ',',2, 1);
	}


}


	$pagamentos="SELECT * FROM status_pag";
	$query_pagamento=mysqli_query($conecta, $pagamentos);


echo"<p><b>Loja: </b><span class='red'>".$loja."</span><br><br></p>";
echo "<p><b>OS Fotografia: </b> <span class='red'>".$osfotog."</span><br><br></p>";
echo"<p><b>OS Encadernadora: </b><span class='red'>".$os."</span><br><br><br><hr><br></p>";
echo "<fieldset><legend>Dados do Cliente</legend><b>Nome do Cliente:</b><span class='red'> ".$cliente."</span><br><br>";
echo "<b>Email:</b> <span class='red'>".$email."</span><br><br>";
echo "<b>Telefone:</b> <span class='red'>".$telefone."</span><br><br></fieldset>";

echo "<fieldset><legend>Venda</legend><b> Vendedor:</b> <span class='red'>".$vendedor."</span><br><br>";
echo"<b>Valor Total: </b> <span class='red'>R$ ".$new_valor."</span><br><br>";
echo"<form action='processa_edicao.php' method='post'>";
echo"<input type='hidden' name='pedido' value='$id_pedido'>";
echo"<b>Status da OS: <select name='new_stat' value=''><option value=''>Altera Status</option>";

while ($muda_status=mysqli_fetch_array($query_pagamento)){


	$id_status=$muda_status['id_pagamento'];
	$status_nome=$muda_status['statuspg'];
	echo"<option value='$id_status'>$status_nome</option>";
}
echo "</select> <input type='submit' value='OK' id='btn'></form><br><br>";


echo" <b>Data de Envio Loja:</b> <span class='red'>".date('d-m-Y',strtotime($data_loja))."</span><br><br>";
echo"<b>Data de Recebimento Minilab:</b> <span class='red' id='lab'>".date('d-m-Y', strtotime($data_lab))."</span><br><br>";
echo"<b>Data de Recebimento Encadernadora:</b> <span class='red' id='encd' onload='dataEncad()'>".date('d-m-Y', strtotime($data_encadd))."</span><br><br>";
echo"<b>Status: </b> <span class='red'>".$status."</span><br><br></fieldset>";


echo"<fieldset><legend>Dados do Album</legend><b>Modelo de Album:</b> <span class='red'>".$modeloalbum."</span><br><br>";
echo"<b>Tamanho do Album:</b> <span class='red'>".$tamanho."</span><br><br>";
echo"<b>Quantidade de Páginas:</b> <span class='red'>".$paginas."</span><br><br>";
echo "<b>Tipo de Laminação:</b> <span class='red'>".$laminacaoalb."</span><br><br>";
echo "<b>Modelo de Capa:</b> <span class='red'>".$modelocapa."</span><br><br>";
echo "<b>Cantoneira: </b><span class='red'>".$cantoneira."</span><br><br>";
echo "<b>Corte: </b><span class='red'>".$corte."</span><br><br>";
echo "<b>Laminação da  Capa (Personalizada): </b><span class='red'>".$laminacaocapa."</span><br><br>";
echo "<b>Estojo: </b><span class='red'>".$estojo."</span><br><br>";
echo"<b>Serviço Adicional: </b> <span class='red'>".$servico_add."</span><br></fieldset>";





}else{
	echo mysqli_error($conecta);
	echo "pedido não encontrado";
}

	
?>

	<script type="text/javascript">

		var encadernadoraData=document.querySelector('#encd');
		var laboratorioData=document.querySelector('#lab');

		function dataEncad(){

			if(encadernadoraData.innerHTML == "31-12-1969"){

				encadernadoraData.style.display="none";
			}


		}
		dataEncad();

		function dataLab(){

			if(laboratorioData.innerHTML== "31-12-1969"){
				laboratorioData.style.display="none";
			}			


		}
		dataLab();
	</script>

</div>
</body>
</html>