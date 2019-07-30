<?php
session_start();
		include('conexao.php');

		if((!isset ($_SESSION['usuario'])== true) and (!isset ($_SESSION['senha'])== true)){

			unset ($_SESSION['usuario']);
			unset($_SESSION['senha']);
			header('location:index.php');


		}
		$logado=$_SESSION['usuario'];
		

				
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
	<img src="imagens/logo.png" id="logo">
	<div id="interface1">
		<img src="imagens/sair.png" id="sair" title="Sair" onclick="voltar()">
		<a href="relatorio.php"><img src="imagens/exportar.png" id="btexport" title="Exportar"></a>
		<h1>Entrada de Albuns - (recebidos)</h1>

		<form name="form_busca" action="busca_encad.php" method="post" style="padding:10px;">
<fieldset style="padding: 10px;"><legend>Filtrar</legend>
	
	Loja/Cliente/OS: <input type="text" name="clientes">
	
	<input type="submit" value="Buscar" id="btn">
</fieldset>
</form>

<?php

	


  
     
    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    //seleciona todos os itens da tabela 
    $cmd = "select * from pedido"; 
    $produtos = mysqli_query($conecta,$cmd); 
 
    //conta o total de itens 
    $total = mysqli_num_rows($produtos); 
 
    //seta a quantidade de itens por página, neste caso, 2 itens 
    $registros = 25; 
 
    //calcula o número de páginas arredondando o resultado para cima 
    $numPaginas = ceil($total/$registros); 
 
    //variavel para calcular o início da visualização com base na página atual 
    $inicio = ($registros*$pagina)-$registros; 
 
    //seleciona os itens por página 
    $lista_recebimento="SELECT l.nome_loja, p.os, p.data_loja, s.status,p.data_lab, p.data_encad, stp.statuspg FROM pedido as p join lojas as l on l.id_loja=p.id_loja and p.id_status= '3' join status as s on s.id_status=p.id_status join status_pag as stp on stp.id_pagamento=p.status_pag order by p.data_loja LIMIT $inicio,$registros"; 



    $query_lista = mysqli_query($conecta,$lista_recebimento); 
    $total = mysqli_num_rows($query_lista); 
    echo"<table border='1' cellspacing ='0' colspacing='2'>";
		echo"<tr>";
		echo"<td><b>Loja</td>";
		echo"<td><b>Os</td>";
		echo"<td><b>Data de Envio</td>";
		echo"<td><b>Status da OS</td>";
		echo"<td><b>Status</td>";
		echo"<td><b>Recebimento Minilab</td>";
		echo"<td><b>Recebimento Encadernadora</td>";
		
		echo"</tr>";

     
    //exibe os produtos selecionados 
    while($mostra_recebidos=mysqli_fetch_array($query_lista)){



	$loja=$mostra_recebidos['nome_loja'];
	$os=$mostra_recebidos['os'];
	$dat_envio=$mostra_recebidos['data_loja'];
	$status=$mostra_recebidos['status'];
	$data_recebe_lab=$mostra_recebidos['data_lab'];
	$statuspg=$mostra_recebidos['statuspg'];

	$data_receb_enca=$mostra_recebidos['data_encad'];
	


	echo"<tr>";
			echo"<td>$loja</td>";
			echo"<td>$os</td>";
			echo"<td>".date('d-m-Y',strtotime($dat_envio))."</td>";
			echo"<td>$statuspg</td>";
			echo"<td><span class='red'>$status</span></td>";
			
			echo"<td>".date('d-m-Y', strtotime($data_recebe_lab))."</td>";
			echo"<td>".date('d-m-Y', strtotime($data_receb_enca))."</td>";
			
}
     
    //exibe a paginação 
   
?>
<div id="paginacao"><?php
	
 for($i = 1; $i < $numPaginas + 1; $i++) { 
        echo "<a href='recebidos_enc.php?pagina=$i' id='btpagina'>".$i."</a> "; 
    } 



?></div>

			
	</form>
	
	
</div>
</body>
</html>